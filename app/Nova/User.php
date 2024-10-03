<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\Permission\Models\Role;

class User extends Resource
{
    public static $model = \App\Models\User::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'email',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Nome', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'min:8')
                ->updateRules('nullable', 'min:8'),

            BelongsTo::make('Azienda', 'company', Company::class)
                ->sortable()
                ->rules('required'),

            // Mostra il nome del ruolo, ma senza visualizzare l'ID del ruolo
            Text::make('Ruolo', function () {
                return $this->roles->pluck('name')->implode(', ');
            })
                ->sortable(),

            // Campo di selezione per i ruoli, solo per amministratori SafeTech o aziendali
            Select::make('Ruolo')
                ->options(Role::pluck('name', 'id')->toArray())  // Preleva i nomi dei ruoli invece degli ID
                ->displayUsingLabels()  // Mostra le etichette (nomi dei ruoli)
                ->rules('required')
                ->withMeta([
                    'value' => optional($this->roles->first())->id,  // Recupera l'ID del ruolo assegnato
                ])
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    // Assegna il ruolo solo se l'utente ha i permessi
                    if (!$request->user()->hasRole(['admin', 'company-admin'])) {
                        throw new \Exception("Non hai i permessi per modificare i ruoli.");
                    }
                    $role = Role::find($request->get($requestAttribute));
                    $model->syncRoles($role);
                }),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        // Gli amministratori SafeTech possono vedere tutti gli utenti
        if ($request->user()->hasRole('admin')) {
            return $query;
        }

        // I dipendenti e gli amministratori aziendali vedono solo gli utenti della propria azienda
        return $query->where('company_id', $request->user()->company_id);
    }
}

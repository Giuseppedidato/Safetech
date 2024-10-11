<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use App\Nova\Role; // Usa la resource Nova per Role, non il modello Eloquent
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Resource
{
    /**
     * Il modello a cui corrisponde la resource Nova.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

    /**
     * Definisci i campi mostrati nella resource Nova per il modello User.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            // Campo ID dell'utente
            ID::make()->sortable(),

            // Campo Nome, obbligatorio, con regole di validazione per lunghezza massima
            Text::make('Nome', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            // Campo Email, obbligatorio, con regole di validazione email e unicità
            Text::make('Email', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email') // Unicità al momento della creazione
                ->updateRules('unique:users,email,{{resourceId}}'), // Unicità durante l'aggiornamento

            // Campo Password, solo visibile nei form, con regole di validazione per la lunghezza minima
            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'min:8') // Richiesta alla creazione
                ->updateRules('nullable', 'min:8'),  // Non obbligatoria all'aggiornamento

            // Relazione BelongsTo con la tabella delle aziende (Company)
            BelongsTo::make('Azienda', 'company', Company::class)
                ->sortable()
                ->rules('required'), // L'azienda è obbligatoria

            // Relazione molti-a-molti con la resource Ruoli (Role)
            BelongsToMany::make('Ruoli', 'roles', Role::class),
        ];
    }

    /**
     * Filtra i ruoli assegnabili in base all'utente loggato.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableRoles(NovaRequest $request, $query)
    {
        // Recupera l'utente attualmente loggato
        $user = Auth::user();

        // Controlla se l'utente è un admin SafeTech
        if ($user->hasRole('SafeTech-admin')) {
            // Gli admin di SafeTech possono vedere tutti i ruoli
            return $query;
        } elseif ($user->hasRole('company-admin')) {
            // Gli admin delle aziende clienti vedono solo i ruoli non SafeTech
            return $query->where('is_safetech_role', false);
        } else {
            // I dipendenti non possono vedere nessun ruolo
            return $query->where('id', -1); // Nessun ruolo visualizzato per i dipendenti
        }
    }
}

































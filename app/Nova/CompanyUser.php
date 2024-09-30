<?php

namespace App\Nova;

use App\Models\Company;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class CompanyUser extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Gravatar::make()->maxWidth(50),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            // Collegamento all'azienda cliente
            BelongsTo::make('Company', 'company', Company::class),

            // Altri campi personalizzati possono essere aggiunti qui
            // Ad esempio: Ruolo aziendale, data di assunzione, dipartimento
            // Commento: Da aggiungere in futuro in base alle esigenze aziendali
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            // In futuro potremo aggiungere azioni personalizzate per gli utenti aziendali,
            // ad esempio la sospensione di un utente, l'invio di notifiche, o altre operazioni rilevanti.
        ];
    }

    /**
     * Filtering only the users that are employees of a company.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereNotNull('company_id');
    }

    /**
     * Definizione delle relazioni, ruoli e permessi
     * Commento: Se l'utente ha ruoli specifici (ad esempio, amministratore o dipendente semplice),
     * questi possono essere gestiti in una relazione con la tabella dei ruoli.
     */
    public function roleRelations()
    {
        // Da aggiungere la gestione di ruoli e permessi degli utenti aziendali
    }

    /**
     * Gestione dei dispositivi collegati
     * Commento: Potrebbe essere utile visualizzare i dispositivi collegati a un utente specifico
     */
    public function deviceRelations()
    {
        // Da aggiungere la gestione dei dispositivi collegati all'utente aziendale
    }
}

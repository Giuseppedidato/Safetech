<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Resource;
use Spatie\Permission\Models\Role as RoleModel;
use Laravel\Nova\Http\Requests\NovaRequest;

class Role extends Resource
{
    /**
     * Il modello a cui corrisponde la risorsa.
     * Questo specifica che la resource Nova è associata al modello Role di Spatie.
     *
     * @var string
     */
    public static $model = RoleModel::class;

    /**
     * La singola chiave che deve essere usata per rappresentare
     * la risorsa quando viene visualizzata nell'interfaccia.
     * In questo caso, usiamo il campo 'name' per rappresentare ogni ruolo.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * Le colonne che devono essere cercate quando l'utente usa la barra di ricerca
     * nell'interfaccia Nova. Usiamo l'ID del ruolo e il suo nome come campi ricercabili.
     *
     * @var array
     */
    public static $search = [
        'id', 'name',
    ];

    /**
     * Ottieni i campi mostrati nella risorsa.
     * Questo metodo definisce quali campi verranno visualizzati e modificati
     * dall'interfaccia Nova per il modello Role.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            // Campo ID, che mostra l'identificatore univoco del ruolo e consente di ordinarlo
            ID::make()->sortable(),

            // Campo di testo per il nome del ruolo, che deve essere obbligatorio e con massimo 255 caratteri
            Text::make('Nome', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            // Campo booleano per identificare se il ruolo è un ruolo SafeTech (true/false)
            Boolean::make('Ruolo SafeTech', 'is_safetech_role')
                ->sortable()
                ->rules('required'),

            // Relazione molti-a-molti tra ruoli e permessi, permette di visualizzare e gestire i permessi associati al ruolo
            BelongsToMany::make('Permessi', 'permissions', Permission::class),
        ];
    }

    /**
     * Ritorna la chiave URI della risorsa.
     * Questa chiave viene utilizzata nelle rotte per identificare la resource in Nova.
     * In questo caso, la chiave è 'roles', che corrisponde alla resource per i ruoli.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'roles';
    }
}





























































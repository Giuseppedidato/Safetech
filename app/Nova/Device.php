<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Http\Request;

class Device extends Resource
{
    /**
     * Il modello associato a questa risorsa.
     *
     * @var string
     */
    public static $model = \App\Models\Device::class;

    /**
     * Il valore che verrà utilizzato per rappresentare la risorsa quando viene mostrata.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * Le colonne che dovrebbero essere cercate.
     *
     * @var array
     */
    public static $search = [
        'id', 'mac_address', 'device_type_id'
    ];

    /**
     * I campi visualizzati dalla risorsa.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            // Campo per l'indirizzo MAC del dispositivo
            Text::make('MAC Address', 'mac_address')
                ->sortable()
                ->rules('required', 'max:255'),

            // Relazione con il tipo di dispositivo
            BelongsTo::make('Device Type', 'deviceType', DeviceType::class)
                ->sortable(),

            // Relazione con l'azienda a cui appartiene il dispositivo
            BelongsTo::make('Company', 'company', Company::class)
                ->sortable(),

            // Relazione con l'utente a cui è assegnato il dispositivo
            BelongsTo::make('User', 'user', User::class)
                ->sortable(),
        ];
    }

    /**
     * Azioni disponibili per la risorsa.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}

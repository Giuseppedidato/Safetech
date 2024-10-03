<?php

namespace App\Nova;

use App\Models\Company;
use App\Models\User;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Device extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Device>
     */
    public static $model = \App\Models\Device::class;

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
        'id', 'name', 'mac_address',
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

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('MAC Address')
                ->sortable()
                ->rules('required', 'max:17'),

            Select::make('Status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                    'maintenance' => 'Maintenance',
                ])
                ->displayUsingLabels()
                ->sortable(),

            BelongsTo::make('Company', 'company', Company::class)
                ->sortable()
                ->rules('required'),

            BelongsTo::make('User', 'user', User::class)
                ->nullable(), // Il dispositivo può non essere assegnato immediatamente a un utente
        ];
    }
}

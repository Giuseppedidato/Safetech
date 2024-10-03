<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Http\Requests\NovaRequest;

class Company extends Resource
{
    public static $model = \App\Models\Company::class;

    public static $title = 'ragione_sociale';

    public static $search = [
        'id', 'ragione_sociale', 'email', 'partita_iva',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Ragione Sociale', 'ragione_sociale')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Indirizzo', 'indirizzo')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Email::make('Email', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            Text::make('Telefono', 'telefono')
                ->sortable()
                ->rules('nullable', 'max:20'),

            Text::make('Codice Destinatario', 'codice_destinatario')
                ->sortable()
                ->rules('nullable', 'max:7'),

            Text::make('PEC', 'pec')
                ->sortable()
                ->rules('nullable', 'email', 'max:254'),

            Text::make('Partita IVA', 'partita_iva')
                ->sortable()
                ->rules('required', 'unique:companies,partita_iva', 'max:20'),

            Text::make('Codice Fiscale', 'codice_fiscale')
                ->sortable()
                ->rules('nullable', 'max:20'),

            Text::make('Telefono Contatto', 'contatto_telefono')
                ->sortable()
                ->rules('nullable', 'max:20'),

            Text::make('Indirizzo Fatturazione', 'indirizzo_fatturazione')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Email::make('Email Fatturazione', 'email_fatturazione')
                ->sortable()
                ->rules('nullable', 'email', 'max:254'),

            Text::make('IBAN', 'iban')
                ->sortable()
                ->rules('nullable', 'max:34'),

            Text::make('Metodo di Pagamento', 'metodo_pagamento')
                ->sortable()
                ->rules('nullable', 'max:50'),

            Text::make('Valuta', 'valuta')
                ->sortable()
                ->rules('nullable', 'max:3')
                ->default('EUR'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        // Gli amministratori SafeTech possono vedere tutte le aziende
        if ($request->user()->hasRole('admin')) {
            return $query;
        }

        // I dipendenti e gli amministratori aziendali vedono solo la propria azienda
        return $query->where('id', $request->user()->company_id);
    }
}

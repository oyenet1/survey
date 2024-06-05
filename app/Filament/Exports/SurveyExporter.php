<?php

namespace App\Filament\Exports;

use App\Models\Survey;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SurveyExporter extends Exporter
{
    protected static ?string $model = Survey::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('education'),
            ExportColumn::make('age_range'),
            ExportColumn::make('gender'),
            ExportColumn::make('marital_status'),
            ExportColumn::make('wives'),
            ExportColumn::make('location'),
            ExportColumn::make('occupation'),
            ExportColumn::make('monthly_income_range'),
            ExportColumn::make('have_a_savings'),
            ExportColumn::make('have_bank'),
            ExportColumn::make('no_bank_account_reasons'),
            ExportColumn::make('has_borrowed_before'),
            ExportColumn::make('services'),
            // ExportColumn::make('usage'),
            ExportColumn::make('lenders'),
            ExportColumn::make('others'),
            ExportColumn::make('own_mobile_phone'),
            ExportColumn::make('affected_by_insecurity'),
            ExportColumn::make('insecurity_details'),
            ExportColumn::make('phone_type'),
            ExportColumn::make('feel_safe'),
            ExportColumn::make('use_phone'),
            ExportColumn::make('saving_methods'),
            ExportColumn::make('payment_methods'),
            ExportColumn::make('use_fintech'),
            ExportColumn::make('fintechs'),
            ExportColumn::make('mode_of_savings'),
            ExportColumn::make('pays_interest_on_loan'),
            ExportColumn::make('happy_to_pay_interest'),
            ExportColumn::make('state.name'),
            ExportColumn::make('enumerator.name')
                ->label('Enumerator'),
            ExportColumn::make('lga.name'),
            // ExportColumn::make('created_at'),
            // ExportColumn::make('updated_at'),
            ExportColumn::make('allow_wife_to_visit_a_bank'),
            ExportColumn::make('phone'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your survey export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Survey;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Exports\SurveyExporter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\SurveyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SurveyResource\RelationManagers;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('education')
                    ->maxLength(255),
                Forms\Components\TextInput::make('age_range')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('marital_status')
                    ->maxLength(255),
                Forms\Components\TextInput::make('wives')
                    ->numeric()
                    ->default(0),
                // Forms\Components\TextInput::make('location')
                //     ->maxLength(255),
                Forms\Components\TextInput::make('occupation')
                    ->required()
                    ->maxLength(255)
                    ->default('jobless'),
                Forms\Components\TextInput::make('monthly_income_range')
                    ->required()
                    ->maxLength(255)
                    ->default('below 20000'),
                Forms\Components\Toggle::make('have_a_savings')
                    ->required(),
                Forms\Components\Toggle::make('have_bank')
                    ->required(),
                Forms\Components\Textarea::make('no_bank_account_reasons')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('has_borrowed_before')
                    ->required(),
                Forms\Components\TextInput::make('services'),
                // Forms\Components\TextInput::make('usage')
                //     ->maxLength(255),
                Forms\Components\TextInput::make('lenders'),
                Forms\Components\TextInput::make('others'),
                Forms\Components\Toggle::make('own_mobile_phone'),
                Forms\Components\Toggle::make('affected_by_insecurity')
                    ->required(),
                Forms\Components\Textarea::make('insecurity_details')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone_type')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Toggle::make('feel_safe'),
                Forms\Components\Toggle::make('use_phone')
                    ->required(),
                Forms\Components\TextInput::make('saving_methods')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_methods'),
                Forms\Components\Toggle::make('use_fintech')
                    ->required(),
                Forms\Components\TextInput::make('fintechs')
                    ->required(),
                // Forms\Components\TextInput::make('mode_of_savings')
                //     ->maxLength(255),
                Forms\Components\Toggle::make('pays_interest_on_loan'),
                Forms\Components\Toggle::make('happy_to_pay_interest'),
                Forms\Components\Select::make('state_id')
                    ->relationship('state', 'name')
                    ->required(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
                Forms\Components\Select::make('lga_id')
                    ->relationship('lga', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->bulkActions([

            // ])
            ->columns([
                Tables\Columns\TextColumn::make('education')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age_range')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wives')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('location')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monthly_income_range')
                    ->searchable(),
                Tables\Columns\IconColumn::make('have_a_savings')
                    ->boolean(),
                Tables\Columns\IconColumn::make('have_bank')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_borrowed_before')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('usage')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('own_mobile_phone')
                    ->boolean(),
                Tables\Columns\IconColumn::make('affected_by_insecurity')
                    ->boolean(),
                Tables\Columns\TextColumn::make('phone_type')
                    ->searchable(),
                Tables\Columns\IconColumn::make('feel_safe')
                    ->boolean(),
                Tables\Columns\IconColumn::make('use_phone')
                    ->boolean(),
                Tables\Columns\TextColumn::make('saving_methods')
                    ->searchable(),
                Tables\Columns\IconColumn::make('use_fintech')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('mode_of_savings')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('pays_interest_on_loan')
                    ->boolean(),
                Tables\Columns\IconColumn::make('happy_to_pay_interest')
                    ->boolean(),
                Tables\Columns\TextColumn::make('state.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lga.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->exporter(SurveyExporter::class)
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSurveys::route('/'),
        ];
    }
}
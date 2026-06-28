<?php

namespace App\Filament\Resources\Teams\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    protected static ?string $title = 'Plantel';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('person_id')
                    ->label('Persona')
                    ->relationship('person', 'first_name')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => $record->first_name . ' ' . $record->last_name
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('jersey_number')
                    ->label('Número')
                    ->numeric()
                    ->required(),

                Select::make('position')
                    ->label('Posición')
                    ->options([
                        'Armador' => 'Armador',
                        'Opuesto' => 'Opuesto',
                        'Central' => 'Central',
                        'Punta' => 'Punta',
                        'Líbero' => 'Líbero',
                    ])
                    ->required(),

                Toggle::make('captain')
                    ->label('Capitán')
                    ->default(false),

                Toggle::make('starter')
                    ->label('Titular')
                    ->default(true),

                Toggle::make('active')
                    ->label('Activo')
                    ->default(true),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Plantel')

            ->columns([

                TextColumn::make('jersey_number')
                    ->label('N°')
                    ->sortable(),

                TextColumn::make('person.first_name')
                    ->label('Jugador')
                    ->formatStateUsing(fn ($state, $record) =>
                        $record->person
                            ? $record->person->first_name . ' ' . $record->person->last_name
                            : '-'
                    )
                    ->searchable(),

                TextColumn::make('position')
                    ->label('Posición'),

                IconColumn::make('captain')
                    ->label('Capitán')
                    ->boolean(),

                IconColumn::make('starter')
                    ->label('Titular')
                    ->boolean(),

                IconColumn::make('active')
                    ->label('Activo')
                    ->boolean(),

            ])

            ->headerActions([
                CreateAction::make()
                    ->label('Agregar jugador'),
            ])

            ->recordActions([
                EditAction::make()
                    ->label('Editar'),

                DeleteAction::make()
                    ->label('Eliminar'),
            ]);
    }
}
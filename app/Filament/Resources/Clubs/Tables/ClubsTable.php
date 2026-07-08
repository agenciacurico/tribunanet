<?php

namespace App\Filament\Resources\Clubs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClubsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Club')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('short_name')
                    ->label('Nombre Corto')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('city')
                    ->label('Ciudad')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('region')
                    ->label('Región')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('active')
                    ->label('Activo')
                    ->boolean(),

            ])
            ->defaultSort('name')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Eliminar'),
                ]),
            ]);
    }
}
<?php

namespace App\Filament\Resources\Games\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GamesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('game_date')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('game_time')
                    ->label('Hora')
                    ->time('H:i')
                    ->sortable(),

                TextColumn::make('homeTeam.name')
                    ->label('Local')
                    ->searchable(),

                TextColumn::make('awayTeam.name')
                    ->label('Visita')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->colors([
                        'gray' => 'scheduled',
                        'success' => 'live',
                        'danger' => 'finished',
                        'warning' => 'cancelled',
                    ]),

            ])
            ->filters([
                //
            ])
            ->recordActions([

                Action::make('operar')
                    ->label('Operar')
                    ->icon('heroicon-o-play')
                    ->color('success')
                    ->url(fn ($record) => route('operator.game', $record)),

                EditAction::make(),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
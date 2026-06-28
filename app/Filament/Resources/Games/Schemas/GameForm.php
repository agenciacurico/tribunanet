<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información del Partido')
                    ->columns(2)
                    ->schema([

                        Select::make('home_team_id')
                            ->label('Equipo Local')
                            ->relationship('homeTeam', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('away_team_id')
                            ->label('Equipo Visita')
                            ->relationship('awayTeam', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->different('home_team_id'),

                        DatePicker::make('game_date')
                            ->label('Fecha')
                            ->required(),

                        TimePicker::make('game_time')
                            ->label('Hora')
                            ->seconds(false)
                            ->required(),

                        TextInput::make('venue')
                            ->label('Cancha')
                            ->maxLength(150),

                        Select::make('sets_to_win')
                            ->label('Formato del Partido')
                            ->options([
                                2 => 'Mejor de 3 sets (gana 2)',
                                3 => 'Mejor de 5 sets (gana 3)',
                            ])
                            ->default(3)
                            ->required()
                            ->native(false),

                        Select::make('status')
                            ->label('Estado')
                            ->options([
                                'scheduled' => 'Programado',
                                'live' => 'En juego',
                                'finished' => 'Finalizado',
                                'cancelled' => 'Suspendido',
                            ])
                            ->default('scheduled')
                            ->required(),

                    ]),
            ]);
    }
}
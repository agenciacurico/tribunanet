<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información General')
                    ->columns(2)
                    ->schema([

                        Select::make('organization_id')
                            ->label('Organización')
                            ->relationship('organization', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('club_id')
                            ->label('Club')
                            ->relationship('club', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('category_id')
                            ->label('Categoría')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('name')
                            ->label('Nombre del equipo')
                            ->required()
                            ->maxLength(150),

                        Select::make('gender')
                            ->label('Sexo')
                            ->options([
                                'Damas' => 'Damas',
                                'Varones' => 'Varones',
                                'Mixto' => 'Mixto',
                            ])
                            ->required(),

                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('teams'),

                        Toggle::make('active')
                            ->label('Activo')
                            ->default(true),

                    ]),
            ]);
    }
}
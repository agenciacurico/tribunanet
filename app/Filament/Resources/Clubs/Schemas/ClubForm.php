<?php

namespace App\Filament\Resources\Clubs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClubForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información General')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre del Club')
                            ->required()
                            ->maxLength(150),

                        TextInput::make('short_name')
                            ->label('Nombre Corto')
                            ->maxLength(50),

                        TextInput::make('city')
                            ->label('Ciudad')
                            ->maxLength(100),

                        TextInput::make('region')
                            ->label('Región')
                            ->maxLength(100),

                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('clubs'),

                        Toggle::make('active')
                            ->label('Activo')
                            ->default(true),

                    ]),

            ]);
    }
}
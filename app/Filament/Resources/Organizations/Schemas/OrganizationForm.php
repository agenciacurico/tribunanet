<?php

namespace App\Filament\Resources\Organizations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información General')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(150),

                        TextInput::make('short_name')
                            ->label('Nombre corto')
                            ->maxLength(30),

                        TextInput::make('email')
                            ->label('Correo')
                            ->email(),

                        TextInput::make('phone')
                            ->label('Teléfono'),

                        TextInput::make('website')
                            ->label('Sitio Web'),

                        TextInput::make('city')
                            ->label('Ciudad'),

                        TextInput::make('region')
                            ->label('Región'),

                        TextInput::make('country')
                            ->label('País')
                            ->default('Chile'),

                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('organizations'),

                        Toggle::make('is_active')
                            ->label('Activa')
                            ->default(true),
                    ]),
            ]);
    }
}
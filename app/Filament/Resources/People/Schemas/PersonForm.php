<?php

namespace App\Filament\Resources\People\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PersonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información Personal')
                    ->columns(2)
                    ->schema([

                        TextInput::make('rut')
                            ->label('RUT'),

                        TextInput::make('first_name')
                            ->label('Nombre')
                            ->required(),

                        TextInput::make('last_name')
                            ->label('Apellido')
                            ->required(),

                        DatePicker::make('birth_date')
                            ->label('Fecha de nacimiento'),

                        Select::make('gender')
                            ->label('Sexo')
                            ->options([
                                'M' => 'Masculino',
                                'F' => 'Femenino',
                            ]),

                        TextInput::make('email')
                            ->label('Correo')
                            ->email(),

                        TextInput::make('phone')
                            ->label('Teléfono'),

                      FileUpload::make('photo')
    ->label('Fotografía')
    ->image()
    ->disk('public')
    ->directory('people'),

                        Toggle::make('active')
                            ->label('Activo')
                            ->default(true),

                    ]),

            ]);
    }
}
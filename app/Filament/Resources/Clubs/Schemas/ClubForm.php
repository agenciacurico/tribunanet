<?php

namespace App\Filament\Resources\Clubs\Schemas;

use App\Models\Organization;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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

                        Select::make('organization_id')
                            ->label('Organización')
                            ->options(Organization::orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        TextInput::make('name')
                            ->label('Nombre')
                            ->required(),

                        TextInput::make('short_name')
                            ->label('Nombre corto'),

                        TextInput::make('city')
                            ->label('Ciudad'),

                        TextInput::make('region')
                            ->label('Región'),

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
<?php

namespace App\Filament\Resources\Employers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class EmployerForm
{
    public static function schema(): array
    {
        return [
            TextInput::make('company_name')
                ->live(onBlur: true)
                ->afterStateUpdated(function (Get $get, Set $set, ?string $state, ?string $old) {
                    if (($get('company_slug') ?? '') !== Str::slug($old)) {
                        $set('company_slug', Str::slug($state));
                    }
                }),

            TextInput::make('company_slug'),
            FileUpload::make('logo')
                ->image()
                ->imageEditor()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->directory('logos')
                ->disk('public')
                ->required(),

            Select::make('user_id')
                ->relationship(name: 'user', titleAttribute: 'name')
                ->searchable()
                ->preload()
                ->required()
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(self::schema());
    }
}
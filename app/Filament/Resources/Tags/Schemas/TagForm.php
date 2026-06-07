<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class TagForm
{
    public static function schema(): array{
        return [
            TextInput::make('name')
                ->required()
                ->live()
                ->afterStateUpdated(function (Set $set, Get $get, ?string $state, ?string $old) {
                    if (($get('slug') ?? "") !== Str::slug($old)) {
                        $set('slug', Str::slug($state));
                    }
                }),

                TextInput::make('slug')
                ->required()
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(self::schema());
    }
}

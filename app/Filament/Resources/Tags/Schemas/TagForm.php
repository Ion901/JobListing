<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TagForm
{
    public static function schema(): array{
        return [
            TextInput::make('name')
                ->required()
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(self::schema());
    }
}

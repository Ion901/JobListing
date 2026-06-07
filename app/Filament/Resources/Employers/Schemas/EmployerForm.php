<?php

namespace App\Filament\Resources\Employers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;

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

            FileUpload::make('photos')
                ->multiple()                    // mai multe poze
                ->image()
                ->directory('employer-photos')
                ->disk('public')
                ->reorderable()                 // drag & drop reordonare
                ->columnSpanFull(),

            Select::make('user_id')
                ->relationship(
                    name: 'user',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn($query) =>
                    Auth::user()?->role === 'admin'
                        ? $query
                        : $query->where('id', Auth::id())
                )
                ->getOptionLabelFromRecordUsing(
                    fn($record) => $record->name ?: 'Unnamed User'
                )
                ->default(
                    fn() =>
                    Auth::user()?->role === 'employer'
                        ? Auth::id()
                        : null
                )
                ->searchable()
                ->preload()
                ->required(),

            TextInput::make('phone')
                ->tel()
                ->placeholder('+373 060 123 456')
                ->rules([
                    'nullable',
                    'regex:/^\+373\s?\d{3}\s?\d{3}\s?\d{3}$/'
                ])
                ->helperText('Format: +373 060 123 456'),

            TextInput::make('contact_person')
                ->label('Indica persoana de contact')
                ->string(),

            TextInput::make('email')
                ->label('Email-ul Companiei')
                ->email()
                ->unique(),

            RichEditor::make('employer_description') // nested attribute
                ->label('Descriere companie')
                ->columnSpanFull(),
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(self::schema());
    }
}

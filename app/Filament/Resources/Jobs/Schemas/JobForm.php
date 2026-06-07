<?php

namespace App\Filament\Resources\Jobs\Schemas;

use App\Enums\Job\JobLocationEnum;
use App\Enums\Job\JobScheduleEnum;
use App\Filament\Resources\Employers\Schemas\EmployerForm;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\Tags\Schemas\TagForm;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\MentionProvider;
use App\Models\Employer;

class JobForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema

            ->components([

                TextInput::make('title')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Set $set, Get $get, ?string $state, ?string $old) {
                        if (($get('title_slug') ?? "") !== Str::slug($old)) {
                            $set('title_slug', Str::slug($state));
                        }
                    }),
                TextInput::make('title_slug')
                    ->required(),
                Grid::make()
                    ->columns(2)
                    ->extraAttributes(['class' => 'items-center gap-2'])
                    ->schema([
                        TextInput::make('salary')
                            ->rule(['required', 'numeric'])
                            ->prefix('$'),

                        Toggle::make('feature')
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false),
                    ]),
                Select::make('employer_id')
                    ->relationship(
                        name: 'employer',
                        titleAttribute: 'company_name',
                        modifyQueryUsing: fn($query) => Auth::user()?->role === 'admin'
                            ? $query
                            : $query->where('user_id', Auth::id())
                    )
                    ->default(function () {

                        if (Auth::user()?->role === 'employer') {
                            return Auth::user()?->employer?->id;
                        }
                        return null;
                    })
                    ->preload()
                    ->createOptionForm(
                        EmployerForm::schema()
                    )
                    ->required(),
                Grid::make(4)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('tags')
                            ->relationship('tags', 'name')
                            ->multiple()
                            ->preload()
                            ->createOptionForm(
                                TagForm::schema()
                            )
                            ->required()
                            ->columnSpan(2),
                        Select::make('location')
                            ->options(JobLocationEnum::class)
                            ->required()
                            ->columnSpan(1),
                        Select::make('schedule')
                            ->options(collect(JobScheduleEnum::cases())->mapWithKeys(
                                fn($case) => [$case->value => $case->label()]
                            ))
                            ->required()
                            ->columnSpan(1),

                    ]),

                Select::make('experience_id')
                    ->relationship('experience', 'level')
                    ->label('Experiența de muncă'),

                Select::make('education')
                    ->options([
                        'Medii' => 'Medii',
                        'Superioare' => 'Superioare',
                        'Medii-de-Specialitate' => 'Medii de specialitate',
                        'Medii' => 'Medii',
                        'Student' => 'Student'
                    ])
                    ->label('Educație'),

                TextInput::make('url')
                    ->placeholder('Url')
                    ->columnSpanFull()
                    ->extraInputAttributes(['class' => 'text-gray-100'])
                    ->label('Url'),

                Grid::make(3)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('city_id')
                            ->relationship('city', 'name')
                            ->label('Oraș')
                            ->live(),

                        Select::make('sector_id')
                            ->relationship('sector', 'name')
                            ->label('Sector')
                            ->visible(fn(Get $get) => $get('city_id') === 11),

                        Select::make('address_id')
                            ->relationship('address', 'street')
                            ->searchable()
                            ->preload()
                            ->label('Adresa')


                    ]),

                RichEditor::make('description')
                    ->columnSpanFull()
                    ->extraAttributes(['class' => 'min-h-[300px]'])
                    ->required()
            ]);
    }
}
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


class JobForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->required(),
                TextInput::make('salary')
                    ->rule(['required', 'numeric'])
                    ->prefix('$'),
                Select::make('employer_id')
                    ->relationship('employer', 'company_name')
                    ->preload()
                    ->createOptionForm(
                        EmployerForm::schema()
                    )
                    ->required(),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->createOptionForm(
                        TagForm::schema()
                    )
                    ->required(),
                Select::make('location')
                    ->options(JobLocationEnum::class)
                    ->required(),
                Select::make('schedule')
                    ->options(collect(JobScheduleEnum::cases())->mapWithKeys(
                        fn($case) => [$case->value => $case->label()]
                    ))
                    ->required(),

                Toggle::make('feature')
                    ->onColor('success')
                    ->offColor('danger')
            ]);
    }
}

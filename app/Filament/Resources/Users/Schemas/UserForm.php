<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;
use App\Models\User;
use Filament\Actions\Action;


class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->unique()
                    ->suffixAction(
                        Action::make('sendVerification')
                            ->icon('heroicon-o-envelope')
                            ->action(function ($state) {
                                // $state = current email value
                                $user = User::where('email', $state)->first();
                                $user?->sendEmailVerificationNotification();
                            })
                    )
                    ->required(),
                Select::make('role')
                    ->options(['employee' => 'Employee', 'employer' => 'Employer', 'admin' => 'Admin'])
                    ->required()
                    ->live(),

                Hidden::make('company_name'),
                Hidden::make('company_slug'),
                Hidden::make('logo'),

                Actions::make([

                    Action::make('employer')
                        ->button()
                        ->visible(fn(Get $get) => $get('role') === 'employer')
                        ->schema([
                            TextInput::make('company_name')
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('company_slug', Str::slug($state));
                                })
                                ->required(),

                            TextInput::make('company_slug'),
                            FileUpload::make('logo')
                                ->image()
                                ->directory('logos')
                                ->disk('public')
                                ->required(),

                        ])
                        ->action(function (array $data, Set $set) {
                            $set('company_name', $data['company_name']);
                            $set('company_slug', $data['company_slug']);
                            $set('logo', $data['logo']);
                            // save or process employer details here
                        })
                ])
                    ->label('Add new employer'),

                TextInput::make('password')
                    ->revealable()
                    ->password()
                    ->confirmed()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->rules([Password::defaults()]),
                TextInput::make('password_confirmation')
                    ->revealable()
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create'),
            ]);
    }
}

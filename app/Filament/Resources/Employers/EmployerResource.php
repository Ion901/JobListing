<?php

namespace App\Filament\Resources\Employers;

use App\Filament\Resources\Employers\Pages\CreateEmployer;
use App\Filament\Resources\Employers\Pages\EditEmployer;
use App\Filament\Resources\Employers\Pages\ListEmployers;
use App\Filament\Resources\Employers\Schemas\EmployerForm;
use App\Filament\Resources\Employers\Tables\EmployersTable;
use App\Models\Employer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Employer';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(
                Auth::user()?->role === 'employer',
                fn($q) => $q->where('user_id', Auth::user()?->id)
            );
    }

    public static function getNavigationBadge(): ?string
    {
        $query = static::getModel()::query();

        if (Auth::user()->role === 'employer') {
            return $query->where(fn($q) => $q->where('user_id', Auth::user()?->id)
            )->count();
        }
        return $query->count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

    public static function form(Schema $schema): Schema
    {
        return EmployerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmployers::route('/'),
            'create' => CreateEmployer::route('/create'),
            'edit' => EditEmployer::route('/{record}/edit'),
        ];
    }
}

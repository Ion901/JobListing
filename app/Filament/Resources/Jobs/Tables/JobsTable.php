<?php

namespace App\Filament\Resources\Jobs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JobsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employer.company_name'),
                TextColumn::make('title')
                ->searchable(),
                TextColumn::make('tags.name')
                ->badge(),
                TextColumn::make('salary')
                ->money()
                ->sortable()
                ->searchable(),
                TextColumn::make('schedule')
                ->searchable()
                ->sortable(),
                TextColumn::make('location')
                ->searchable(),
                IconColumn::make('feature')
                ->sortable()
                ->boolean()

            ])
            ->defaultGroup('employer.company_name')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

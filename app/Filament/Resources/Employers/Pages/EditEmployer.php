<?php

namespace App\Filament\Resources\Employers\Pages;

use App\Filament\Resources\Employers\EmployerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmployer extends EditRecord
{
    protected static string $resource = EmployerResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['employer_description'] = $this->record->description?->description;

        $data['photos'] = $this->record->photos?->pluck('path')->toArray();
        return $data;
    }


    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {

        $this->record->description()->updateOrCreate(
            ['employer_id' => $this->record->id],
            ['description' => $this->form->getState()['employer_description'] ?? null]
        );

        $photos = $this->form->getState()['photos'] ?? [];

        //  șterge pozele vechi și inserează din nou
        $this->record->photos()->delete();

        foreach ($photos as $index => $path) {
            $this->record->photos()->create([
                'path'  => $path,
            ]);
        }
    }
}

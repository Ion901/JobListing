<?php

namespace App\Filament\Resources\Employers\Pages;

use App\Filament\Resources\Employers\EmployerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployer extends CreateRecord
{
    protected static string $resource = EmployerResource::class;

    protected function afterCreate(): void
    {

        $data = $this->form->getState()['employer_description'] ?? "";

        if (!empty($data['employer_description'])) {
            $this->record->description()->create([
                'description' => $data['employer_description'],
            ]);
        }

        $photos = $this->form->getState()['photos'] ?? "";

        foreach ($photos as $index => $path) {
            $this->record->photos()->create([
                'path' => $path
            ]);
        }
    }



}

<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Employer;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            // 1. Create the user
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt($data['password']),
                'role'     => $data['role'],
            ]);

            // 2. If employer, save employer data
            if ($data['role'] === 'employer') {
                Employer::create([
                    'user_id'      => $user->id,
                    'company_name' => $data['company_name'],
                    'company_slug' => $data['company_slug'],
                    'logo'         => $data['logo'],
                ]);
            }

            return $user;
        });
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return false; // doar admin — dar admin e prins de Gate::before()
    }

    public function view(User $user, User $model): bool
    {
        return $user->id === $model->id; //  vede doar profilul lui
    }

    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    public function delete(User $user, User $model): bool
    {
        return false; //  doar admin poate sterge useri
    }
}
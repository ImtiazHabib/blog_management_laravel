<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
   
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Post $post): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user && ($user->role === 'admin' || $user->id !== null);
    }

    public function update(User $user, Post $post): bool
    {
        return $user->role === 'admin' || $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Post $post): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Post $post): bool
    {
        return $user->role === 'admin';
    }
}

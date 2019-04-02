<?php

namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability)
    {
        if ($user->is_superadmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function view(User $user, Item $item)
    {
        return $user->is_administrator
            ? $item->project->folder_id === $user->folder_id
            : $item->user_id === $user->uuid;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function update(User $user, Item $item)
    {
        return $user->is_administrator
            ? $item->project->folder_id === $user->folder_id
            : $item->user_id === $user->uuid;
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function delete(User $user, Item $item)
    {
        return $user->is_administrator
            ? $item->project->folder_id === $user->folder_id
            : $item->user_id === $user->uuid;
    }

    /**
     * Determine whether the user can restore the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function restore(User $user, Item $item)
    {
        return $user->is_administrator
            ? $item->project->folder_id === $user->folder_id
            : $item->user_id === $user->uuid;
    }

    /**
     * Determine whether the user can permanently delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return mixed
     */
    public function forceDelete(User $user, Item $item)
    {
        return $user->is_administrator
            ? $item->project->folder_id === $user->folder_id
            : $item->user_id === $user->uuid;
    }
}

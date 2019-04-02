<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;


    public function before(User $user, $ability)
    {
        if ($user->is_superadmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        return $user->is_administrator
            ? $project->folder_id === $user->folder_id
            : $user->uuid === $project->user_id;
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->is_administrator
            ? $project->folder_id === $user->folder_id
            : $user->uuid === $project->user_id;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $user->is_administrator
            ? $project->folder_id === $user->folder_id
            : $user->uuid === $project->user_id;
    }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        return $user->is_administrator
            ? $project->folder_id === $user->folder_id
            : $user->uuid === $project->user_id;
    }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        return $user->is_administrator
            ? $project->folder_id === $user->folder_id
            : $user->uuid === $project->user_id;
    }
}

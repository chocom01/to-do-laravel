<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Task $task
     * @return Response
     */
    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id
            ? Response::allow()
            : Response::deny('You are not assigned to this task.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Task $task
     * @return Response|bool
     */
    public function update(User $user, Task $task): Response | bool
    {
        return $user->id === $task->user_id
            ? Response::allow()
            : Response::deny('You are not assigned to this task.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Task $task
     * @return Response|bool
     */
    public function delete(User $user, Task $task): Response | bool
    {
        return $user->id === $task->user_id
            ? Response::allow()
            : Response::deny('You are not assigned to this task.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return Response|bool
     */
    public function restore(): Response | bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return Response|bool
     */
    public function forceDelete(): Response | bool
    {
        return true;
    }
}

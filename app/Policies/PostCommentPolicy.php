<?php

namespace App\Policies;

use App\PostComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any post comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the post comment.
     *
     * @param  \App\User  $user
     * @param  \App\PostComment  $postComment
     * @return mixed
     */
    public function view(User $user, PostComment $postComment)
    {
        //
    }

    /**
     * Determine whether the user can create post comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the post comment.
     *
     * @param  \App\User  $user
     * @param  \App\PostComment  $postComment
     * @return mixed
     */
    public function update(User $user, PostComment $postComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the post comment.
     *
     * @param  \App\User  $user
     * @param  \App\PostComment  $postComment
     * @return mixed
     */
    public function delete(User $user, PostComment $postComment)
    {
        return $user->role = 1 || $user->id == $postComment->user_id;
    }

    /**
     * Determine whether the user can restore the post comment.
     *
     * @param  \App\User  $user
     * @param  \App\PostComment  $postComment
     * @return mixed
     */
    public function restore(User $user, PostComment $postComment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post comment.
     *
     * @param  \App\User  $user
     * @param  \App\PostComment  $postComment
     * @return mixed
     */
    public function forceDelete(User $user, PostComment $postComment)
    {
        //
    }
}

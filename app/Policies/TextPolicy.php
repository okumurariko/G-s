<?php

namespace App\Policies;

use App\Text;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TextPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('can:update,Text')->only('update');
    }

    public function edit(User $user, Text $text)
     {
         return $user->id == $text->user_id;
     }

   public function update(User $user, Text $text)
     {
         return $user->id == $text->user_id;
     }
}

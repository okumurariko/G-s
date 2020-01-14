<?php

namespace App\Policies;

use App\Text;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->middleware('can:update,User')->only('update');
    }

    public function edit(User $user, User $model)
   {
       return $user->id == $model->id;
   }

    public function update(User $user, User $model)
     {
         return $user->id == $model->id;
     }
}

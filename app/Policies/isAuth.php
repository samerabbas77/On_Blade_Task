<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class isAuth
{

        public function view(User $user, Task $task): bool
        {
            if($user->id == $task->user_id)
            {
                return true;
            }else{
                return false;
            }
        
        }

       
       
        
 
}
  


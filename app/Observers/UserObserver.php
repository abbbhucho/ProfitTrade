<?php

namespace App\Observers;
use Auth;
use App\User;
use App\Activitie;
use Illuminate\Http\Request;
class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if ($user->wasRecentlyCreated == true) {
            // Data was just created
            $action = 'new_account_made';
            if (Auth::check()) {
                
                /**----------To check if admin or the user has created account--------- */
                if(Auth::id() == $user->id){
                    $id = Auth::user()->id;
                }
                else{
                    $id = $user->id;
                }
              }  
                $activity = new Activitie;
                $activity->user_id = $user->id;
                $activity->description = $user->id.",".$action.",".$_SERVER['REMOTE_ADDR']; 
                $activity->save();
            
        }
    }
   
    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}

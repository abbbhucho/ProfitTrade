<?php

namespace App\Observers;
use Auth;
use App\Stock_detail;
use App\Activitie;
class ActivitieObserver
{
    /**
     * Handle the stock_detail "created" event.
     *
     * @param  \App\Stock_detail  $stockDetail
     * @return void
     */
    public function created($model)
    {
        //dd($model);
        if ($model->wasRecentlyCreated) {
            // Data was just created
            $action = 'created';
    } else{
            // Data was updated
            $action = 'updated';
            }
    
            $activity = new Activitie;
            $activity->id = $model->id;
            $activity->user_id = Auth::user()->id;
            $activity->description =  Auth::user()->name.",".$action.",".$model->stock_name.",".$model->buy_quantity.",@".$model->buy_price; 
            $activity->save();
        
    }

    /**
     * Handle the stock_detail "updated" event.
     *
     * @param  \App\Stock_detail  $stockDetail
     * @return void
     */
    public function updated(Stock_detail $stockDetail)
    {
        //
    }

    /**
     * Handle the stock_detail "deleted" event.
     *
     * @param  \App\Stock_detail  $stockDetail
     * @return void
     */
    public function deleted($model)
    {
            $activity = new Activitie;
            $activity->id = $model->id;
            $activity->user_id = Auth::user()->id;
            $activity->description = Auth::user()->name.",deleted,".$model->stock_name.",".$model->buy_quantity.",@".$model->buy_price; 
            $activity->save();
    }

    
}

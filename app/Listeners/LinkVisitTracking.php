<?php

namespace App\Listeners;

// use App\Events\Linkvisited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use AshAllenDesign\ShortURL\Events\ShortURLVisited;
use App\Models\ShortUrlVisit; 
use Illuminate\Http\JsonResponse;

class LinkVisitTracking
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Linkvisited  $event
     * @return void
     */
    public function handle(ShortURLVisited $event){
    
        $shorturlvisitobj = ShortUrlVisit::where('short_url_id',$event->shortURLVisit->short_url_id)->where('ip_address',$event->shortURLVisit->ip_address)->get();

        // echo "<pre>";print_r($shorturlvisitobj);
        // echo "</pre>";exit;
        if(count($shorturlvisitobj)>1){
            echo 'You have already visited this link';exit;
            // return new JsonResponse(['success' => false, 'message' => 'You have already visited this link'], 422);
        }

        \Log::info('On link visit call', ['event' => $event]);
    }
}

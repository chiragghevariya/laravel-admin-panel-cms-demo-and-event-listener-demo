<?php

namespace App\Listeners;

use App\Events\SaveDataNotificationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveDataNotificationMessage
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
     * @param  SaveDataNotificationEvent  $event
     * @return void
     */
    public function handle(SaveDataNotificationEvent $event)
    {   
        // var_dump($event->dataMessage[0]);exit;
        flashMessage('success',"Data successfully saved.");
        flashMessage('info',"Custome Message sended " .$event->dataMessage[0]);
    }
}

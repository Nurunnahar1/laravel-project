<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\PostMail;
use App\Events\PostNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostNotification $event): void
    {
        $users = User::get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new PostMail($event->post));
        }

    }
}

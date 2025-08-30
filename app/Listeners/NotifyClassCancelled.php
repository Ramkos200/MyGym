<?php

namespace App\Listeners;

use App\Events\ClassCancelled;
use App\Jobs\ClassCancelledNotificationJob;
use App\Mail\ClassCancelMail;
use App\Notifications\ClassCancelledNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;


class NotifyClassCancelled
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
    public function handle(ClassCancelled $event): void
    {
        //
        // $schedualedClass = $event->schedualedClass;
        // Log::info($schedualedClass);
        $members = $event->schedualedClass->members()->get();

        $classname = $event->schedualedClass->classType->name;
        $classDateTime = $event->schedualedClass->date_time;
        $details = compact('classname', 'classDateTime');
        // //send mail to each member
        // $members->each(function ($user) use ($details) {

        //     Mail::to($user)->send(new ClassCancelMail($details));
        // });

        //this was moved to the Job
        // Notification::send($members, new ClassCancelledNotification($details));

        //use job instead of notification and Mail
        ClassCancelledNotificationJob::dispatch($members, $details);
    }
}
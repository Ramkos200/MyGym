<?php

namespace App\Console\Commands;

use GuzzleHttp\Psr7\Query;
use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\RemindsMembersNotification;
use Illuminate\Support\Facades\Notification;

class RemindsMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reminds-members';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind Memebrs to Book a Class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $members = User::where('role', 'member')->whereDoesntHave('bookings', function ($query) {
            $query->where('date_time', '>', now());
        })->select('name', 'email')->get();
        // // //to output to termina
        // // $this->table(
        // //     ['Name','Email'],
        // //     $members->toarray()
        // );
        Notification::send($members, new RemindsMembersNotification);
    }
}
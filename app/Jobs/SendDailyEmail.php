<?php

namespace App\Jobs;

use Exception;
use App\Models\User;
use App\Mail\DailyTasks;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendDailyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $users = User::select('id','name','email')->whereHas('tasks',function($query)
        {
            $query->where('status','Pending');
        })->with('tasks',function($query)
        {
            $query->where('status','Pending');
        }
        )->get();

        if($users->isEmpty())
        {
            throw new Exception('No users found');
        }
        foreach( $users as $user)
            {
                Log::info("Send Email to".$user->mail);
                Mail::to($user->email)->send(new DailyTasks(
                    $user->tasks,
                    $user
                ));
            
            }
    }
}

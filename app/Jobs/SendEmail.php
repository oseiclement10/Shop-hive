<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendEmail implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $user;
    protected $details;



    /**
     * Create a new job instance.
     */
    public function __construct( User $user, $details)
    {
        $this->user = $user;
        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->details["type"] == "verifyMail") {
            Notification::send($this->user, new VerifyEmail);
        }
    }
}

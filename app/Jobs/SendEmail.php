<?php

namespace App\Jobs;

use App\Notifications\UserEmailVerification;
use Illuminate\Auth\Authenticatable;
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
use Illuminate\Support\Facades\Log;

class SendEmail implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $user;
    protected $details;



    /**
     * Create a new job instance.
     */
    public function __construct($user, $details)
    {
        $this->user = $user;
        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        if ($this->details["type"] == "verifyUserMail") {
            Notification::send($this->user, new UserEmailVerification("user"));
        }

        if ($this->details["type"] == "verifyVendorMail") {
            Notification::send($this->user, new UserEmailVerification("vendor"));
        }

    }
}

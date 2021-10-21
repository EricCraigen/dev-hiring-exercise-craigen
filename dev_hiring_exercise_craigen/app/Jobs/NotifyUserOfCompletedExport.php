<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\ExportReady;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotifyUserOfCompletedExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    // public $user_file_tag;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        // $this->user_file_tag = $user->last_name.'_'.$user->id.'_'.now()->format('Y-m-d');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::where('id', $this->user->id)->update([
            'has_export' => true,
            // 'export_file_tag' => $this->user->last_name.'_'.$this->user->id.'_'.now()->format('Y-m-d'),
        ]);
    }
}

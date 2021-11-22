<?php

namespace App\Console\Commands;

use App\Jobs\SendEmails as SendEmailsJob;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:new-post-alert {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send new post notifications to subscribed users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $post = Post::findOrFail($this->argument('post'));
        $key = "alert-for-post-{$post->id}";

        if (Cache::has($key)) {
            return;
        }

        SendEmailsJob::dispatch($post);
        Cache::put($key, true, now()->addMinutes(60));
    }
}

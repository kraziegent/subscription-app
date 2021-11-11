<?php

namespace App\Console\Commands;

use App\Mail\NewPostAlert;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:new-post-alert {post} {subscribers*}';

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
        $subscribers = User::whereIn('id', $this->argument('subscribers'))->get();

        $post = Post::findOrFail($this->argument('post'));

        foreach($subscribers as $subscriber) {
            Mail::to($subscriber)->send(new NewPostAlert($post));
        }
    }
}

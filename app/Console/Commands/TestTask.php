<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SocialAuthController;
use App\Models\SocialPost;

class TestTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello World';

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
     * @return int
     */
    public function handle()
    {
        #llamar a la función cronjob de SocialAuthController
        
        
        $posts = SocialPost::all()->where('user_id', auth()->user()->id);
        ddd($posts);
        
        /*$number = count($posts->toArray());
        logger($posts);
          for ($i=0; $i < $number; $i++) { 
            $socialAuthController = new SocialAuthController();
            $socialAuthController->postToTwitter($posts[$i]);
          }*/
       
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class EnviarEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'colaEmail:enviar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia los emails que estan en la tabla jobs';

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
        
        //Log::info('enviado los emails');
        //exec('php artisan queue:work --stop-when-empty');
        //Artisan::call('queue:work',['--timeout'=>'1']);
        //Artisan::call('queue:work');
        Artisan::call('queue:restart');
        //Artisan::call('queue:listen');
        
    }
}

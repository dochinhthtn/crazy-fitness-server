<?php

namespace App\Console\Commands;

use App\Models\Exercise;
use Illuminate\Console\Command;

class GetExercisesCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getExercises';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $path = database_path('raw/exercises.json');

        $file = fopen($path, 'r');
        $content = fread($file, filesize($path));
        fclose($file);

        $data = json_decode($content, true);
        foreach($data as $exerciseData) {
            Exercise::create($exerciseData);
        }
        echo "OK";
    }
}

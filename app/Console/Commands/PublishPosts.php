<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PublishPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish schedule posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = date("Y-m-d H:i:s");
        $data = DB::table('posts')->where('show', false)->whereDate('schedule_on', "<", $now)->get();
        $data->each(function ($item) {
            DB::table('posts')->where('id', $item->id)->update(['show' => true]);
        });
        return 0;
    }
}

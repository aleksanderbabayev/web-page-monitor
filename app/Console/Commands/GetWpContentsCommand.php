<?php

namespace App\Console\Commands;

use App\Models\WpChange;
use App\Services\DiffService;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetWpContentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getwpcontents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get monitored web page contents';

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
        $webPageUrl = 'http://'.env('MONITORED_SITE_ADDRESS').'/'.env('MONITORED_PAGE_ADDRESS');
        Log::channel('wpmonitor')->info('GET '.$webPageUrl);
        $newContents = @file_get_contents($webPageUrl);
        
        if ($newContents === false) {
            Log::channel('wpmonitor')->error('FAIL');
        
        } else {
            $lastChange = WpChange::latest()->first();
            if (is_null($lastChange)) {
                Log::channel('wpmonitor')->error('FIRST');
                WpChange::create([
                    'contents' => $newContents,
                ]);
            
            } else {
                if (md5($lastChange->contents) == md5($newContents)) {
                    Log::channel('wpmonitor')->info('NO DIFF');
                
                } else {
                    Log::channel('wpmonitor')->info('DIFF');

                    $diffService = new DiffService($lastChange->contents, $newContents);
                    $diffService->diff();
                    $stats = $diffService->stats();

                    WpChange::create([
                        'contents' => $newContents,
                        'inserted' => $stats['inserted'],
                        'deleted' => $stats['deleted'],
                        'unmodified' => $stats['unmodified'],
                        'changed_ratio' => round($stats['changedRatio']*100),
                        'diff' => 1
                    ]);
                }
            }
        }
        
        return 0;
    }
}

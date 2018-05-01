<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EntriesUpdateMissingHours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'entry:update_missing_hours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all time entries missing the hours';

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
        $entries = \App\Entry::whereNull('hours')->whereNotNull('ended_at')->get();
        foreach($entries as $entry) {
            $this->info("Entry #{$entry->id}");
            try {
                dispatch(new \App\Jobs\EntryUpdateHours($entry))
                    ->onConnection('sync');
            }
            catch(\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }
}

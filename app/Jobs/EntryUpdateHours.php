<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EntryUpdateHours implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $entry;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->entry->ended_at) {
            $start  =   \Carbon\Carbon::parse($this->entry->started_at);
            $end    =   \Carbon\Carbon::parse($this->entry->ended_at);

            // Determine the hours and minute
            $minutes    =   $start->diffInMinutes($end);
            $hours      =   round(($minutes/60), 2);

            try {
                $this->entry->update(['hours' => $hours]);
            }
            catch(\Exception $e) {
                \Log::error('Error updating entry', [
                    'err_msg'   =>  $e->getMessage(),
                    'entry_id'  =>  $this->entry->id,
                ]);
                throw new \Exception('Error updating entry');
            }

            // TODO: Dispatch the job to update the entry's project
        }
        else {
            \Log::warning('Entry does not have ending timestamp', [
                'entry_id'  =>  $this->entry->id,
            ]);
            throw new \Exception('Entry does not have ending timestamp');
        }
    }
}

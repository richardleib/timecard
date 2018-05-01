<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProjectUpdateHours implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $project;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hours = $this->project->entries->sum('hours');

        \Log::info('Project hours logged', ['hours' => $hours]);

        try {
            $this->project->update(['hours_logged' => $hours]);
        }
        catch(\Exception $e) {
            \Log::error('Error updating project hours', [
                'err_msg'       =>  $e->getMessage(),
                'project_id'    =>  $this->project->id,
            ]);
            throw new \Exeption('Error updating project hours');
        }
    }
}

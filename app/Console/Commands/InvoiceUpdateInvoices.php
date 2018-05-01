<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InvoiceUpdateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:update_invoices {--invoice=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update invoice data';

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
        if($this->option('invoice')) $invoices = \App\Invoice::whereIn(explode(',', $this->option('invoice')));
        else $invoices = \App\Invoice::all();

        foreach($invoices as $invoice) {
            $this->info("Invoice #{$invoice->id}");
            try {
                dispatch(new \App\Jobs\InvoiceUpdateData($invoice))
                    ->onConnection('sync');
            }
            catch(\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }
}

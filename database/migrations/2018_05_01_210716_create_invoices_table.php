<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('team_id')->unsigned()->nullable()->index();
            $table->integer('client_id')->unsigned()->nullable()->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('hours_logged', 7, 2)->default(0);
            $table->decimal('total', 7, 2)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('invoice_projects', function(Blueprint $table) {
            $table->integer('invoice_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_projects');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('customer_id');
            $table->date('date_paid')->nullable();
            $table->date('date_sent')->nullable();
            $table->string('email_subject');
            $table->date('invoice_date');
            $table->date('invoice_due_date');
            $table->date('invoice_scheduled_date')->nullable();
            $table->boolean('is_canceled');
            $table->integer('migrate_id');
            $table->timestamps();
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
    }
}

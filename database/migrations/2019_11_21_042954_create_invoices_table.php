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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('collaborator_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('invoice_state_id');
            $table->unsignedInteger('code')->unique();
            $table->date('expiration_at');
            $table->decimal('value_tax');
            $table->decimal('total_value');
            $table->timestamps();

            $table->foreign('collaborator_id')->references('id')->on('collaborators');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('invoice_state_id')->references('id')->on('invoice_states'); 
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

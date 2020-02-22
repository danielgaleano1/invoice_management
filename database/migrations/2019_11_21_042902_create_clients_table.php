<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('document_type_id');
            $table->string('code')->unique();
            $table->string('name', 200);
            $table->string('surname', 200);
            $table->string('address', 200);
            $table->string('phone', 30);
            $table->string('email', 200)->unique();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('document_type_id')->references('id')->on('document_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

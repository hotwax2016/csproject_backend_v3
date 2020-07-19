<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guide_id');
            $table->unsignedBigInteger('tourist_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->string('interests')->nullable();
            $table->integer('conform')->default(3);
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
        Schema::dropIfExists('appointments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->unsignedBigInteger('review_count')->default(0);
            $table->boolean('available')->default(false);
            $table->boolean('active')->default(false);
            $table->integer('star_1')->default(0);
            $table->integer('star_2')->default(0);
            $table->integer('star_3')->default(0);
            $table->integer('star_4')->default(0);
            $table->integer('star_5')->default(0);
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
        Schema::dropIfExists('guides');
    }
}

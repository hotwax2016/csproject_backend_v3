<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('bio')->nullable();
            $table->string('title')->nullable();
            $table->string('gender')->nullable();
            $table->string('dp_url')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('dob')->nullable();
            $table->string('passport_id')->nullable();
            $table->string('nic')->nullable();
            $table->string('address')->nullable();
            $table->string('lang_primary')->nullable();
            $table->string('lang_secondary')->nullable();
            $table->string('country')->nullable();
            $table->boolean('active')->nullable()->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

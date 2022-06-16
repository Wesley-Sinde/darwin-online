<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('CustFName');
            $table->string('CustLName');
            $table->string('Title');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('Country');
            $table->string('Phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('PostCode');
            $table->boolean('admin')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     * CustEmail CustFName CustLName Title Address City State Country PostCode Phone
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

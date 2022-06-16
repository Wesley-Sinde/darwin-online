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
        Schema::create('Purchase', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('PurchaseNo');

            $table->string('email');
            $table->foreign('email')->references('email')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *PurchaseNo Date CustEmail

     * @return void
     */
    public function down()
    {
        schema::dropIfExists('Purchase');
    }
};

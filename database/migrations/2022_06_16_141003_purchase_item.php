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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->integer('Quantity');

            $table->bigInteger('PurchaseNo')->unsigned()->nullable();
            // $table->foreign('PurchaseNo')->references('id')->on('Purchase')->onDelete('cascade');


            //$table->bigInteger('PurchaseNo');
            // $table->foreign('PurchaseNo')->references('PurchaseNo')->on('Purchase');

            $table->unsignedBigInteger('ProductNo')->unsigned();
            // $table->foreign('ProductNo')->references('id')->on('Product');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * ItemNo Quantity PurchaseNo ProductNo

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PurchaseItem');
    }
};

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
        Schema::create('Product', function (Blueprint $table) {
            $table->id();
            $table->integer('Size');
            $table->string('Category');
            $table->string('Colour');
            $table->string('image');
            $table->longText('Description');
            $table->double('Price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * ProductNo Description Price Category Colour Size

     * @return void
     */
    public function down()
    {
        //
    }
};

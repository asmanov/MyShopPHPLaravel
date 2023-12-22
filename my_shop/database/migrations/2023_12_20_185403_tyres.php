<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Tyres', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('brandId')->unsigned();
            $table->foreign('brandId')->references('brandId')->on('Brands')->onDelete('cascade');
            $table->string('model', 50);
            $table->integer('wid')->unsigned();
            $table->foreign('wid')->references('wId')->on('Widths')->onDelete('cascade');
            $table->integer('hid')->unsigned();
            $table->foreign('hid')->references('hId')->on('Heights')->onDelete('cascade');
            $table->integer('rid')->unsigned();
            $table->foreign('rid')->references('rId')->on('Radiuses')->onDelete('cascade');
            $table->integer('countryid')->unsigned();
            $table->foreign('countryid')->references('CountryId')->on('Countries')->onDelete('cascade');
            $table->integer('quantity')->unsigned();
            $table->decimal('price', 7, 2, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

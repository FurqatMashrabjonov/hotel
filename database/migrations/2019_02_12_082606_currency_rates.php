<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CurrencyRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('status_id');
            $table->unsignedBigInteger('currency_from');
            $table->unsignedBigInteger('currency_to');
            $table->unsignedDouble('value');
            $table->timestamps();

            $table->foreign('currency_to')->references('id')->on('currencies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('currency_from')->references('id')->on('currencies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('status_id')->references('id')->on('status_codes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_rates');
    }
}

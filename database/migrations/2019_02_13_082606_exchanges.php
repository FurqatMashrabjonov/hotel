<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exchanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_from');
            $table->unsignedBigInteger('wallet_to');
            $table->decimal('paid_amount');
            $table->decimal('received_amount');
            $table->unsignedBigInteger('currency_rate_id');
            $table->timestamps();

            $table->foreign('wallet_from')->references('id')->on('wallets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('wallet_to')->references('id')->on('wallets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('currency_rate_id')->references('id')->on('currency_rates')
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
        Schema::dropIfExists('exchanges');
    }
}

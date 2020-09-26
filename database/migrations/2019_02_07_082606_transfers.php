<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_from');
            $table->unsignedBigInteger('wallet_to');
            $table->string('comment');
            $table->decimal('amount');
            $table->unsignedSmallInteger('status_id');
            $table->timestamps();

            $table->foreign('wallet_from')->references('id')->on('wallets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('wallet_to')->references('id')->on('wallets')
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
        Schema::dropIfExists('transfers');
    }
}

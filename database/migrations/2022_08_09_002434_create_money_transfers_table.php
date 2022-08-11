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
        Schema::create('money_transfers', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->unsignedBigInteger('payer');
            $table->foreign('payer')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('payee');
            $table->foreign('payee')
                ->references('id')
                ->on('users');
            $table->string('status');
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
        Schema::dropIfExists('money_transfers');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->integer('id');
            $table->timestamps();
            $table->string('symbol',4);
            $table->integer('transactionShares')->length(11)->nullable();  
            $table->float('sharePrice',8,2)->nullable();
            $table->string('transactionType',4)->nullable();
            $table->unique('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_histories');
    }
}

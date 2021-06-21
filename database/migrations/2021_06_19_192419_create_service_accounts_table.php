<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('restrict');
            $table->string('account');
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
        Schema::dropIfExists('service_accounts');
    }
}

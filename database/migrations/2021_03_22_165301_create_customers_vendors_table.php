<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_vendors', function (Blueprint $table) {
            $table->id();
            $table->string("CVName", 50)->nullable();
            $table->string("CVEmail", 50)->nullable();
            $table->string("CVMobile", 15)->nullable();
            $table->string("CVAddress", 500)->nullable();
            $table->string("CVCity", 50)->nullable();
            $table->string("CVState", 50)->nullable();
            $table->string("CVPin", 6)->nullable();
            $table->string("CVGSTN", 15)->nullable();
            $table->string("CVPAN", 10)->nullable();
            $table->boolean("CVType")->nullable();
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
        Schema::dropIfExists('customers_vendors');
    }
}

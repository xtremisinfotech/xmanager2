<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->string('FirmName', 100)->nullable();
            $table->string('FirmAddress', 500)->nullable();
            $table->string('FirmCity', 50)->nullable();
            $table->integer('FirmPinCode')->nullable();
            $table->string('FirmState', 50)->nullable();
            $table->string('FirmCountry', 50)->nullable();
            $table->string('FirmPhoneNo', 15)->nullable();
            $table->string('FirmGSTN', 15)->nullable();
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
        Schema::dropIfExists('firms');
    }
}

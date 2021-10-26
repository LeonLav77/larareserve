<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutdatedDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdatedDays', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('expiryDate');
            $table->integer('vrijeme');
            $table->string('status');
            $table->foreignId('reservationID')->nullable();
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
        Schema::dropIfExists('outdatedDays');
    }
}

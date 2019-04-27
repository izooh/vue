<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('Opening');
            $table->integer('Verification');
            $table->integer('Closing');
            $table->integer('Understanding');
            $table->integer('Probing');
            $table->integer('Negotiation');
            $table->integer('Product_Knowledge');
            $table->integer('Urgency');
            $table->integer('Commitment');
            $table->integer('Handling_Efficiency');
            $table->integer('Empathy');
            $table->integer('Tone_Manner');
            $table->integer('Language');
            $table->integer('Timeliness');
            $table->integer('Listening');
            $table->integer('First_Contact_Resolution');
            $table->integer('Call_Controlling');
            $table->integer('Totals');

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
        Schema::dropIfExists('ratings');
    }
}

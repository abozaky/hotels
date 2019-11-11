<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('card_number')->nullable();
            $table->integer('ccv')->nullable();
            $table->string('card_name')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->integer('post_code')->nullable();
            $table->string('contacts_name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->integer('code')->nullable();
            

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
        Schema::dropIfExists('billing_informations');
    }
}

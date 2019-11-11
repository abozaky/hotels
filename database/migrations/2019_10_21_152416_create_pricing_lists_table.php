<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('nationality');
            $table->string('user_type')->default('guest');
            $table->string('price_adult');
            $table->string('price_child');
            
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
        Schema::dropIfExists('pricing_lists');
    }
}

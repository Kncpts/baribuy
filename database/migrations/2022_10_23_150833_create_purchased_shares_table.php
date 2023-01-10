<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->unsignedInteger('property_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->bigInteger('monthly_rent')->nullable();
            $table->bigInteger('no_of_share_buy')->nullable();
            $table->bigInteger('price_per_share')->nullable();
            $table->bigInteger('propety_parchased_price')->nullable();
            $table->bigInteger('total_shares')->nullable();
            $table->bigInteger('interest_rate')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('street')->nullable();
            $table->bigInteger('zip_code')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
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
        Schema::dropIfExists('purchased_shares');
    }
}

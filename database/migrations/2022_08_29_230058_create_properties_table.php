<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('bed');
            $table->double('bath');
            $table->double('sq_ft');
            $table->date('year_built');
            $table->bigInteger('monthly_rent');
            $table->string('address');
            $table->string('street');
            $table->string('zip_code');
            $table->bigInteger('city_id');
            $table->bigInteger('country_id')->default(1);
            $table->unsignedBigInteger('rental_status_id')->default(1);
            $table->double('first_dividend_yield');
            $table->date('first_dividend_date');
            $table->text('timeline_to_rent_descrition');
            $table->bigInteger('purchase_price');
            $table->bigInteger('property_improvements_cash_reserves');
            $table->bigInteger('closing_costs_offering_costs_holding_costs');
            $table->bigInteger('baribuy_sourcing_fee');
            $table->bigInteger('property_loan_amount');
            $table->bigInteger('equity_raised_from_investors');
            $table->integer('financing');
            $table->bigInteger('ipo_price_per_share');
            $table->bigInteger('total_shares');
            $table->string('hold_period');
            $table->bigInteger('available_price');
            $table->bigInteger('asset_management_fee_quarterly');
            $table->double('interest_rate');
            $table->integer('active')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('rental_status_id')->references('id')->on('rental_statuses')->onDelete('cascade');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('properties');
    }
}

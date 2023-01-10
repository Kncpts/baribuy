<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'title', 'description', 'user_id', 'bed',
        'bath',
        'sq_ft',
        'year_built',
        'monthly_rent',
        'address',
        'street',
        'zip_code',
        'city_id',
        'state_id',
        'country_id',
        'rental_status_id',
        'first_dividend_yield',
        'first_dividend_date',
        'timeline_to_rent_descrition',
        'purchase_price',
        'property_improvements_cash_reserves',
        'closing_costs_offering_costs_holding_costs',
        'baribuy_sourcing_fee',
        'property_loan_amount',
        'equity_raised_from_investors',
        'financing',
        'ipo_price_per_share',
        'total_shares',
        'hold_period',
        'available_price',
        'asset_management_fee_quarterly',
        'interest_rate',
    ];

    public function propertyGalleries()
    {
        return $this->hasMany(PropertyGallery::class, 'property_id', 'id')->orderBy('ordering', 'desc');
    }
    public function propertyDocuments()
    {
        return $this->hasMany(propertyDocument::class, 'property_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

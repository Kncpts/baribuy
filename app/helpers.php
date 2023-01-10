<?php

use Carbon\Carbon;

if (!function_exists('myIsset')) {
    function myIsset($object, $key)
    {
        if (isset($object) && isset($object->$key)) {
            return $object->$key;
        }
        return '';
    }
}

if (!function_exists('currencyConverter')) {
    function currencyConverter($price)
    {

        return '$' . number_format($price, 2);
    }
}



if (!function_exists('currencyConverter')) {
    function getTotalPriceOfshare($sharePrice)
    {
        return '$' . $sharePrice;
    }
}

if (!function_exists('dateGetYear')) {
    function dateGetYear($date)
    {
        $date = Carbon::createFromFormat('Y-m-d', $date)->format('Y');
        return $date;
    }
}


// if (!function_exists('getFavouriteProperty')) {
//     function getFavouriteProperty($favouriteArray,$propertyId)
//     {
//         if(in_array($propertyId, $favouriteArray)){
//         return $propertyId;
//     }
//     }
// }

if (!function_exists('getAddressFromProperty')) {
    function getAddressFromProperty($property)
    {
        $address = '';
        if (isset($property)) {
            if (isset($property['address'])) {
                $address = $property['address'];
            }

            if (isset($property->city)) {
                $address = $address . ' ' . $property->city->name;
            }

            if (isset($property->state)) {
                $address = $address . ' ' . $property->state->name . ', ';
            }

            if (isset($property->zip_code)) {
                $address = $address . ' ' . $property->zip_code;
            }

            if (isset($property->country)) {
                $address = $address . ' ' . $property->country->name;
            }
        }

        return $address;
    }
}

if (!function_exists('totalPropertyAmount')) {
    function totalPropertyAmount($property)
    {
        $price = 0;
        if (isset($property)) {
            if (isset($property->baribuy_sourcing_fee)) {
                $price = $property->baribuy_sourcing_fee;
            }

            if (isset($property->closing_costs_offering_costs_holding_costs)) {
                $price = $price + $property->closing_costs_offering_costs_holding_costs;
            }

            if (isset($property->property_improvements_cash_reserves)) {
                $price = $price + $property->property_improvements_cash_reserves;
            }

            if (isset($property->purchase_price)) {
                $price = $price + $property->purchase_price;
            }
        }
        return currencyConverter($price);
    }
}

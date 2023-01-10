<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function registerCustomer(Request $request)
    {

            $entity_type = '';
            $entity_name = '';
            $signatory_title = '';
            if( $request["form"][6]["value"] == "entity_trust_or_corporation"){
                
                $entity_type = $request["form"][7]["value"];
                $entity_name = $request["form"][8]["value"];
                $signatory_title = $request["form"][9]["value"];

            }else if( $request["form"][6]["value"] == "indiviual_or_personal"){
               
                $entity_name = $request["form"][10]["value"];
                $signatory_title = $request["form"][11]["value"];

            }
            $customer = [
                'first_name' => $request["form"][1]["value"],
                'last_name' => $request["form"][2]["value"],
                'citizen_ship' => $request["form"][5]["value"],
                'account_type' => $request["form"][6]["value"],
                'entity_type' => $entity_type,
                'entity_name' => $entity_name,
                'signatory_title' => $signatory_title,
                'street_address' => $request["form"][12]["value"],
                'apartment_suit' => $request["form"][13]["value"],
                'state' => $request["form"][15]["value"],
                'postal_code' => $request["form"][16]["value"],
                'mailing_address' => $request["form"][17]["value"],
                'country' => $request["form"][18]["value"],
                'phone_number' => $request["form"][19]["value"],
                'dob' => $request["form"][20]["value"],
                'ssn' => $request["form"][21]["value"],
                'ein' => $request["form"][22]["value"]
            ];
        
            Customer::Create($customer);
    }
}

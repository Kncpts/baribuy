<?php

namespace App\Http\Controllers;

use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function registerCustomer(Request $request)
    {
        // dd($request->all());
        
            $entity_type = '';
            $entity_name = '';
            $signatory_title = '';
            if( $request["fields"]["account_type"] == "entity_trust_or_corporation"){
                
                $entity_type = $request["fields"]["entity_type"];
                $entity_name = $request["fields"]["corporate_entity_name"];
                $signatory_title =$request["fields"]["corporate_signatory_title"];

            }else if( $request["fields"]["account_type"] == "retirement"){
               
                $entity_name = $request["fields"]["corporate_entity_name"];
                $signatory_title = $request["fields"]["corporate_entity_name"];

            }
            $customer = [
                'first_name' =>$request["fields"]["first_name"],
                'last_name' =>$request["fields"]["last_name"] ,
                'citizen_ship' => $request["fields"]["citizen_ship"],
                'account_type' =>$request["fields"]["account_type"] ,
                'entity_type' => $entity_type,
                'entity_name' => $entity_name,
                'signatory_title' => $signatory_title,
                'street_address' =>$request["fields"]["street_address"],
                'apartment_suit' => $request["fields"]["apartment_suit"],
                'city' => $request["fields"]["city"],
                'state' => $request["fields"]["state"],
                'postal_code' => $request["fields"]["postal_code"],
                'mailing_address' => $request["fields"]["mailing_address"]  == "true" ? 1 : 0 ,
                'country' => $request["fields"]["country"],
                'phone_number' => $request["fields"]["phone_number"],
                'dob' => $request["fields"]["dob"],
                'ssn' =>$request["fields"]["ssn"],
                'ein' =>$request["fields"]["ein"],
                "net_worth_each_owner_one_million_check" =>  $request["fields"]["net_worth_each_owner_one_million_check"] == "true" ? 1 : 0,
                "net_worth_joint_spouse_check" =>  $request["fields"]["net_worth_joint_spouse_check"] == "true" ? 1 : 0,
                "total_asset_exceeding_check" =>$request["fields"]["total_asset_exceeding_check"] == "true" ? 1 : 0,
                "indiviual_income_check" => $request["fields"]["indiviual_income_check"] == "true" ? 1 : 0,
                "finary_member_check" =>$request["fields"]["finary_member_check"] == "true" ? 1 : 0,
                "member_of_board_of_director_check" => $request["fields"]["member_of_board_of_director_check"] == "true" ? 1 : 0,
            ];
        
            DB::beginTransaction();
            try{
                Customer::Create($customer);
                User::Create([ 
                    'name' => $request["fields"]["first_name"]." ".$request["fields"]["last_name"], 
                    'email'=> $request["fields"]["email"], 
                    'password' =>Hash::make($request["fields"]["email"]),
                    'admin' => 0, 
                ]);
                DB::commit();
                return response()->json(['success' => true,"redirectUrl" => url('/login')]);
            }catch(\Exception $ex){
                return response()->json(['success' => false,"Exception Message" => $ex->getMessage()]);
                DB::rollBack();
            }
    }
}

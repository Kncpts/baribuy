<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Country;
use App\Property;
use App\Favorite;

use App\PropertyGallery;
use App\PropertyDocument;

use App\RentalStatus;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'DESC')
            ->paginate(20);
        return view('properties.index', compact('properties'));
    }

    public function setFavourite($id = null)
    {        if (Auth::check()) {

        $values = array();
        $values['user_id'] = Auth::user()->id;
        $values['property_id'] =$id;
        $values['is_favourite'] =1;

           

            $property = Favorite::create($values);

        
    
       
        return redirect()->route('listings')->with('msg_success', 'Property is Added to Favourite');
    }else{

        return redirect()->route('login');
    }
    }
    public function unsetFavourite($id = null)
    {
        if (Auth::check()) {
        $values = array();
        $values['user_id'] = Auth::user()->id;
        $values['property_id'] =$id;
        $values['is_favourite'] =0;

        $propertyexists = Favorite::where('id',$id)->get();

        if ($propertyexists) {
            $property = Favorite::where('id',$id)->delete();

        } 
        return redirect()->route('listings')->with('msg_success', 'Property is Added to Favourite');
    }else{

        return redirect()->route('login');
    }

    }
    public function add($id=null)
    {
        $countries  = Country::orderBy('created_at', 'DESC')->get();
        $states     = State::orderBy('created_at', 'DESC')->get();
        $cities     = City::orderBy('created_at', 'DESC')->get();
        $rentalStatus     = RentalStatus::orderBy('created_at', 'DESC')->get();
        $rentalStatus     = RentalStatus::orderBy('created_at', 'DESC')->get();
        $categories       = Category::where('active', 1)->orderBy('created_at', 'DESC')->get();
        $property = '';
        if (isset($id)) {
            $property = Property::findOrFail($id);
            return view('properties.create', compact('rentalStatus', 'cities', 'countries', 'states', 'property', 'categories'));

        }else{

            return view('properties.create', compact('rentalStatus', 'cities', 'countries', 'states', 'categories'));


        }


    }

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image_ext = $image->getClientOriginalExtension();
        $lid = md5($imageName . uniqid());

        $fileInfo = pathinfo($imageName);
        $filename = $fileInfo['filename'];
        $newname  = $filename . $lid . "." . $image_ext;
        $image->move(public_path('images'), $newname);
        $getGallery=PropertyGallery::where('property_id',$request->property_id)->get();
        $getOrderC=0;
        if($getGallery->count()!=0){

            $getOrder=PropertyGallery::where('property_id',$request->property_id)->get('ordering')->last();
            
            $getOrderC=$getOrder->ordering+1;
        }
        $imageUpload = new PropertyGallery();
        $imageUpload->name = $newname;
        $imageUpload->property_id = $request->property_id;
        $imageUpload->ordering = $getOrderC;

        $imageUpload->save();
        return response()->json(['success' => $newname]);
    }

    public function docFileStore(Request $request)
    {
        $image = $request->file('file');
      dd($request);
        $imageName = $image->getClientOriginalName();
        $image_ext = $image->getClientOriginalExtension();
        $lid = md5($imageName . uniqid());

        $fileInfo = pathinfo($imageName);
        $filename = $fileInfo['filename'];
        $newname  = $filename . $lid . "." . $image_ext;
        $image->move(public_path('documents'), $newname);
            $imageUpload = new PropertyDocument();
            $imageUpload->name = $newname;
            $imageUpload->document = $request->post('filename');

            $imageUpload->property_id = $request->property_id;
        
       

        $imageUpload->save();
        return redirect()->route('admin.property.edit', $request->property_id)->with('msg_success', 'Your Property is Updated');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'bed' => 'required|numeric',
            'bath' => 'required',
            'sq_ft' => 'required',
            'year_built' => 'required',
            'monthly_rent' => 'required',
            'address' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'rental_status_id' => 'required',
            'first_dividend_yield' => 'required',
            'first_dividend_date' => 'required',
            'timeline_to_rent_descrition' => 'required',
            'purchase_price' => 'required',
            'property_improvements_cash_reserves' => 'required',
            'closing_costs_offering_costs_holding_costs' => 'required',
            'baribuy_sourcing_fee' => 'required',
            'property_loan_amount' => 'required',
            'equity_raised_from_investors' => 'required',
            'financing' => 'required',
            'ipo_price_per_share' => 'required',
            'total_shares' => 'required',
            'hold_period' => 'required',
            'available_price' => 'required',
            'asset_management_fee_quarterly' => 'required',
            'interest_rate' => 'required',
        ]);
        $values = array_except($request->all(), ['_token', 'uniq_id']);
        $values['user_id'] = Auth::user()->id;
        $categories = $request->category_id;

       
            $property = Property::create($values);
        

        if (isset($categories)) {
            $property->categories()->sync($categories);
        }

        return redirect()->route('admin.property.edit', $property->id)->with('msg_success', 'Your Property is Added');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'bed' => 'required|numeric',
            'bath' => 'required',
            'sq_ft' => 'required',
            'year_built' => 'required',
            'monthly_rent' => 'required',
            'address' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'rental_status_id' => 'required',
            'first_dividend_yield' => 'required',
            'first_dividend_date' => 'required',
            'timeline_to_rent_descrition' => 'required',
            'purchase_price' => 'required',
            'property_improvements_cash_reserves' => 'required',
            'closing_costs_offering_costs_holding_costs' => 'required',
            'baribuy_sourcing_fee' => 'required',
            'property_loan_amount' => 'required',
            'equity_raised_from_investors' => 'required',
            'financing' => 'required',
            'ipo_price_per_share' => 'required',
            'total_shares' => 'required',
            'hold_period' => 'required',
            'available_price' => 'required',
            'asset_management_fee_quarterly' => 'required',
            'interest_rate' => 'required',
        ]);
        $values = array_except($request->all(), ['_token', 'uniq_id']);
        $values['user_id'] = Auth::user()->id;
        $categories = $request->category_id;

        if ($id) {
            $property = Property::findOrFail($id);
            $property->update($values);
        } else {
            $property = Property::create($values);
        }

        if (isset($categories)) {
            $property->categories()->sync($categories);
        }

        return redirect()->route('admin.property.edit', $property->id)->with('msg_success', 'Your Property is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        // $property->delete();
        return redirect()->route('admin.properties')->with('msg_success', 'Property Deleted Successfully');
    }
}

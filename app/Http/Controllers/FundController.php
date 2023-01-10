<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserFund;

class FundController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $rule =  [
            'fund' => 'required|numeric|min:2',
        ];
        $request->validate($rule);
        $user = Auth::user();
        $getFundAmount = UserFund::where('user_id', $user->id)->where('is_active', 1)->first();
        $fund = $request['fund'];
        if (isset($getFundAmount) && $getFundAmount->fund > 0) {
            $fund = $fund + $getFundAmount->fund;
            $getFundAmount->is_active = 0;
            $getFundAmount->save();
        }

        $userDoc = new UserFund();
        $userDoc->fund        = $fund;
        $userDoc->user_id     = Auth::user()->id;
        $userDoc->save();

        toastr()->success('Fund has been store successfully!');

        return redirect()->route('user.profile');
    }
}

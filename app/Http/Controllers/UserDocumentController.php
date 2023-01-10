<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDocumentController extends Controller
{
    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $rule =  [
            'document_name' => 'required',
            'document' => 'required|max:2048',
        ];

        $request->validate($rule);

        $input = $request->all();
        $input['document'] = time() . '.' . $request->document->extension();
        $request->document->move(public_path('uploads/userDocuments'), $input['document']);
        if ($input['document']) {
            $userDoc = new UserDocument();
            $userDoc->name          = $input['document_name'];
            $userDoc->file_name     = $input['document'];
            $userDoc->user_id       = Auth::user()->id;
            $userDoc->save();
        }

        toastr()->success('Document has been saved successfully!');

        return redirect()->route('user.profile');
    }

    public function destroy($id)
    {
        UserDocument::where('id', $id)->where('user_id', Auth::id())->delete();
        toastr()->success('Document has been Deleted successfully!');
        return redirect()->route('user.profile');
    }
}

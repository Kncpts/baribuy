<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use File;
use Response;
 
class PdfController extends Controller
{
    //
    public function index(Request $request,$filename){
        
         return Response::make(file_get_contents(base_path('public/documents/'.$filename)), 200, [
                        'content-type'=>'application/pdf',
                    ]);
    }
}
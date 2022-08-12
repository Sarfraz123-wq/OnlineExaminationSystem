<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addSubjects(Request $request){
        // return $request->all();

        try{
            $subject = new Subject();
            $subject->subj_name = $request->subject;
            $subject->save();

            return response()->json(['success'=>true, 'msg'=> "Your subject is added successfully"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
}

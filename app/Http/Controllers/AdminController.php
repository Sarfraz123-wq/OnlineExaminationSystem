<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addSubjects(Request $request){
        // return $request->all();

        try{
            $subject = new Subject();
            $subject->subject_name = $request->subject;
            $subject->save();

            return response()->json(['success'=>true, 'msg'=> "Your subject is added successfully"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
    public function deleteSubject(Request $request){
        try{
            Subject::where('subject_id',$request->subject_id)->delete();
            return response()->json(['success'=>true, 'msg'=> "Your subject is deleted successfully"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
    public function editSubject(Request $request){
        try{
            $subject = Subject::find($request->subject_id);
            $subject->subject_name = $request->subject_name;
            $subject->save();
            return response()->json(['success'=>true, 'msg'=> "Your subject is deleted successfully"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
    public function examDashboard(){
        $exams = Exam::all();
        $subjects = Subject::all();
        return view('admin.add-exams',['exams'=>$exams, 'subjects'=>$subjects]);
    }
    public function addExams(Request $request){
        try{
            $exam = new Exam();
            $exam->exam_name = $request->exam;
            $exam->subject_id = $request->subject_id;
            $exam->date = $request->date;
            $exam->time = $request->time;
            $exam->save();
            return response()->json(['success'=>true, 'msg'=>"Your exam has been added successfully"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
    }
    public function deleteExam(Request $request){
        try{
            Exam::find($request->id)->delete();
            return response()->json(['success'=>true, 'msg'=> "Your exam is deleted successfully"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        };
    }
    public function editExam(Request $request){
            $exam = Exam::find($request->id);
            $exam->exam_name = $request->exam_name;
            $exam->save();
            $editedExam = Exam::find($exam->id);
            return ["status" => true, "editedExam" => $editedExam];
    }
}

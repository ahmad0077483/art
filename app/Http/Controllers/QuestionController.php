<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QuestionController extends Controller
{
    public function QuestionWeb()
    {
        $questionweb = Question::latest()->get();
        return view('admin.question.index', compact('questionweb'));
    }

    public function AddQuestion()
    {
        return view('admin.question.create');
    }

    public function StoreQuestion(Request $request)
    {
        Question::insert([
            'question' => $request->question,
            'response' => $request->response,


        ]);

        $notification = array(
            'message'=>' با موفقیت ایجاد شد',
            'alert-type'=>'success'
        );

        return redirect()->route('question.web')->with($notification);
    }

    public function EditQuestion($id)
    {
        $questionweb = Question::find($id);
        return view('admin.question.edit', compact('questionweb'));
    }

    public function UpdateQuestion(Request $request, $id)
    {
        $update = Question::where( 'id',$id)->update([
            'question' => $request->question,
            'response' => $request->response,
        ]);
        $notification = array(
            'message'=>' با موفقیت آپدیت شد',
            'alert-type'=>'success'
        );

        return redirect()->route('question.web')->with($notification);



    }


    public function DeleteQuestion($id)
    {
        $question = Question::find($id)->first();

            $question->delete();


        $notification = array(
            'message'=>' با موفقیت حذف شد',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);


    }
}

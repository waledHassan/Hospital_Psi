<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AnswerList;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::whereCompanyId(auth()->user()->company_id)->get();

        return view('dashboard.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $audioname = time() . '.' . $request->audio->extension();
        $request->audio->move(public_path('images'), $audioname);
        $question = Question::create([
            'company_id' => auth()->user()->company_id,
            'name' => $request->name,
            'level_id' => $request->level_id,
            'audio' => $audioname,
            'timing' => $request->timing,
            'order_no' => 0,
            'status' => 1,
        ]);

        foreach ($request->answer as $key => $Ranswer) {
            $imageName = time() . '.' . $Ranswer->extension();
            $Ranswer->move(public_path('images'), $imageName);

            $answer = new AnswerList();
            $answer->company_id = auth()->user()->company_id;
            $answer->answer = $imageName;
            $answer->correct_answer = (($request->correct - 1) == $key) ? 1 : 0;
            $question->answers()->save($answer);
        }

        return redirect(route('question.index'));
    }

    public function status($id, $status)
    {
        $doctor = Question::findOrFail($id);
        $doctor->update(['status' => $status]);

        return response()->json(['msg' => 'done']);
    }

    public function orderings($id, $num)
    {
        $doctor = Question::findOrFail($id);
        $doctor->update(['order_no' => $num]);

        return response()->json(['msg' => 'done']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('dashboard.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *        return redirect(route('doctor.index'));.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Question::findOrFail($id);
        $doctor->delete();

        return redirect(route('question.index'));
    }

    public function update(Request $request, Question $question)
    {





        return redirect(route('question.index'));
    }
}

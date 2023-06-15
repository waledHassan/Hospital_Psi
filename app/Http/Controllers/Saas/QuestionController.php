<?php

namespace App\Http\Controllers\Saas;

use App\Models\Question;
use App\Models\AnswerList;
use App\Services\PerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("question", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $questions = Question::get();

        return view('saas.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("add_question", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        return view('saas.question.create');
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
        $request->audio->move(public_path('upload/question'), $audioname);
        $question = Question::create([
            'name' => $request->name,
            'level_id' => $request->level_id,
            'audio' => $audioname,
            'timing' => $request->timing,
            'order_no' => 0,
            'status' => 1,
        ]);

        foreach ($request->answer as $key => $Ranswer) {
            $imageName = time() . '.' . $Ranswer->extension();
            $Ranswer->move(public_path('upload/answer'), $imageName);

            $answer = new AnswerList();
            $answer->company_id = auth()->user()->company_id;
            $answer->answer = $imageName;
            $answer->correct_answer = (($request->correct - 1) == $key) ? 1 : 0;
            $question->answers()->save($answer);
        }

        return redirect(route('saas.question.index'));
    }

    public function status($id, $status)
    {
        $doctor = Question::findOrFail($id);
        $doctor->update(['status' => $status]);

        return response()->json(['msg' => 'done']);
    }

    public function orderings($id, $num)
    {
        $question = Question::findOrFail($id);
        $question->update(['order_no' => $num]);

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
        $question = Question::findOrFail($id);

        return view('saas.question.view', compact('question'));
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
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("question_edit", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $question = Question::findOrFail($id);

        return view('saas.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *        return redirect(route('doctor.index'));.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = ((new PerService())->getPermissions());
        if (!in_array("question_delete", $permissions)) {
            return redirect()->route('saas.home.index');
        }
        $doctor = Question::findOrFail($id);
        $doctor->delete();

        return redirect(route('saas.question.index'));
    }

    public function update(Request $request, Question $question)
    {
        $catchCorrectAnswer = $question->answers()->get()->where('correct_answer', 1);
        foreach ($catchCorrectAnswer as $key => $value) {
            $value->update(['correct_answer' => 0]);
        }
        $answerArrIds = $question->answers()->pluck('answer_lists.id')->toArray();
        $catchNewCorrectAnswer = AnswerList::find($answerArrIds[($request->correct - 1)]);
        $catchNewCorrectAnswer->update(['correct_answer' => 1]);

        if ($request->audio) {
            $audioname = time() . '.' . $request->audio->extension();
            $request->audio->move(public_path('upload/question'), $audioname);
            $request->merge(['audio' => $audioname]);
        } else {
            $currentAduio = explode('/', $question->audio);

            $request->merge(['audio' => end($currentAduio)]);
        }
        if (is_array($request->answer)) {

            foreach ($request->answer as $key => $Ranswer) {
                $imageName = time() . '.' . $Ranswer->extension();
                $Ranswer->move(public_path('upload/answer'), $imageName);
                $getAnswer = AnswerList::find($answerArrIds[$key]);
                $getAnswer->update([
                    'answer' => $imageName,
                ]);
            }
        }

        $question->update([
            'name' => $request->name,
            'level_id' => $request->level_id,
            'timing' => $request->timing,
            'audio' => $request->audio,
        ]);

        return redirect(route('saas.question.index'));
    }
}

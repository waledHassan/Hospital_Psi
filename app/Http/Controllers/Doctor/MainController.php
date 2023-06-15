<?php

namespace App\Http\Controllers\Doctor;

use App\Models\City;
use App\Models\Level;
use App\Models\Country;
use App\Models\Patient;
use App\Models\Category;
use App\Models\Question;
use App\Models\AnswerList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\LevelResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\PatientResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\AnswerListResource;
use App\Models\Result;

class MainController extends Controller
{


    public function country()
    {
        $country = Country::get();

        return $this->responseJson(200, 'success', ['result' => CountryResource::collection($country)]);
    }

    public function city()
    {
        $city = City::get();

        return $this->responseJson(200, 'success', ['result' => CityResource::collection($city)]);
    }


    public function category()
    {
        $catigories = Category::get();

        return $this->responseJson(200, 'success', ['result' => CategoryResource::collection($catigories)]);
    }

    public function patient()
    {
        $patient = Patient::where('company_id', auth()->user()->company_id)->get();

        return $this->responseJson(200, 'success', ['result' => PatientResource::collection($patient)]);
    }
    
    public function level(Request $request)
    {

        //$patient = Patient::where('company_id', auth()->user()->company_id)->get();
        $level = Level::where('category_id',$request->category_id)->get(['id as level_id','name as level_name','description','order as ordering', 'image_name']);
        $data = [
            'level' => $level,//PatientResource::collection($patient),
            'parent' =>[],// LevelResource::collection($level),
        ];
        return $this->responseJson(200, 'success', $data);
    }
    
    public function level1($id)
    {

        $patient = Patient::where('company_id', auth()->user()->company_id)->get();
        $level = Level::where('category_id', $id)->get();
        $data = [
            'level' => PatientResource::collection($patient),
            'parent' => LevelResource::collection($level),
        ];
        return $this->responseJson(200, 'success', $data);
    }

    public function question(Request $request)
    {

        $questions = Question::with('answers')->where('level_id', $request->level_id)->orderBy('order_no', 'ASC')->get();
        $data = [
            'result' => QuestionResource::collection($questions),
        ];
        return $this->responseJson(200, 'success', $data);
    }

    public function questionAnswer(Request $request)
    {

        $answerList = AnswerList::where('question_id', $request->question_id)->get();
        $data = [
            'result' => AnswerListResource::collection($answerList),
        ];
        return $this->responseJson(200, 'success', $data);
    }
    public function getProfile()
    {
        return $this->responseJson(200, 'success', auth()->user());
    }


    public function createPatient(PatientRequest $request)
    {
        $request->merge([
            'company_id' => auth()->user()->company_id,
            'members_no' => 0,
            'status' => 1,
            'register_date' => date('Y-m-d'),
        ]);
        $patient = Patient::create($request->all());
        return $this->responseJson(200, 'success', $patient);
    }

    public function setAnswer(Request $request)
    {

        $answer = Result::create([
            'company_id' => auth()->user()->company_id,
            'test_id' => $request->level_id,
            'doctor_id' => auth()->user()->id,
            'patient_id' => $request->patient_id,
            'question_id' => $request->question_id,
            'answer_id' => $request->answer_id,
            'answer_status' => $request->answer_status,
            'answer_date' => date("Y-m-d H:i:s"),
            'level' =>  $request->level_id,
        ]);
        return $this->responseJson(200, 'success', $answer);
    }
}

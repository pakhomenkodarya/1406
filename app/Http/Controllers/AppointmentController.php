<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AppointmentController extends Controller
{
    public function index(){
        $appointments=Appointment::where('user_id',Auth::id())->latest()->get();
        return view('appointments.index',compact('appointments'));
    }
    public function create(){
        return view('appointments.create');
    }
    public function store(Request $request){
    $data=$request->validate([
       'language'=>'required',
       'date'=>'required|after:yesterday',
       'paymethod'=>'required',
    ],
    [
    'language.required'=>'Укажите иностранный язык',
       'date.required'=>'Укажите дату начала обучения',
        'date.after'=>'Дата уже прошла',
       'paymethod.required'=>'Укажите подходящий способ оплаты',
    ]);
    Appointment::create([
    'user_id'=>Auth::id(),
       'language'=>$data['language'],
       'date'=>$data['date'],
       'paymethod'=>$data['paymethod'],
       'status'=>'Новая',
    ]);
    return redirect()->route('appointments.index')->with('success','Заявка создана');
    }
}

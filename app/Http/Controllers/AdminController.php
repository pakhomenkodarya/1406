<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index(Request $request){
        $filter=Appointment::with('user');
        if($request->filled('status')){
            $filter->where('status',$request->status);
        }
       $appointments=$filter->latest()->get();
        return view('admin.index',compact('appointments'));
    }
    public function updateStatus(Request $request,Appointment $appointment){
        $request->validate([
            'status'=>'required',
        ],
        [
        'status.required'=>'укажите статус',
        ]);
        $allowed=[
        'Новая'=>['Идет обучение'],
        'Идет обучение'=>['Обучение завершено'],
        'Обучение завершено'=>[],
        ];
        if(!in_array($request->status,$allowed[$appointment->status])){
            return back()->with('error','Недопустимый переход статуса');
        }
        $appointment->status=$request->status;
        $appointment->save();
        return redirect()->route('admin.index')->with('success','Статус обновлен');
    }
}

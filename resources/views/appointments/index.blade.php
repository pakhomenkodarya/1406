@extends('layouts.app')
@section('title','Заявки')
@section('main')
  @if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="Alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
 @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Alert">
        @foreach($errors->all() as $error)
        {{$error}}<br>
        @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h2>Заявки</h2>
<div class="centerblock">
    <a class="btn btn-light" href="{{route('appointments.create')}}">Создать заявку</a>
</div>
@if($appointments->count()>0)
<table class="table">
  <thead>
    <tr>
      <th>Иностранный язык</th><th>Дата начала обучения</th><th>Способ оплаты</th><th>Статус</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appointments as $a)
    <tr>
      <td>{{$a->language}}</td>
      <td>{{$a->date}}</td>
      <td>{{$a->paymethod}}</td>
      <td>{{$a->status}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@else 
<p class="centrp">У вас нет заявок. <a class="a" href="{{route('appointments.create')}}">Создать первую заявку</a></p>
@endif
@endsection
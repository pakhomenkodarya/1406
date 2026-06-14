@extends('layouts.app')
@section('title','Админ-панель')
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
<h2>Админ-панель</h2>
@if($appointments->count()>0)
<table class="table">
  <thead>
    <tr>
      <th>Клиент</th><th>Иностранный язык</th><th>Дата начала обучения</th><th>Способ оплаты</th><th>Статус</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appointments as $a)
    <tr>
        <td>{{$a->user->name}}</td>
      <td>{{$a->language}}</td>
      <td>{{$a->date}}</td>
      <td>{{$a->paymethod}}</td>
      <td><form action="{{route('admin.updateStatus')}}" method="post">
        @csrf
        @method('PUT')
        <select class="form-select" name="status">
        <option value="">Выберите иностарнный язык</option>
        <option value="Английский">Английский</option>
        <option value="Китайский">Китайский</option>
        <option value="Японский">Японский</option>
        </select>
      </form></td>
    </tr>
    @endforeach
  </tbody>
</table>
@else 
<p class="centrp">Нет заявок.</p>
@endif
@endsection
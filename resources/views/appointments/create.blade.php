@extends('layouts.app')
@section('title','Создание заявки')
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
<h2>Создание заявки</h2>
<form action="{{route('appointments.store')}}" method="post">
    @csrf
<select class="form-select" name="language">
  <option value="">Выберите иностарнный язык</option>
  <option value="Английский">Английский</option>
  <option value="Китайский">Китайский</option>
  <option value="Японский">Японский</option>
</select>
  <div class="mb-3">
    <label class="form-label">Дата начала обучения</label>
    <input type="date" name="date" class="form-control" >
  </div>
  <select class="form-select" name="paymethod">
  <option value="">Выберите подходящий способ оплаты</option>
  <option value="предоплата по QR-коду">предоплата по QR-коду</option>
  <option value="оплата картой МИР">оплата картой МИР</option>
  <option value="постоплата в офисе организации">постоплата в офисе организации</option>
</select>
  <button type="submit" class="btn btn-light">Отправить</button>
</form>
@endsection
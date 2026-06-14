@extends('layouts.app')
@section('title','Админ-панель')
@section('main')
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Alert">
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
<label for="" class="filter">Фильтр по статусу:
    <form action="" method="get">
        <select class="form-select" name="status" onchange="this.form.submit()">
            <option value=""{{request('status')==''?'selected':''}}>Все заявки</option>
        <option value="Новая"{{request('status')=='Новая'?'selected':''}}>Новая</option>
        <option value="Идет обучение"{{request('status')=='Идет обучение'?'selected':''}}>Идет обучение</option>
        <option value="Обучение завершено"{{request('status')=='Обучение завершено'?'selected':''}}>Обучение завершено</option>
        </select>
    </form>
@if(request('status'))
<a href="{{route('admin.index')}}" class="a">Сбросить</a>
@endif</label>
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
      <td><form action="{{route('admin.updateStatus',$a)}}" method="post" class="two">
        @csrf
        @method('PUT')
        <select class="form-select" name="status">
        <option value="Новая"{{$a->status=='Новая'?'selected':''}}>Новая</option>
        <option value="Идет обучение"{{$a->status=='Идет обучение'?'selected':''}}>Идет обучение</option>
        <option value="Обучение завершено"{{$a->status=='Обучение завершено'?'selected':''}}>Обучение завершено</option>
        </select><button type="submit" class="btn btn-light">Сохранить</button>
      </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else 
<p class="centrp">Нет заявок.</p>
@endif
@endsection
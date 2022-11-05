@extends('layouts.common')
@section('pageCss')
<link href="/css/top.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
<main>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 pt-3">
        <h2>{{ $subjects[0]->name }}</h2>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked>
            <label class="form-check-label" for="inlineCheckbox1">午前</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked>
            <label class="form-check-label" for="inlineCheckbox2">午後</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">出題順をランダムにする</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
            <label class="form-check-label" for="inlineCheckbox4">選択肢をランダムに並べ替える</label>
          </div>
        </div>
        <div class="list-group">
          @foreach($subjects as $subject)
          <label class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="">
            第{{ $subject->number }}回　（{{ $subject->year }}年）
          </label>
          @endforeach
        </div>
        <p class="pt-3"><a class="btn btn-primary" href="{{ url('questions/exam') }}" role="button">スタート</a></p>
      </div>
      <div class="col-lg-4 pt-3">
        <h2>Navか広告</h2>
      </div>
    </div>
  </div>
</main>
@endsection
@include('layouts.footer')

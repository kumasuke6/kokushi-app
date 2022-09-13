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
        <h2>理学療法士国家試験</h2>
        <h3>問題2</h3>
        <p>74 歳の女性。左片麻痺。Brunnstrom 法ステージ上肢Ⅱ、下肢Ⅲ。患側の筋緊張
は低く、随意的な筋収縮もわずかにみられる程度である。平行棒内立位は中等度介
助が必要で、左下肢は膝伸展位を保持することが困難で、体重をかけると膝折れが
生じる。</p>
        <h4>選択肢</h4>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox1" value="option1">
          <label for="checkbox1" class="form-check-label"> 1.左下肢の筋力が低下している。</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox2" value="option2">
          <label for="checkbox2" class="form-check-label">2.左下肢の筋力増強練習を行う。</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox3" value="option3">
          <label for="checkbox3" class="form-check-label">3.左下肢の筋緊張が低下している。</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox4" value="option3">
          <label for="checkbox4" class="form-check-label">4.左下肢に長下肢装具を使用し立位練習を行う。</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox5" value="option3">
          <label for="checkbox5" class="form-check-label">5.左下肢の筋緊張低下により体重支持力が低下している。</label>
        </div>
        <p class="pt-3">
          <a id="answer" class="btn btn-primary" href="#" role="button">正解を確認</a>
        </p>
      </div>
      <div class="col-lg-4 pt-3">
        <h2>Navか広告</h2>
      </div>
    </div>
  </div>
</main>
@endsection
@section('pageJs')
<script>
  document.getElementById("answer").onclick = function() {
    alert("正解");
  };
</script>
@endsection
@include('layouts.footer')
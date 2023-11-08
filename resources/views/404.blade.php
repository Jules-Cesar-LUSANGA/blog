@extends('layouts.guest')

@section('title','404')

@section('content')
<div class="error">
  <div class="container-floud">
      <div class="col-xs-12 ground-color text-center">
          <div class="container-error-404">
              <div class="clip"><div class="shadow"><span class="digit thirdDigit">4</span></div></div>
              <div class="clip"><div class="shadow"><span class="digit secondDigit">0</span></div></div>
              <div class="clip"><div class="shadow"><span class="digit firstDigit">4</span></div></div>
              <div class="msg">OH!<span class="triangle"></span></div>
          </div>
          <h2 class="h1">Désolé! Page non trouvée</h2>
      </div>
  </div>
</div>
<!-- Error Page -->
@endsection
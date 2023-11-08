@extends('layouts.guest')

@section('content')
<div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center">
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pkb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connectez-vous à votre compte</h5>
                    
                  </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf 

                        <div class="row mb-3 pt-2">
                            <label for="email" class="form-label">{{ __('Adresse email') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="johndoe@gmail.com" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control rounded-0  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 rounded-0 ">
                                    {{ __('Se connecter') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link d-block" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                                <a href="{{route('register')}}" wire:navigate class="btn btn-link d-block">Pas encore membre ?</a>
                            </div>
                        </div>
                    </form>
                </div>
              </div>

              

            </div>
          </div>
        </div>
@endsection

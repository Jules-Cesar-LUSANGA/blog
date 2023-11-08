@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title text-center pb-0 fs-4">Création d'un compte</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3 pt-2">
                            <label for="name" class="form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="John DOE" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-md-end">{{ __('Adresse Email') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="johndoe@gmail.com" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label text-md-end">{{ __('Confirmation mot de passe') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-primary w-100 rounded-0">
                                    {{ __("S'inscrire") }}
                                </button>
                                <a  class="btn btn-link d-block" wire:navigate href="{{route('login')}}">Déjà membre ?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

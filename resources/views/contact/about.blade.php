@extends('layouts.base')

@section('title','A Propos de moi')
@section('heading','A Propos de moi')

@section('content')
  <div class="container">
    <div class="bg-light shadow mt-3 p-2">
      <div class="text-center">
        <h2 class="my-3">
          A Propos de moi
        </h2>
      </div>
      <div class="text-center mb-3">
        
        <a href="{{url('https://github.com/Jules-Cesar-LUSANGA')}}" target="_blank" class="h4"><i class="bi bi-github"></i></a>
        <a href="{{url('https://linkedin.com/in/jules-cesar-lusanga')}}" target="_blank" class="h4"><i class="bi bi-linkedin"></i></a>
      </div>

    <div class="row">
      <div class="col-lg-4 col-md-12">
        <img src="{{asset('assets/img/jc.jpg')}}" class="img-fluid rounded w-100" alt="">
      </div>
      <div class="col-lg-8 pt-4 pt-lg-0 content">
        <h3>Développeur Web Backend</h3>
        <p class="italic">
          Je suis un passionné du développement web. Concrétiser mes idées en algorithmes c'est ce qui me fait me sentir mieux. Je suis l'un des artisans du web qui utilisent le framework PHP Laravel.
        </p>
        <div class="row">
          <div class="col-lg-6 col-md-5">
            <ul class="list-unstyled">
              <li><i class="bi bi-rounded-right"></i> <strong>Nom :</strong> Jules-César LUSANGA</li>
              <li><i class="bi bi-rounded-right"></i> <strong>Naissance :</strong> 11 Nov 2004</li>
              <li><i class="bi bi-rounded-right"></i> <strong>Téléphone :</strong> +243 972754302</li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-7">
            <ul class="list-unstyled">
              <li><i class="bi bi-rounded-right"></i> <strong>Ville :</strong> Lubumbashi, RDC</li>
              <li><i class="bi bi-rounded-right"></i> <strong>Email :</strong> cesarjuleslusanga@gmail.com</li>
              <li><i class="bi bi-rounded-right"></i> <strong>Disponibilité :</strong> 24h/24</li>
            </ul>
          </div>
        </div>
        <figure>
          <blockquote class="blockquote">
            <p>La connaissance, elle s'acquiert et elle se transmet.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            <cite title="Source Title">Jules-César LUSANGA</cite>
          </figcaption>
        </figure>
      </div>
    </div>
  </div>

    <div class="contasiner my-3">
      <div class="d-flex justify-content-center align-items-center">
        <div class="cards p-3 bg-light w-100 shadow">
            <div class="card-body">
              <div class="card-title text-center fw-bold h5 mb-3">Nous contacter</div>
              <form method="POST" action="{{ route('contact') }}">
                @csrf
                <div class="row mb-3">
                  <div class="form-group col">
                    <label class="form-label fw-bold" for="name">Votre nom</label>
                    <input type="text" name="name" class="form-control rounded-0 py-2" required>
                  </div>      
                  <div class="form-group col">
                    <label class="form-label fw-bold" for="email">Adresse email</label>
                    <input type="email" name="email" class="form-control rounded-0 py-2" required>
                  </div>                  
                </div>

                <div class="form-group mb-3">
                  <label for="content" class="form-label fw-bold">Message</label>
                  <textarea name="content" class="form-control rounded-0 py-2" rows="5" required></textarea>
                </div>

                @if ($errors->any())
                
                <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                </div>


                @endif

                @if (session('success'))
                
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>

                @endif

                <input type="submit" value="Envoyer" class="btn btn-success rounded-0" />
              </form>
            </div>
          </div>
        </div>
    </div>

  </div>
@endsection
<!DOCTYPE html>
<html>
   <head>

     <link rel="shortcut icon" href="img/gif/favicon.ico" >
       <meta charset="utf-8" />
       <link  rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
           <title>Outil d'intention de Messe</title>
   </head>
            <!--Body-->
   <body>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Connexion') }}</div>
               <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                           @csrf
                           <a> <img class="img_login" src="./img/logodeoriom.png" alt="Logo du diocèse de Nancy/Toul"   width="200" height="110" style="position: centered;"> </a>

                     <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                           <div class="col-md-6">
                                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                          <!-- Affichage du message d'erreur -->
                                   @if ($errors->has('email'))
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                               <div class="col-md-6">
                                   <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                          <!-- Affichage du message d'erreur -->
                                   @if ($errors->has('password'))
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-8 offset-md-4">
                                   <button type="submit" class="btn btn-outline-primary">
                                       {{ __('Se connecter') }}
                                   </button>
                               </div>
                           </div>
                     </form>

                     <div class="form-group">
                        <div class="col-md-8 offset-md-4">
                              <!-- @if (Route::has('password.request')) -->
                                 <!--<a class="btn btn-link" href="{{ route('password.request') }}"> {{ __('Mot de passe oublié ?') }} </a>-->
                                 <div class="d-flex justify-content-left links"> <a href="{{route('password.request')}}"> Mot de passe oublié ?</a> </div>
                              <!-- @endif -->
                        </div>
                     </div>

            </div>
         </div>
      </div>
   </div>
</div>







       </body>
</html>

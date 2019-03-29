
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profil Célébrant</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php
setlocale(LC_TIME, 'fra_fra');
?>

<body id="page-top">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
              <!--Logo diocèse cliquable barre de naviguation-->
          <a> <img class="navbar-brand" src="./img/logo_diocese.jpg" alt="Logo du diocèse de Nancy/Toul"   width="200" height="110"> </a>
                  <!-- Barre de naviguation-->
              <ul class="navbar-nav ml-auto">


                  <div class="collapse navbar-collapse" id="navbarSupportedContent">


                          <li class="nav-item dropdown">

                              <h5> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user"> </i>
                                  {{ Auth::user()->nom }} {{ Auth::user()->prenom }} <span class="caret"></span>
                                  </a>
                              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                  <!----------------------------------------------->
                                  
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                      {{ __('Se déconnecter') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                              </h5>
                          </li>

              </ul>
      </div>

      </div>
  </nav>

  <!-- Page Wrapper -->
  <div id="wrapper">
    <br>

    <!-- Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
<br>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Exporter en Excel</a> -->
            <!-- <div class="form-row mb-4"> -->


                <!-- <div class="col">
                    <div class="form-group row">
                        {!! Form::label("from_date","Du",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                        <div class="col-md-10">
                            <input class="form-control"  type="date" name="from_date">
                    </div>
                </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label("to_date","Au",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                        <div class="col-md-10">
                            <input class="form-control"  type="date" name="to_date">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary" type="submit" value="valider1">Exporter</button>
                        </div>
                    </div>
                </div> -->

            <!-- </form> -->

          </div>

          <form method="POST">
            @csrf

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Offrandes en {{strftime('%B')}}</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$montantOffrandeMois}} €</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre de messes restantes en {{strftime('%B')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nombreMesse->compteur_messe}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sort-amount-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Intentions annoncées en {{strftime('%B')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nombreAnnonceeMois}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Intentions célébrées en {{strftime('%B')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nombreCelebreeMois}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-scroll fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Offrandes en {{date('Y')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$montantOffrandeAnnee}} €</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre de binages en {{strftime('%B')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nombreBinage->compteur_binage}}</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-sort-amount-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Intentions annoncées en {{date('Y')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nombreAnnonceeAnnee}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Intentions célébrées en {{date('Y')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nombreCelebreeAnnee}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-scroll fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Content Row -->


            <div class="card mb-6">
                      <div class="card-header">
                        <i class="fas fa-table"></i>
                        Liste des intentions</div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Demandeur</th>
                                <th>Type</th>
                                <th>Intention souhaitée</th>
                                <th>Clocher</th>
                                <th>Date annoncée</th>
                                <th>Date célébrée</th>
                                <th><button type="submit" class="btn btn-outline-dark btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir célébrer le(s) intention(s) séléctionnée(s) ?');">Célébrer</button></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($stats as $stat)
                              <tr>
                                <td>{{$stat->personne_demandeuse}}</td>
                                <td>{{$stat->casuel}}</td>
                                <td>{{$stat->intention}}</td>
                                @if(isset($stat->clochers->nom))
                                <td> {{ $stat->clochers->nom }} </td>
                                @else
                                <td> Clocher inconnu </td>
                                @endif
                                <td>{{ ($stat->date_annoncee? date('d/m/Y', strtotime($stat->date_annoncee)) : '') }}</td>
                                <td>{{ ($stat->date_celebree ? date('d/m/Y', strtotime($stat->date_celebree)) : '') }}</td>
                                @if(isset($stat->date_annoncee))
                                @if(isset($stat->date_celebree))
                                  <td> <input type='checkbox' name="celebrer[]" id='celebrerCheck' class="chkbx" disabled> </td>
                                @else
                                <td> <input type='checkbox' value="{{$stat->id}}" name="celebrer[]" id='celebrerCheck' class="chkbx"> </td>
                                @endif
                                @endif

                              </tr>
                              @endforeach

                            </tbody>


                            <tfooter>
                              <tr>
                                <th>Demandeur</th>
                                <th>Type</th>
                                <th>Intention souhaitée</th>
                                <th>Clocher</th>
                                <th>Date annoncée</th>
                                <th>Date célébrée</th>
                                <th><button type="submit" class="btn btn-outline-dark btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir célébrer le(s) intention(s) séléctionnée(s) ?');">Célébrer</button></th>
                              </tr>
                            </tfooter>
                          </table>
                        </div>
                      </div>
                      <div class="card-footer small text-muted">Mis à jour à {{date('d-m-Y H:i:s')}}</div>
                    </div>
                </div>
              </div>
            </div>
          </div>






        <!-- /.container-fluid -->

      </div>
    </form>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>


</body>

</html>


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
          <a href="{{ url('/accueil') }}"> <img class="navbar-brand" src="./img/logo_diocese.jpg" alt="Logo du diocèse de Nancy/Toul"   width="200" height="110"> </a>
                  <!-- Barre de naviguation-->
              <ul class="navbar-nav ml-auto">


                  <div class="collapse navbar-collapse" id="navbarSupportedContent">


                          <li class="nav-item dropdown">

                              <h5> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user"> </i>
                                  {{ Auth::user()->nom }} {{ Auth::user()->prenom }} <span class="caret"></span>
                                  </a>
                              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item disabled" tabindex="-1" aria-disabled="true">Panneau administrateur</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{ url('/celebrants/') }}"> <i class="fas fa-user-cog"></i> Gérer les célébrants</a>
                                  <a class="dropdown-item" href="{{ url('/utilisateurs') }}"> <i class="fas fa-users-cog"></i> Gérer les utilisateurs</a>

                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{ url('/paroisses') }}"><i class="fas fa-place-of-worship"></i></i> Gérer les paroisses</a>
                                  <a class="dropdown-item" href="{{ url('/clochers') }}"> <i class="fas fa-church"></i> Gérer les clochers</a>
                                  <!----------------------------------------------->
                                  <div class="dropdown-divider"></div>
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
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surplus en {{strftime('%B')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$montantSurplusMois}} €</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Intentions annoncées en {{strftime('%B')}}</div>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surplus en {{date('Y')}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$montantSurplusAnnee}} €</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Intentions annoncées en {{date('Y')}}</div>
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
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">

                <div class="card border-left-info shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Intentions célébrées en {{date('Y')}}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="BarChartIntention"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-5">
  <div class="card border-left-info shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-info">Clochers utilisées en {{strftime('%B')}} {{date('Y')}}</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-pie pt-4 pb-2">
        <canvas id="PieChartClocher"></canvas>
      </div>
      <div class="mt-4 text-center small">

        <span class="mr-2">
          <!-- <i class="fas fa-circle text-primary"></i>  -->
        </span>
        <span class="mr-2">
          <!-- <i class="fas fa-circle text-success"></i> -->
        </span>
        <span class="mr-2">
          <!-- <i class="fas fa-circle text-info"></i> -->
        </span>

      </div>
    </div>
  </div>
</div>
</div>


  <div class="card mb-6">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des intentions</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Demandeur</th>
                      <th>Type</th>
                      <th>Intention souhaitée</th>
                      <th>Clocher</th>
                      <th>Date annoncée</th>
                      <th>Date célébrée</th>
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
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Mis à jour à {{date('d-m-Y H:i:s')}}</div>
          </div>



              </div>
            </div>
          </div>






        <!-- /.container-fluid -->

      </div>
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




  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-bar-intention.js"></script>
  <script src="js/demo/chart-pie-clocher.js"></script>

</body>

</html>

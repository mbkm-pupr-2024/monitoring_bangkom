<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

     <!-- Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet">
  <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/pace/pace.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Theme Styles -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main_tamu.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

  <link rel="icon" type="image/jpg" sizes="32x32" href="{{ asset('assets/images/logo.jpg') }}" />
  <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('assets/images/logo.jpg') }}" />
</head>

<body>
    <div class="app menu-off-canvas align-content-stretch d-flex flex-wrap">
        <div class="app-container">
            <div class="example-container">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($pelatihans as $pelatihan)
                                @if ($loop->first)
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}" class="active" aria-label="Slide {{ $loop->iteration }}" aria-current="true"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->iteration }}" class=""></button>
                                @endif
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($pelatihans as $pelatihan)
                                @if ($loop->first)
                                    <div class="carousel-item active" data-bs-interval="2000">
                                        <div class="card">
                                            <div class="app-auth-container-slides">
                                                <div class="logo">
                                                    <a>Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</a>
                                                </div>
                                            </div>
                                            <div class="main-timeline-slides">
                                                <ul class="ul-timeline-slides">
                                                    @foreach ($tahapans as $tahapan)
                                                        @if ($loop->first)
                                                            <li class="li-timeline-slides">
                                                                <i class="material-icons-outlined icon-timeline-slides uil-timeline-slides">{{ $tahapan->icon}}</i>
                                                                @if ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'yes')
                                                                    <a style="pointer:" class="progress-timeline-slides first-timeline-slides active">
                                                                        <i class="material-icons">check</i>
                                                                @elseif ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'process')
                                                                    <a class="progress-timeline-slides first-timeline-slides active">
                                                                        <i class="material-icons">sync</i>
                                                                @else
                                                                    <a class="progress-timeline-slides first-timeline-slides">
                                                                        <p class="p-timeline-slides">{{ $loop->iteration }}</p>
                                                                @endif
                                                                    </a>
                                                                    {{-- <i class="uil-timeline-slides uil-check"></i> --}}
                                                                <p class="text-timeline-slides">{{ $tahapan->judul }}</p>
                                                            </li>
                                                        @else
                                                        <li class="li-timeline-slides">
                                                            <i class="material-icons-outlined icon-timeline-slides uil-timeline-slides">{{ $tahapan->icon}}</i>
                                                            @if ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'yes')
                                                                <a class="progress-timeline-slides {{ $tahapan->id }}-timeline active">
                                                                    <i class="material-icons">check</i>
                                                            @elseif ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'process')
                                                                <a class="progress-timeline-slides {{ $tahapan->id }}-timeline active">
                                                                    <i class="material-icons">sync</i>
                                                            @else
                                                                <a class="progress-timeline-slides {{ $tahapan->id }}-timeline">
                                                                    <p class="p-timeline-slides">{{ $loop->iteration }}</p>
                                                            @endif
                                                                    {{-- <i class="uil-timeline-slides uil-check"></i> --}}
                                                                </a>
                                                            <p class="text-timeline-slides">{{ $tahapan->judul }}</p>
                                                        </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        
                                            <br><br><br><br><br><br>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $pelatihan->nama }}</h5>
                                                <p>{{ $pelatihan->model_pelatihan->nama }}.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <div class="card">
                                            <div class="app-auth-container-slides">
                                                <div class="logo">
                                                    <a>Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</a>
                                                </div>
                                            </div>
                                            <div class="main-timeline-slides">
                                                <ul class="ul-timeline-slides">
                                                    @foreach ($tahapans as $tahapan)
                                                        @if ($loop->first)
                                                            <li class="li-timeline-slides">
                                                                <i class="material-icons-outlined icon-timeline-slides uil-timeline-slides">{{ $tahapan->icon}}</i>
                                                                @if ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'yes')
                                                                    <a class="progress-timeline-slides first-timeline-slides active">
                                                                        <i class="material-icons">check</i>
                                                                @elseif ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'process')
                                                                    <a class="progress-timeline-slides first-timeline-slides active">
                                                                        <i class="material-icons">sync</i>
                                                                @else
                                                                    <a class="progress-timeline-slides first-timeline-slides">
                                                                        <p class="p-timeline-slides">{{ $loop->iteration }}</p>
                                                                @endif
                                                                    </a>
                                                                    {{-- <i class="uil-timeline-slides uil-check"></i> --}}
                                                                <p class="text-timeline-slides">{{ $tahapan->judul }}</p>
                                                            </li>
                                                        @else
                                                        <li class="li-timeline-slides">
                                                            <i class="material-icons-outlined icon-timeline-slides uil-timeline-slides">{{ $tahapan->icon}}</i>
                                                            @if ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'yes')
                                                                <a class="progress-timeline-slides {{ $tahapan->id }}-timeline active">
                                                                    <i class="material-icons">check</i>
                                                            @elseif ($pelatihan_progres[$pelatihan->id][$tahapan->id] == 'process')
                                                                <a class="progress-timeline-slides {{ $tahapan->id }}-timeline active">
                                                                    <i class="material-icons">sync</i>
                                                            @else
                                                                <a class="progress-timeline-slides {{ $tahapan->id }}-timeline">
                                                                    <p class="p-timeline-slides">{{ $loop->iteration }}</p>
                                                            @endif
                                                                    {{-- <i class="uil-timeline-slides uil-check"></i> --}}
                                                                </a>
                                                            <p class="text-timeline-slides">{{ $tahapan->judul }}</p>
                                                        </li>
                                                        @endif
                                                        
                                                
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <br><br><br><br><br><br>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $pelatihan->nama }}</h5>
                                                <p>{{ $pelatihan->model_pelatihan->nama }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                            @endforeach
                            
                        </div>
                        <button style="margin-top: -250px;margin-left:-50px" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button style="margin-top: -250px;margin-right:-50px" class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    
                </div>
                  
            
        </div>
    </div>

    <!-- Javascripts -->
    
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/highlight/highlight.pack.js') }}"></script>

    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/main_tammu.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
</body>

</html>
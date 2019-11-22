<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        
        <link type="text/css" rel="stylesheet" href="{{asset('plugins/materialize/css/materialize.min.css')}}"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{asset('plugins/material-preloader/css/materialPreloader.min.css')}}" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="{{asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
        

        
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">{{ config('app.name', 'Dashboard') }} Admin Dashboard</span>
                        </div>                       
                    </div>
                </nav>
            </header>
            @extends('admin.menus')
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12 m4">
                    <div class="card-panel light-blue lighten-3 center-align">
                        <span class="card-title" style="color: #fff;font-size: 22px;">Jurusan</span>
                            <p class="white-text" style="font-size: 50px;"><b>{{$jurusan}}</b></p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card-panel blue-grey lighten-1 center-align">
                            <span class="card-title" style="color: #fff;font-size: 22px;">Calon</span>
                            <p class="white-text" style="font-size: 50px;"><b>{{$calon}}</b></p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card-panel teal darken-3 center-align">
                            <span class="card-title" style="color: #fff;font-size: 22px;">Mahasiswa</span>
                            <p class="white-text" style="font-size: 50px;"><b>{{$mahasiswa}}</b></p>
                        </div>
                    </div>
                </div>
            </main>
            
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="{{asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
        <script src="{{asset('plugins/materialize/js/materialize.min.js')}}"></script>
        <script src="{{asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
        <script src="{{asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
        <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('js/alpha.min.js')}}"></script>
        <script src="{{asset('js/pages/miscellaneous-sweetalert.js')}}"></script>

        
        <script src="{{asset('plugins/chart.js/chart.min.js')}}"></script>
        <script src="{{asset('plugins/d3/d3.min.js')}}"></script>
        <script src="{{asset('plugins/nvd3/nv.d3.min.js')}}"></script>
        <script src="{{asset('plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{asset('plugins/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{asset('plugins/flot/jquery.flot.symbol.min.js')}}"></script>
        <script src="{{asset('plugins/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{asset('plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('plugins/flot/jquery.flot.pie.min.js')}}"></script>
        <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <script>
new Chart(document.getElementById("presentase"), {
    type: 'pie',
    data: {
      labels: ["Pasangan Calon 01", "Pasangan Calon 02", "Belum Memilih"],
      datasets: [{
        label: "pemilih",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#c45850"],
        data: [1,6,3]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Hasil Pemilihan Sementara'
      }
    }
});
</script>
    </body>
</html>

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
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="{{asset('images/profile-image.png')}}" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <span>{{ Auth::guard('admin')->user()->username }}
                                <i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>
                            
                            {{-- <li class="no-padding">
                                <a class="waves-effect waves-grey"><i class="material-icons">star_border</i>Starred<span class="new badge">18</span></a>
                            </li> --}}
                            
                            <li class="no-padding">
                                <a class="waves-effect waves-grey"><i class="material-icons">history</i>History<span class="new grey lighten-1 badge">3 new</span></a>
                            </li>
                            <li class="divider"></li>
                            <li class="no-padding">
                                <a href="{{route('signout')}}" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding {{Request::is('admin/dashboard')?'active':''}}"><a class="waves-effect waves-grey" href="{{url('admin/dashboard')}}"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Data<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Jurusan</a></li>
                                <li><a href="#">Panitia</a></li>
                                <li><a href="#">Calon</a></li>
                                <li><a href="#">Mahasiswa</a></li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Grafik Pemilihan<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                            	 {{-- class="active-page" --}}
                                <li><a href="#">Sistem Informasi</a></li>
                                
                                
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">mode_edit</i>Tambah Data<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Data Jurusan</a></li>
                                <li><a href="#">Data Panitia</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    {{-- <li class="no-padding"><a class="waves-effect waves-grey" href="#"><i class="material-icons">trending_up</i>Charts</a></li> --}}
                    
                </ul>
                <div class="footer">
                    <p class="copyright">Steelcoders ©</p>
                    <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Sistem Informasi</span>
                                <div>
                                    <canvas id="presentase" width="500" height="211" style="display: block; width: 400px; height: 111px;padding-bottom: 20px;"></canvas>
                                </div>
                            </div>
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
        data: [2478,5267,433]
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

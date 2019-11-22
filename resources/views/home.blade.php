<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>{{ config('app.name', 'Dashboard') }}</title>
        
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
                            <span class="chapter-title">{{ config('app.name', 'Dashboard') }} Dashboard</span>
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
                            
                                <p>{{ Auth::guard('mahasiswa')->user()->nim }}</p>
                                
                            
                        </div>
                    </div>
                    <div class="sidebar-menu collapsible collapsible-accordion">
                        <ul>
                            
                            <!-- <li class="divider"></li> -->
                            <li class="no-padding">
                                <a href="{{route('logout')}}" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                
                <div class="footer">
                    <p class="copyright">StupidCode ©</p>
                    
                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    @if(Auth::guard('mahasiswa')->user()->statuspilih=='belum')
                        @foreach($data as $dt)
                <div class="col s6">
                    <div class="card large">
                            <div class="card-image">
                                <img src="{{$dt->foto}}" alt="">
                                
                            </div>
                            <div class="card-content">
                                <span class="card-title" style="font-size: 20px; color: #000">{{$dt->nama_ketua}} & {{$dt->nama_wakil}}</span>
                                <p>{{$dt->deskripsi}}</p>
                            </div>
                            <div class="card-action">
                                <form action="{{route('pilih.calon')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_calon" value="{{$dt->id}}">
                                    <input type="hidden" name="id" value="{{ Auth::guard('mahasiswa')->user()->id }}">
                                    <button style="width: 100%;" type="submit" onclick="archiveFunction()" class="waves-effect waves-light btn blue m-b-xs sweetalert-cancel">Pilih</button>
                                </form>
                            </div>
                        </div>
                </div>
                @endforeach
                    @else
                        <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">{{$namajurusan}}</span>
                                <div>
                                    <canvas id="presentase" width="500" height="211" style="display: block; width: 400px; height: 111px;padding-bottom: 20px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        
        <script>
            function archiveFunction() {
                event.preventDefault(); // prevent form submit
                var form = event.target.form; // storing the form
                        swal({
                        title: "Are you sure?",
                        text: "You will not be able to select again!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#8cd4f5",
                        confirmButtonText: "Yes, select it!",
                        cancelButtonColor: "#DD6B55",
                        cancelButtonText: "No, cancel",
                        closeOnConfirm: false,
                        closeOnCancel: false 
                },
                function(isConfirm){
                  if (isConfirm) {
                    swal("Selected!", "Your vote is recorded.", "success");
                    form.submit();          // submitting the form when user press yes
                  } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                  }
                });
            }
        </script>
        <script>
new Chart(document.getElementById("presentase"), {
    type: 'pie',
    data: {
      labels: [
            @foreach($data as $dt)
                "{{$dt->nama_ketua}}",
            @endforeach 
      "Belum Memilih"],
      datasets: [{
        label: "pemilih",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#c45850"],
        data: [
            @foreach($data as $dt)
                {{$dt->suara}},
            @endforeach
            {{ $belum }}
        ]
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
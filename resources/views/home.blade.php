<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>E-Voting</title>
        
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
                            <span class="chapter-title">Alpha</span>
                        </div>                       
                    </div>
                </nav>
            </header>
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            
                                <p>{{ Auth::guard('mahasiswa')->user()->nim }}</p>
                                
                            
                        </div>
                    </div>
                    <div class="sidebar-menu collapsible collapsible-accordion">
                        <ul>
                            
                            <!-- <li class="divider"></li> -->
                            <li class="no-padding">
                                <a class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                
                <div class="footer">
                    <p class="copyright">Steelcoders ©</p>
                    <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                <div class="col s6">
                    <div class="card large">
                            <div class="card-image">
                                <img src="assets/images/card-image5.jpg" alt="">
                                <span class="card-title">nama ketua & nama wakil</span>
                            </div>
                            <div class="card-content">
                                <p>slogan tim suksesnya cok</p>
                            </div>
                            <div class="card-action">
                                <button style="width: 100%;" type="submit" onclick="pilih()" class="waves-effect waves-light btn blue m-b-xs sweetalert-cancel">Pilih</button>
                            </div>
                        </div>
                </div>
                <div class="col s6">
                    <div class="card large">
                            <div class="card-image">
                                <img src="assets/images/card-image5.jpg" alt="">
                                <span class="card-title">nama ketua & nama wakil</span>
                            </div>
                            <div class="card-content">
                                <p>slogan tim suksesnya cok</p>
                            </div>
                            <div class="card-action">
                                <button style="width: 100%;" type="submit" onclick="pilih()" class="waves-effect waves-light btn blue m-b-xs sweetalert-cancel">Pilih</button>
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
        <script>
            function pilih(){
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
                        }, function(isConfirm){
                        if (isConfirm) {
                            swal("Selected!", "Your vote is recorded.", "success");
                            window.setTimeout(function(){ window.location = "/logout"; },4000);
                        } else {
                            swal("Cancelled", "Your vote has been cancelled", "error");
                        }
                    })
            }
        </script>
    </body>
</html>
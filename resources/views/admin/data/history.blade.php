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
        <link href="{{asset('plugins/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="{{asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
        

        
    </head>
    <body>
        
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
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Data Mahasiswa</span>
                                
                                
                                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Panitia</th>
                <th>Melakukan</th>
                <th>Nim</th>
                <th>Pada</th>
                
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach($data as $dt)
            
            <tr>
                <td>{{$no++}}</td>
                <td>{{$dt->nama}}</td>
                <td>{{$dt->aksi}}</td>
                <td>{{$dt->kepada}}</td>
                <td>{{$dt->updated_at}}</td>
                
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Panitia</th>
                <th>Melakukan</th>
                <th>Nim</th>
                <th>Pada</th>
                
            </tr>
        </tfoot>
    </table>
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
        <script src="{{asset('plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
        
        <script src="{{asset('js/pages/table-data.js')}}"></script>
        <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('js/alpha.min.js')}}"></script>
        <script src="{{asset('js/pages/miscellaneous-sweetalert.js')}}"></script>

        
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    </body>
</html>

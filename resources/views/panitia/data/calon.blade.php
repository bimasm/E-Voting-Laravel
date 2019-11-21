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
            @extends('panitia.menus')
            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Data Calon</span>
                                
                                
                                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Ketua</th>
                <th>Wakil</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach($data as $dt)
            
            <tr>
                <td>{{$no++}}</td>
                <td>{{$dt->nama_ketua}}</td>
                <td>{{$dt->nama_wakil}}</td>
                <td>{{\App\Jurusan::where('id', $dt->id_jurusan)->value('nama_jurusan') }}</td>
                <td>{{$dt->status}}</td>
                <td>
                    @if($dt->status=='active')
                    <a class="waves-effect waves-light btn orange m-b-xs" href="{{url('panitia/activatecalon')}}/{{$dt->id}}">disable</a>
                    @else
                    <a class="waves-effect waves-light btn orange m-b-xs" href="{{url('panitia/activatecalon')}}/{{$dt->id}}">activate</a>
                    @endif
                    <a class="modal-trigger waves-effect waves-light btn blue m-b-xs" href="#modal{{$dt->id}}"><i class="material-icons">mode_edit</i></a>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Create on</th>
                <th>Update on</th>
                <th>Action</th>
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
@foreach($data as $dt)
<div id="modal{{$dt->id}}" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form action="{{route('editt.calon')}}" method="post" class="col s12" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="nama" name="id" type="hidden" value="{{$dt->id}}">
                                                <input id="nama" name="nama_ketua" type="text" value="{{$dt->nama_ketua}}">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                
                                                <input id="nama" name="nama_wakil" type="text" value="{{$dt->nama_wakil}}">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                
                                                <input id="nama" name="deskripsi" type="text" value="{{$dt->deskripsi}}">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <div class="file-field input-field">
                                                <div class="btn teal lighten-1">
                                                    <span>File</span>
                                                    <input type="file" name="foto">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                    <div class="input-field col s12">
                                        <div class="select-wrapper"><span class="caret">▼</span><select name="status" class="initialized">
                                            <option value="" disabled="" selected="">Choose your option</option>
                                            
                                            <option value="active">active</option>
                                            <option value="disable">disable</option>
                                            
                                        </select></div>
                                        <label>Status</label>
                                    </div>
                                    
                                </div>
                                        
                                        
                                        
                                    
    </div>
    <div class="modal-footer">
        <button type="submit" class="waves-effect waves-light btn">simpan</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">cancel</a>
    </div>
</div>
</form>
@endforeach
    </body>
</html>

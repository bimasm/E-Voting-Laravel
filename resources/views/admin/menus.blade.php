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
                    <a href="{{route('admin.history')}}" class="waves-effect waves-grey"><i class="material-icons">history</i>History</a>
                </li>
                <li class="divider"></li>
                <li class="no-padding">
                    <a href="{{route('signout')}}" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                </li>
            </ul>
        </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding {{Request::routeis('admin.dashboard')?'active':''}}"><a class="waves-effect waves-grey" href="{{route('admin.dashboard')}}"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
            <li class="no-padding {{Request::routeis('data.jurusan','data.panitia','data.calon','data.mahasiswa')?'active':''}}">
                <a class="collapsible-header waves-effect waves-grey {{Request::routeis('data.jurusan','data.panitia','data.calon','data.mahasiswa')?'active':''}}"><i class="material-icons">apps</i>Data<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('data.jurusan')}}" class="{{Request::routeis('data.jurusan')?'active-page':''}}">Jurusan</a></li>
                        <li><a href="{{route('data.panitia')}}" class="{{Request::routeis('data.panitia')?'active-page':''}}">Panitia</a></li>
                        <li><a href="{{route('data.calon')}}" class="{{Request::routeis('data.calon')?'active-page':''}}">Calon</a></li>
                        <li><a href="{{route('data.mahasiswa')}}" class="{{Request::routeis('data.mahasiswa')?'active-page':''}}">Mahasiswa</a></li>
                        
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Grafik Pemilihan<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        
                        @php
                        $jurusan=\App\Jurusan::all(); 
                        @endphp
                        @foreach($jurusan as $jr)
                        <li><a href="../hasil/{{$jr->id}}">{{ $jr->nama_jurusan }}</a></li>
                        @endforeach
                        
                    </ul>
                </div>
            </li>
            <li class="no-padding {{Request::routeis('in.jurusan','in.panitia')?'active':''}}">
                <a class="collapsible-header waves-effect waves-grey {{Request::routeis('in.jurusan','in.panitia')?'active':''}}"><i class="material-icons">mode_edit</i>Tambah Data<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('in.jurusan')}}" class="{{Request::routeis('in.jurusan')?'active-page':''}}">Data Jurusan</a></li>



                        <li><a href="{{route('in.panitia')}}" class="{{Request::routeis('in.panitia')?'active-page':''}}">Data Panitia</a></li>
                    </ul>
                </div>
            </li>
            
            {{-- <li class="no-padding"><a class="waves-effect waves-grey" href="#"><i class="material-icons">trending_up</i>Charts</a></li> --}}
            
        </ul>
        <div class="footer">
            <p class="copyright">StupidCode ©</p>
        </div>
    </div>
</aside>
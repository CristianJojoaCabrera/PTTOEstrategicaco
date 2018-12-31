<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <div>
                        <img src="{{ asset('img/logoReferidosAjustado-02.png') }} "class="img-rounded"  alt="invitro_logo" style="width:100%">
                    </div>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->email }} </span> </span> </a>
                </div>
                <div class="logo-element">
                    PPTO
                </div>
            </li>
            <li >
                <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <li class="{{active(['auspiciadores'])}}" >
                <a href="{{route('funcionarity_index')}}"><i class="fa fa-users"></i> <span class="nav-label">Personal</span></a>
            </li>


        </ul>
    </div>
</nav>

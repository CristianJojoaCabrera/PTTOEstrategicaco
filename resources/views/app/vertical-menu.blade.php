<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <div>
                        <img src="{{ asset('img/logoReferidosAjustado-02.png') }} "class="img-rounded"  alt="invitro_logo" style="width:100%">
                    </div>

                </div>
                <div class="logo-element">
                    RDS
                </div>
            </li>
            <li >
                <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <li class="{{active(['auspiciadores'])}}" >
                <a href="{{ route('auspiciadores') }}"><i class="fa fa-id-badge"></i> <span class="nav-label">Auspiciadores</span></a>
            </li>
            <li class="{{active(['prospectos'])}}" >
                <a href="{{ route('prospectos') }}"><i class="fa fa-handshake-o"></i> <span class="nav-label">Prospectos</span></a>
            </li>

        </ul>
    </div>
</nav>

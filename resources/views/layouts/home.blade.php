<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('app.head')
    <body class="md-skin">
        <div id="wrapper">
            @include('app.vertical-menu')
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    @include('app.horizontal-menu')
                </div>
                <div class="wrapper wrapper-content">
                    <div id ='content-ajax' class="animated fadeInRight">
                        @yield('content')
                    </div>
                </div>
                @include('app.footer')
            </div>
        </div>
        @include('app.js')
        @yield('javascript')
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        @include('partials._head')

        @yield('stylesheets')

    </head>
    
    <body>

        @include('partials._nav')
        @if (session()->has('flash_notification.message'))
        @include('partials._flash')
        @endif
        <div class="container">

            @yield('content')
            
            <hr/>
            <div class="footer">
                <p>Copyright Sourcerer 2016</p>
            </div>
        </div><!-- /.container -->
        
    </body>
    
    @include('partials._scripts')

    @yield('scripts')

</html>
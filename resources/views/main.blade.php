<!DOCTYPE html>
<html lang="en">
    <head>
        
        @include('partials._head')

        @yield('stylesheets')

    </head>
    
    <body>

        @include('partials._nav')
        
        <div class="container">

            @yield('content')
            
            <hr/>
            <p>Copyright Sourcerer 2016</p>
        </div><!-- /.container -->
        
    </body>
    
    @include('partials._scripts')

    @yield('scripts')

</html>
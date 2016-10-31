<!DOCTYPE html>
<html lang="en">
    <head>
        
        @include('partials._head')
        
    </head>
    
    <body>
        @include('partials._nav', $state)
        
        <div class="container">

            @yield('content')
            
            <hr/>
            <p>Copyright CodeSource 2016</p>
        </div><!-- /.container -->
        
    </body>
    
    @include('partials._scripts')
    
</html>
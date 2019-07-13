
    @include('includes.header')
    @include('includes.navigation')
    <div class="container rounded mt-1 mb-1">
        @yield('content')
        <br>
        <br>
        <br>
        @include('includes.contenu')
    </div> 
    <footer class="bg-danger rounded mt-3 p-1">
        <p class="lead text-center text-white font-weight-bold mt-3">MS Coding <i class="far fa-copyright"></i> 2019</p>
    </footer>
   @yield('scripts')
    @include('includes.footer')

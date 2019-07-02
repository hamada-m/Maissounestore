
    @include('includes.header')
    <div class="container border border-danger rounded mt-1 mb-1">
        @include('includes.navigation')
        @yield('content')
        <footer class="bg-danger rounded mt-3 p-1">
            <p class="lead text-center text-white font-weight-bold mt-3">MS Coding &copy;2019</p>
        </footer>
    </div> 
   @yield('scripts')
    @include('includes.footer')

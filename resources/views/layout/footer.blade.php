

  <footer id="footer" class="">
    @yield('footer')
  </footer>

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

{{--  <!-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->--}}
  <script src="{{ asset('assets/js/main.js')}}"></script>

<link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet">

<!-- <script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"></script>
    @stack('js')
    @stack('scripts')

    <style type="text/css">
        /*
                .card-header {
                    border-bottom: none;
                }
                .card-title {
                    font-weight: 600;
                }
                */
    </style>
    @stack('css')

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/custom.css') }}">

</body>

</html>

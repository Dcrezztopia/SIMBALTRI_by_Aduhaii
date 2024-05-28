

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    @yield('footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  {{--
  <!-- <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/quill/quill.js')}}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script> -->
  --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"></script>
    @stack('js')

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" /> -->

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


</body>

</html>

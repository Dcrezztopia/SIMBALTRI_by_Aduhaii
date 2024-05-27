@include('layout.head')
@include('layout.header')
@include('layout.sidebar')

@yield('content_body')

@include('layout.footer')
@yield('footer')

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


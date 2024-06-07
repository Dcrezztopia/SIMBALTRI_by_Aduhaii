@extends('layout.minimal')

@section('content_body')
        <div class="pagetitle text-center">
            <h2 class="welcome-message">
                SELAMAT DATANG
            </h2>
            <h3 class="sub-message">
                DI PORTAL WEBSITE
            </h3>
            <h3 class="sub-message">
                KELURAHAN BALEARJOSARI
            </h3>
            <a href="{{ route('login') }}" class="btn btn-primary text-light login-btn mt-5">
                <strong>
                    LOGIN
                </strong>
            </a>
        </div>


        <!-- <div class="big-box"> -->
        <!-- </div> -->

        <section class="section dashboard">
        <div class="row">

        </div>
        </section>

@endsection

@push('js')
    <script>
        $(document).ready(() => {
            // alert('something')
        })
    </script>
@endpush

@push('css')
    <style>
        .login-btn {
            width: 200px;
            height: 50px;
            font-size: 20px !important;
            border-radius: 30px !important;
        }
    </style>
@endpush


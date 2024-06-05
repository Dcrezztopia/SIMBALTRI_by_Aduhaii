@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        <!-- Dashboard -->
    </div>
    <div class="card-body pa-5">
        <div class="text-center mt-3">
            <h2 class="text-primary-dark">
                <strong>
                    SELAMAT DATANG
                </strong>
            </h2>
            <h3 class="text-primary-dark">
                <strong>
                    DI PORTAL WEBSITE
                </strong>
            </h3>
            <h3 class="text-primary-dark">
                <strong>
                    KELURAHAN BALEARJOSARI
                </strong>
            </h3>
        </div><!-- End Page Title -->
        <!-- Add the new big box here -->
        <!-- <div class="big-box"> -->
        <!-- Content inside the box can go here if needed -->
        </div>
        <div class="row ma-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header lin-gradient-light-primary text-dark">
                        News & Updates
                    </div>
                    <div class="card-body">
                        <div class="news">
                            <div class="news-item">
                                <div class="news-title">
                                    <h4>News Title</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
    <script>
        $(document).ready(() => {
            // alert('Something')
        })
    </script>
@endpush

@push('css')
    <style>
    </style>
@endpush


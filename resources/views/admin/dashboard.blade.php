@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Dashboard
    </div>
    <div class="card-body pa-5">
        <!-- <div class="text-center mt-3"> -->
        <!--     <h2 class="text-primary-dark"> -->
        <!--         <strong> -->
        <!--             SELAMAT DATANG -->
        <!--         </strong> -->
        <!--     </h2> -->
        <!--     <h3 class="text-primary-dark"> -->
        <!--         <strong> -->
        <!--             DI PORTAL WEBSITE -->
        <!--         </strong> -->
        <!--     </h3> -->
        <!--     <h3 class="text-primary-dark"> -->
        <!--         <strong> -->
        <!--             KELURAHAN BALEARJOSARI -->
        <!--         </strong> -->
        <!--     </h3> -->
        <!-- </div> -->
        <!-- Add the new big box here -->
        <!-- <div class="big-box"> -->
        <!-- Content inside the box can go here if needed -->
        <!-- </div> -->
        <!-- <div class="d-flex"> -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header lin-gradient-light-primary text-dark">
                            News & Updates
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header lin-gradient-light-primary text-dark">
                            News & Updates
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
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


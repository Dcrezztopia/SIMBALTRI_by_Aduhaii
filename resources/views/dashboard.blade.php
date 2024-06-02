@extends('layout.app')

@section('content_body')
<main id="main" class="main">

    <!-- <nav> -->
    <!--     <ol class="breadcrumb"> -->
    <!--         <li class="breadcrumb-item active">Dashboard</li> -->
    <!--     </ol> -->
    <!-- </nav> -->
    <div class="pagetitle text-center">
        <h2 class="welcome-message">Selamat Datang</h2>
        <h3 class="sub-message">Di Portal Website</h3>
        <h3 class="sub-message">Kelurahan Balearjosari</h3>
    </div><!-- End Page Title -->

    <!-- Add the new big box here -->
    <div class="big-box">
        <!-- Content inside the box can go here if needed -->
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->


        </div>
        </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
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
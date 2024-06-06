@extends('layout.app')

@section('content_body')
    <main id="main" class="main">

        <!-- <nav> -->
        <!--     <ol class="breadcrumb"> -->
        <!--         <li class="breadcrumb-item active">dashboard</li> -->
        <!--     </ol> -->
        <!-- </nav> -->
        <div class="pagetitle text-center">
            <h2 class="welcome-message">selamat datang</h2>
            <h3 class="sub-message">di portal website</h3>
            <h3 class="sub-message">kelurahan balearjosari</h3>
        </div><!-- end page title -->

        <!-- add the new big box here -->
        <div class="big-box">
        <!-- content inside the box can go here if needed -->
        </div>

            <section class="section dashboard">
            <div class="row">

                <!-- left side columns -->


                    </div>
                </div><!-- end news & updates -->

                </div><!-- end right side columns -->

            </div>
            </section>

    </main><!-- end #main -->
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
    </style>
@endpush


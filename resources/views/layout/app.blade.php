@include('layout.head')
{{--@include('layout.header')--}}
@include('layout.sidebar')

<main id="main">
    @include('layout.navbar')
    @yield('content_body')
    <div id="main-bg"></div>
</main>

@include('layout.footer')
@yield('footer')

<style>
    #main {
        min-height: 100vh;
        margin-top: 0px;
        padding: 10px 20px 20px 20px;
        transition: all 0.3s;
    }

    #main-bg {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-image: url('/assets/img/backgroundimage.jpg');
        background-color: rgba(255,255,255,0.5);
        background-blend-mode: lighten;
        background-size: cover;
        z-index: -1;
    }

    @media (max-width: 1199px) {
        #main {
            padding: 10px;
        }
    }

    .lin-gradient {
        background: linear-gradient(135deg, #ffc5bd 0%, #5fc5bd 100%);
    }

    .lin-gradient-light-primary {
        background: linear-gradient(135deg, #bfdfcf 0%, #5fc5bd 100%);
    }

    div[id$='-table_filter'] {
        float: right;
        margin-top: -71px;
    }

    div[id$='-table_paginate'] {
        float: right;
        margin-top: -24px;
    }

    table[id$='-table'] {
        margin-bottom: 10px;
    }
</style>


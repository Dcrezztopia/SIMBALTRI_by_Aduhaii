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


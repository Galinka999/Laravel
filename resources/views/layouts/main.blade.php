<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title') Euronews @show</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=ADWUt9JjlAT826-kHtHGij1zvvqlytyUQ95L5F4M9IgYAa5KUySCot6W-Izv48wgNexu_g_x6HOeaM6NSPE4ovKhLvz7tBMcgD2PglJN_94" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9nZXRib290c3RyYXAuY29tL2RvY3MvNS4xL2V4YW1wbGVzL2FsYnVtLw"/><style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body>

    <x-header></x-header>

    <main>
        @yield('maincontent')
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @yield('content')
                </div>
            </div>
        </div>

    </main>

    <x-footer></x-footer>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

@stack('js')
</body>
</html>

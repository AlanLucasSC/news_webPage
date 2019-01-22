<!-- header -->
<header class="container-fluid py-3 my-0">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-4 text-center">
            <a class="c-link text-dark display-4" href="{{ route('index') }}">
                <img class="col-sm-6 p-0 m-0" src="{{ asset('svg/namidiams.svg') }}">

            </a>

        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-center">
            {{ $slot }}
        </div>
    </div>
</header><!-- ./ header -->
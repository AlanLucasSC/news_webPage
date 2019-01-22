<!-- header -->
<header class="container-fluid ">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-12 text-center">
            <a class="c-link text-dark text-center" href="{{ route('index') }}">
                <img class="col-sm-3 p-0 m-0" src="{{ asset('svg/namidiams.svg') }}">
            </a>
        </div>
        <div class="col-md-12 d-flex justify-content-end align-items-center">
            {{ $slot }}
        </div>
    </div>
</header><!-- ./ header -->
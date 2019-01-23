<!-- header -->
<header class="container-fluid ">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-12 text-center">
            <a class="c-link text-dark text-center" href="{{ route('index') }}">
                <img class="col-sm-2 p-0 pt-2 m-0" src="{{ asset('svg/namidiams style2.svg') }}">
            </a>
        </div>
        <div class="col-md-12 d-flex justify-content-end align-items-center">
            {{ $slot }}
        </div>
    </div>
</header><!-- ./ header -->
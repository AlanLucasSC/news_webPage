<!-- header -->
<header class="container-fluid py-3 my-0">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 text-center">
            <a class="c-link text-dark display-4" href="{{ route('index') }}">NaMidiaMS</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            {{ $slot }}
        </div>
    </div>
</header><!-- ./ header -->
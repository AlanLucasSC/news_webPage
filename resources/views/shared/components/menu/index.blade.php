<!-- Menu -->
<div class="fluid align-items-center sticky-top menu">
    <nav class="nav navbar-expand-lg d-flex bg-verde px-5">
        <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars text-white" aria-hidden="true"></i>
            </span>
        </button>
        <div class="justify-content-center collapse navbar-collapse" id="navbarSupportedContent">
            {{ $slot }}
        </div>
    </nav>
</div><!-- ./ menu -->
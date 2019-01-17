<a class="carousel-item {{ $active }}" href="{{ $route }}">
    <img class="d-block image-size-spotlight w-100" src="{{ URL::to('/') . '/files/' . $imageName }}" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
        <h5> {{ $title }} </h5>
        <p> {{ $subtitle }} </p>
    </div>
</a>
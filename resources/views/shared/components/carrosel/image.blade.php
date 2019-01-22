<a class="carousel-item {{ $active }}" href="{{ $route }}">
    @if($imageName != '')
        <img class="d-block image-size-spotlight w-100" src="{{ URL::to('/') . '/files/' . $imageName }}" alt="First slide">
    @else
    <img class="d-block image-size-spotlight w-100" src="{{ URL::to('/') . '/files/noimage.png' }}" alt="First slide">
    @endif
    <div class="carousel-caption d-none d-md-block">
        <h5> {{ $title }} </h5>
        <p> {{ $subtitle }} </p>
    </div>
</a>
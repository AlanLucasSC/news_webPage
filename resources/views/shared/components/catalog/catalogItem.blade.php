<div class="col-md-{{ $columnLenght }} px-0">
    <div class="card flex-md-row mb-0 noticia">
        <div class="card-body d-flex flex-column align-items-start">
            @unless(empty($imageName))
                <a href="{{ $url }}">
                    <img class="card-img-top flex-auto d-lg-block scale-active" src="{{ URL::to('/') . '/files/' . $imageName }}" />
                </a>
            @endunless
            <h5 class="mb-0">
                <a class="text-dark" href="{{ $url }}">{{ $name }}</a>
            </h5>
            <p class="card-text mb-auto">{{ $description }}</p>
            <p>{{ $contact }}</p>
        </div>
    </div>
</div>
    
    
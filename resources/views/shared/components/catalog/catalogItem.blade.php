<div class="col-md-{{ $columnLenght }} px-0">
    <div class="card flex-md-row mb-0 noticia">
        <div class="card-body d-flex flex-column align-items-start">
            <a href="{{ $route }}">
                <img class="card-img-top flex-auto d-none d-lg-block scale-active" src="{{ URL::to('/') . '/files/' . $imageName }}" />
            </a>
            <h5 class="mb-0">
                <a class="text-dark" href="{{ $route }}">{{ $name }}</a>
            </h5>
            <p class="card-text mb-auto">{{ $description }}</p>
            <p>{{ $contact }}</p>
        </div>
    </div>
</div>
    
    
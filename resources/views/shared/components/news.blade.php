<div class="col-md-{{ $columnLenght }} px-0">
    <div class="card flex-md-row mb-0 noticia">
        <div class="card-body d-flex flex-column align-items-start">
            <img class="card-img-top flex-auto d-none d-lg-block scale-active" src="/img/{{ $imageName }}" />
            <div class="d-flex w-100 justify-content-between my-1 "> 
                <strong class="mb-2 text-{{ $categoryColor }}">{{ $category }}</strong>
                <div class="mb-1 text-muted">{{ $later }}</div>
            </div>
            <h4 class="mb-0">
                <a class="text-dark" href="{{ route( $route ) }}">{{ $title }}</a>
            </h4>
            <p class="card-text mb-auto">{{ $description }}</p>
            <div class="w-100 text-right">
                <a href="{{ route( $route ) }}">Continuar lendo</a>
            </div>
        </div>
    </div>
</div>


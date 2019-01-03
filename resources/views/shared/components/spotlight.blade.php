<div class="card border-0 text-center">
    <div class="card-body">
        <div class="text-left border-bottom border-{{ $categoryColor }} categoria">
            <small class="text-{{ $categoryColor }}"> {{ $category }} </small>
        </div>
        <h1 class="scale-active destaque card-title text-center">
            <a class="text-dark" href="{{ route( $route ) }}">
                {{ $news }}
            </a>
        </h1>
        <p class="card-text">
            {{ $description }}
        </p>
    </div>
</div>
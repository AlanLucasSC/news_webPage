<div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
    <ol class="carousel-indicators">
        @php
            $cont = 0;
        @endphp
        @for($index = 0; $index < $lenght; $index++)
            @if($cont == 0)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $cont }}" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $cont }}"></li>
            @endif
            @php
                $cont++;
            @endphp
        @endfor
    </ol>
    <div class="carousel-inner">
        {{ $slot }}
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>
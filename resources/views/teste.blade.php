@main

@foreach ($newsByCategory as $category)
    @foreach ($category as $item)
        {{ $item }}
    @endforeach
@endforeach

@endmain
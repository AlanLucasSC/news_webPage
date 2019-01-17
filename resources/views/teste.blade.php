@main

@foreach ($newsByCategory as $category)
    @foreach ($category as $item)
        {{ $item->name }}
    @endforeach
@endforeach

@endmain
@main

<div class="container">
    <div class="row">
        @foreach ($newsByCategory as $category)
            
                @foreach($category as $news)
                    @news([
                        'columnLenght' => '6',
                        'imageName' => $news->imageName,
                        'category' => '$category->name',
                        'categoryColor' => '$category->color',
                        'later' => $news->date,
                        'title' => $news->title,
                        'description' => '',
                        'route' => route('news.show', $news->id)
                    ]) @endnews
                @endforeach
            @endcategory
        @endforeach 
    </div>
</div>
@endmain


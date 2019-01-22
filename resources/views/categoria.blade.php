@main
    <div class="container mb-4">
        @if( isset($spotlight) )
            @spotlight([
                'categoryColor' => $category->color,
                'category' => $category->name,
                'news' => $spotlight->title,
                'description' => $spotlight->subtitle,
                'route' => route('news.show', $spotlight->id),
            ]) 
            @endspotlight
        @endif
        <!-- news by category -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @category([
                        'category' => $category->name,
                        'categoryColor' => $category->color,
                        'news' => []
                    ])
                        @foreach($news_list as $news)
                            @news([
                                'columnLenght' => '6',
                                'imageName' => $news->imageName,
                                'category' => $category->name,
                                'categoryColor' => $category->color,
                                'later' => $news->date,
                                'title' => $news->title,
                                'description' => '',
                                'route' => route('news.show', $news->id)
                            ]) @endnews
                        @endforeach
                    @endcategory
                </div>
                <div class="col-md-4">
                    <div class="sticky-top z-1000">
                        @listGroup([
                            'title' => 'Mais Vistos'
                        ])
                            @foreach($moreViews as $news)
                                @groupItem([
                                    'route' => route('news.show', $news->id),
                                    'title' => $news->title,
                                    'later' => $news->date,
                                    'description' => ''
                                ]) @endgroupItem
                            @endforeach
                            @php 
                                $category = App\AdvertisingCategory::where('name', 'Suquarw banner 300px250px')->first();
                                $advertising = App\Advertising::where('category_id', $category->id)->first();
                                if( isset($advertising) ){
                                    $image = App\File::findOrFail($advertising->file_id);
                                }
                            @endphp
                            @if( isset($advertising) )
                                <a href="{{ $advertising->url }}" class="p-1">
                                    <figure class="text-center">
                                        @if( isset($image) )
                                            <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 300px; max-height: 250px"  />
                                        @else 
                                            <img src="{{ $advertising->url }}" style="max-width: 300px; max-height: 250px" /> 
                                        @endif
                                    </figure>
                                </a>
                            @endif
                        @endlistGroup
                    </div>
                </div>
            </div>
            <div>
                {{ $pagination->links() }}
            </div>
        </div>
    </div>

    
        
    
@endmain
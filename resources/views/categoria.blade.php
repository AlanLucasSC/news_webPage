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
                            @advertising([
                                'url' => 'https://cdn.midiamax.com.br/elasticbeanstalk-us-west-2-809048387867/uploads/2018/12/BANNER-NATAL-MORANGO.jpg',
                                'name' => 'propaganda2.jpg'
                            ]) @endadvertising
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
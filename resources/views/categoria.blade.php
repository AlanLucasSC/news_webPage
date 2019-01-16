@main
    <div class="container mb-4">
        @if(count($news_list) > 0)
            @spotlight([
                'categoryColor' => $category->color,
                'category' => $category->name,
                'news' => $spotlight->title,
                'description' => $spotlight->subtitle,
                'route' => route('news.show', $spotlight->id),
            ]) 
            @endspotlight
        @endif
        <div class="row">
            <div class="row col-lg-8">
                @if(count($news_list) > 1)
                    @for ($index = 1; $index < 3; $index++)
                        @if(isset($news_list[$index]))
                            @news([
                                'columnLenght' => '6',
                                'imageName' => $news_list[$index]->imageName,
                                'category' => $category->name,
                                'categoryColor' => $category->color,
                                'later' => $news_list[$index]->date,
                                'title' => $news_list[$index]->title,
                                'description' => $news_list[$index]->subtitle,
                                'route' => route('news.show', $news_list[$index]->id)
                            ]) @endnews
                        @endif
                    @endfor
                @endif
            </div> 
            <!-- recent news -->
            <div class="col-lg-4">
                @listGroup([
                    'title' => 'Destaques'
                ])
                    @if(count($news_list) > 3)
                        @for ($index = 3; $index < 6; $index++)
                            @if(isset($news_list[$index]))
                                @groupItem([
                                    'route' => route('news.show', $news_list[$index]->id),
                                    'title' => $news_list[$index]->title,
                                    'later' => $news_list[$index]->date,
                                    'description' => $news_list[$index]->subtitle
                                ]) @endgroupItem
                            @endif
                        @endfor
                    @endif
                @endlistGroup
            </div>
            <!-- news -->
            
        </div>
        <!-- advertising -->
        @advertising([
            'url' => 'https://tpc.googlesyndication.com/simgad/7855129284900403990',
            'name' => 'propaganda1.gif'
        ]) @endadvertising

        <div class="row">
            <div class="row col-lg-12">
                @foreach($news_list as $news)
                    @news([
                        'columnLenght' => '3',
                        'imageName' => $news->imageName,
                        'category' => $category->name,
                        'categoryColor' => $category->color,
                        'later' => $news->date,
                        'title' => $news->title,
                        'description' => '',
                        'route' => route('news.show', $news->id)
                    ]) @endnews
                @endforeach
            </div> 
        </div>
        @advertising([
            'url' => 'https://tpc.googlesyndication.com/simgad/7855129284900403990',
            'name' => 'propaganda1.gif'
        ]) @endadvertising 
    </div>

    
        
    
@endmain
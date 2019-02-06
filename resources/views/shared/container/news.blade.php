@main([
    'title' => $title,
    'description' => $subtitle,
    'image' => $urlPhoto
])
    <main role="main">
        @newsTitle([
            'title' =>  "$title" ,
            'subtitle' =>  "$subtitle" ,
            'date' =>  "$date" ,
            'time' =>  "$time" ,
            'lastUpdated' =>  "$lastUpdated" 
        ])
        @endnewsTitle
        <!--Corpo Notícia-->
        <div class="container my-2">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <!-- Redes sociais -->
                    <div class="d-inline-block">
                        @if(false)
                            @socialLink([
                                'url' => '#' , 
                                'icon' => 'fa-facebook'
                            ])
                            @endsocialLink
                            @socialLink([
                                'url' => '#', 
                                'icon' => 'fa-instagram'
                            ])
                            @endsocialLink
                            @socialLink([
                                'url' => '#', 
                                'icon' => 'fa-twitter'
                            ])
                            @endsocialLink
                        @endif
                    </div> <!-- ./ Redes sociais-->

                    @newsPhoto([
                        'url' =>  "$urlPhoto" ,
                        'source' =>  "$source" 
                    ])
                    @endnewsPhoto

                    <div id="markdown" class="markdown-body">
                        {!! $text !!}
                    </div>
                    
                </div>
                <div class="col-lg-2">
                    
                </div>
                
            </div>
        
            @author([ 
                'author' =>  "$author" ,
            ])
            @endauthor

            <div class="container">
                <div class="row">
                    @php
                        $news_list = App\News::skip(0)->take(12)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
                        foreach($news_list as $news){
                            $file = App\File::find($news->file_id);
                            $category = App\Category::find($news->category_id);
                            $news->imageName = $file ? $file->name : '';
                            $news->categoryName = $category->name;
                        }
                        $cont = 0;
                    @endphp
                    @foreach( $news_list as $news)
                        @news([
                            'columnLenght' => '4',
                            'imageName' => $news->imageName,
                            'category' => $news->categoryName,
                            'categoryColor' => $category->color,
                            'later' => $news->date,
                            'title' => $news->title,
                            'description' => '',
                            'route' => route('news.show', $news->id)
                        ]) @endnews
                    @endforeach
                </div>
                <?php 
                    $category = App\AdvertisingCategory::where('name', 'Super banner 940px100px')->first();
                    $advertising = App\Advertising::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
                    if( isset($advertising->file_id) ){
                        $image = App\File::findOrFail($advertising->file_id);
                    }
                    //dd($advertising);
                ?>
                @if( isset($advertising) )
                    <a href="{{ $advertising->url }}" class="p-1">
                        <figure class="text-center">
                            @if( isset($image) )
                                <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 728; max-height: 90px"  />
                            @else 
                                <img src="{{ $advertising->url }}" style="max-width: 728px; max-height: 90px" /> 
                            @endif
                        </figure>
                    </a>
                @endif
            </div>
            
        </div><!-- ./ corpo noticia-->
    </main>

@endmain

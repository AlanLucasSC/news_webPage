@main
    <!-- initial content -->
    <div class="container mb-4">
        @php
            $spotlight = App\News::orderBy('date', 'desc')->orderBy('time', 'desc')->first();
        @endphp
        @if(isset($spotlight))
            @spotlight([
                'categoryColor' => 'success',
                'category' => 'Mato Grosso do Sul',
                'news' => $spotlight->title,
                'description' => $spotlight->subtitle,
                'route' => route('news.show', $spotlight->id)
            ]) @endspotlight
        @endif
        <div class="row">
            <!-- carrosel -->
            <div class="col-lg-8 d-flex align-items-center">
                @carrosel
                    @php
                        $news_list = App\News::skip(0)->take(3)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
                        foreach($news_list as $news){
                            $file = App\File::find($news->file_id);
                            $news->imageName = $file->name;
                        }
                        $cont = 0;
                    @endphp
                    @foreach( $news_list as $news)
                        @carroselImage([
                            'active' => $cont == 0 ? 'active' : '',
                            'imageName' => $news->imageName,
                            'title' => $news->title,
                            'subtitle' => $news->subtitle,
                            'route' => route('news.show', $news->id)
                        ]) @endcarroselImage
                        @php $cont++; @endphp
                    @endforeach
                @endcarrosel
            </div>
            <!-- recent news -->
            <div class="col-lg-4">
                @listGroup([
                    'title' => 'Destaques'
                ])
                    @php
                        $news_list = App\News::skip(3)->take(3)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
                    @endphp
                    @foreach( $news_list as $news)
                        @groupItem([
                            'route' => route('news.show', $news->id),
                            'title' => $news->title,
                            'later' => $news->date,
                            'description' => $news->subtitle
                        ]) @endgroupItem
                    @endforeach
                @endlistGroup
            </div>
        </div>
        <!-- advertising -->
        @php 
            $category = App\AdvertisingCategory::where('name', 'Full banner 728px90px')->first();
            $advertising = App\Advertising::where('category_id', $category->id)->first();
            if( isset($advertising) ){
                $image = App\File::findOrFail($advertising->file_id);
            }
        @endphp
        @if( isset($image) )
            <a href="{{ $advertising->url }}" class="p-1">
                <figure class="text-center">
                    <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 100%; max-height: 90px" /> 
                </figure>
            </a>
        @endif
    </div>
    
    <!-- news by category -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach( $categories as $category )
                    @if( DB::table('news')->where('category_id', $category->id)->count() != 0 )
                        @category([
                            'category' => $category->name,
                            'categoryColor' => $category->color,
                            'news' => []
                        ])
                            @php
                                $categoryNews = App\News::where('category_id', $category->id)->skip(0)->take(4)->get();
                                foreach($categoryNews as $news){
                                    $file = App\File::find($news->file_id);
                                    $news->imageName = $file->name;
                            @endphp
                                    @news([
                                        'columnLenght' => '6',
                                        'imageName' => $news->imageName,
                                        'category' => $category->name,
                                        'categoryColor' => $category->color,
                                        'later' => $news->date,
                                        'title' => $news->title,
                                        'description' => $news->subtitle,
                                        'route' => route('news.show', $news->id)
                                    ]) @endnews
                            @php
                                }
                            @endphp
                        @endcategory
                    @endif
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="sticky-top z-1000">
                    @listGroup([
                        'title' => 'Mais Vistos'
                    ])
                        @php
                            $moreViews = App\News::skip(0)
                                            ->take(3)
                                            ->orderBy('views', 'desc')
                                            ->get();
                        @endphp
                        @foreach( $moreViews as $news)
                            @groupItem([
                                'route' => route('news.show', $news->id),
                                'title' => $news->title,
                                'later' => $news->date,
                                'description' => $news->subtitle
                            ]) @endgroupItem
                        @endforeach
                        @php 
                            $category = App\AdvertisingCategory::where('name', 'Suquarw banner 300px250px')->first();
                            $advertising = App\Advertising::where('category_id', $category->id)->first();
                            if( isset($advertising) ){
                                $image = App\File::findOrFail($advertising->file_id);
                            }
                        @endphp
                        @if( isset($image) )
                            <a href="{{ $advertising->url }}" class="p-1">
                                <figure class="text-center">
                                    <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 300px; max-height: 250px" /> 
                                </figure>
                            </a>
                        @endif
                    @endlistGroup
                </div>
            </div>
        </div>
        @php 
            $category = App\AdvertisingCategory::where('name', 'Full banner 728px90px')->first();
            $advertising = App\Advertising::where('category_id', $category->id)->first();
            if( isset($advertising) ){
                $image = App\File::findOrFail($advertising->file_id);
            }
        @endphp
        <div class="">
            @if( isset($image) )
                <a href="{{ $advertising->url }}" class="p-1">
                    <figure class="text-center">
                        <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 100%; max-height: 90px" /> 
                    </figure>
                </a>
            @endif
        </div>
    </div>
    @catalog()
        @foreach ($catalog as $ads)
            @catItem([
                'columnLenght' => 4,
                'imageName' => $ads->imageName,
                'name' => $ads->name,
                'description' => $ads->description,
                'contact' => $ads->contact
            ])

            @endcatItem
        @endforeach
    @endcatalog
@endmain
@main
    <!-- initial content -->
    <div class="container mb-4 mt-3">
        @php 
            $category = App\AdvertisingCategory::where('name', 'Super banner 940px100px')->first();
            $advertising = App\Advertising::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
            $image = null;
            if( isset($advertising->file_id) ){
                $image = App\File::findOrFail($advertising->file_id);
            }
        @endphp
        @if( isset($advertising) )
            <a href="{{ $advertising->url }}" class="p-1">
                <figure class="text-center">
                    @if( isset($image) )
                        <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 100%; max-height: 90px"  />
                    @else 
                        <img src="{{ $advertising->url }}" style="max-width: 100%; max-height: 90px" /> 
                    @endif
                </figure>
            </a>
        @endif
        <div class="row">
            <!-- carrosel -->
            <div class="col-lg-8 d-flex align-items-center">
                @php
                    $news_list = App\News::where('spotlight', 'YES')->skip(0)->take(4)->orderBy('created_at', 'desc')->get();
                    foreach($news_list as $news){
                        $file = App\File::find($news->file_id);
                        $news->imageName = $file ? $file->name : '';
                    }
                    $lenght = count($news_list);
                    $cont = 0;
                @endphp
                @carrosel([
                    'lenght' => $lenght
                ])
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
                        $news_list = App\News::skip(4)->take(3)->orderBy('created_at', 'desc')->get();
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
            $advertising = App\Advertising::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
            $image = null;
            if( isset($advertising->file_id) ){
                $image = App\File::findOrFail($advertising->file_id);
            }
        @endphp
        @if( isset($advertising) )
            <a href="{{ $advertising->url }}" class="p-1">
                <figure class="text-center">
                    @if( isset($image) )
                        <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 100%; max-height: 90px"  />
                    @else 
                        <img src="{{ $advertising->url }}" style="max-width: 100%; max-height: 90px" /> 
                    @endif
                </figure>
            </a>
        @endif
    </div>
    
    <!-- news by category -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            	@php
                    $date_raw = date("r");
                    $twoDaysBefore = date('Y-m-d', strtotime('-2 day', strtotime($date_raw)))
                @endphp
                @foreach( $categories as $category )
                    @if( DB::table('news')->where('category_id', $category->id)->whereDate( 'created_at', '>', $twoDaysBefore )->count() != 0 )
                        @category([
                            'category' => $category->name,
                            'categoryColor' => $category->color,
                            'news' => []
                        ])
                            @php
                                $categoryNews = App\News::where('category_id', $category->id)
                                                    ->whereDate( 'created_at', '>', $twoDaysBefore )
                                                    ->orderBy('created_at', 'desc')
                                                    ->skip(0)->take(6)->get();
                                foreach($categoryNews as $news){
                                    $file = App\File::find($news->file_id);
                                    $news->imageName = $file ? $file->name : '';
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
                <div>
                    @listGroup([
                        'title' => 'Publicidade'
                    ])
                        @php 
                            $category = App\AdvertisingCategory::where('name', 'Banner rodape 300px100px')->first();
                            $advertisements = App\Advertising::where('category_id', $category->id)
                                        ->orderBy('created_at', 'desc')
                                        ->offset(0)
                                        ->take(3)
                                        ->get();
                            foreach($advertisements as $advertising){
                                if( isset($advertising->file_id) ){
                                    $advertising->image = App\File::findOrFail($advertising->file_id)->name;
                                }
                            }
                        @endphp
                        @foreach($advertisements as $advertising)
                            <a href="{{ $advertising->url }}" class="p-1">
                                <figure class="text-center">
                                    @if( isset($advertising->image) )
                                        <img src="{{ URL::to('/') . '/files/' . $advertising->image }}" style="max-width: 300px; max-height: 100px"  />
                                    @else 
                                        <img src="{{ $advertising->url }}" style="max-width: 300px; max-height: 100px" /> 
                                    @endif
                                </figure>
                            </a>
                        @endforeach
                    @endlistGroup
                </div>
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
                            $advertising = App\Advertising::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
                            $image = null;
                            if( isset($advertising->file_id) ){
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
        @php 
            $category = App\AdvertisingCategory::where('name', 'Full banner 460px60px')->first();
            $advertising = App\Advertising::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
            $image = null;
            if( isset($advertising->file_id) ){
                $image = App\File::findOrFail($advertising->file_id);
            }
        @endphp
        <div class="">
            @isset($advertising)
                <a href="{{ $advertising->url }}" class="p-1">
                    <figure class="text-center">
                        @if( isset($image) )
                            <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="max-width: 100%; max-height: 90px"  />
                        @else 
                            <img src="{{ $advertising->url }}" style="max-width: 100%; max-height: 90px" /> 
                        @endif
                    </figure>
                </a>
            @endisset
        </div>
        <div>
            @isset($catalog)
                @catalog
                    @foreach($catalog as $catItem)
                        @php
                            $image = App\File::find($catItem->file_id);
                        @endphp
                        @catItems([
                            'columnLenght' => 4,
                            'url' => $catItem->url,
                            'name' => $catItem->name,
                            'description' => $catItem->description,
                            'contact' => $catItem->contact,
                            'imageName' => $image->name ?? ''
                        ])
                        @endcatItems
                    @endforeach
                @endcatalog
            @endisset
        </div>
    </div>
@endmain
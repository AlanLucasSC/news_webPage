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
                    @groupItem([
                        'route' => 'login',
                        'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                        'later' => '3 dias atrás',
                        'description' => 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.'
                    ]) @endgroupItem
                    @groupItem([
                        'route' => 'login',
                        'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                        'later' => '3 dias atrás',
                        'description' => 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.'
                    ]) @endgroupItem
                    @groupItem([
                        'route' => 'login',
                        'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                        'later' => '3 dias atrás',
                        'description' => 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.'
                    ]) @endgroupItem
                @endlistGroup
            </div>
            <!-- news -->
            @news([
                'columnLenght' => '4',
                'imageName' => 'G_noticia_27524.jpg',
                'category' => 'Cultura',
                'categoryColor' => 'primary',
                'later' => '3 dias atrás',
                'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                'route' => 'login'
            ]) @endnews
            @news([
                'columnLenght' => '4',
                'imageName' => 'download.jpg',
                'category' => 'Economia',
                'categoryColor' => 'success',
                'later' => '3 dias atrás',
                'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                'route' => 'login'
            ]) @endnews
            @news([
                'columnLenght' => '4',
                'imageName' => 'maxresdefault.jpg',
                'category' => 'Mato Grosso do Sul',
                'categoryColor' => 'warning',
                'later' => '3 dias atrás',
                'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                'route' => 'login'
            ]) @endnews
        </div>
        <!-- advertising -->
        @advertising([
            'url' => 'https://tpc.googlesyndication.com/simgad/7855129284900403990',
            'name' => 'propaganda1.gif'
        ]) @endadvertising
    </div>
    
    <!-- news by category -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @category([
                    'category' => 'Mato Grosso do Sul',
                    'categoryColor' => 'success',
                    'news' => [
                        'batata',
                        'alho'
                    ]
                ])
                    @news([
                        'columnLenght' => '12',
                        'imageName' => 'maxresdefault.jpg',
                        'category' => 'Mato Grosso do Sul',
                        'categoryColor' => 'success',
                        'later' => '3 dias atrás',
                        'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                        'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                        'route' => 'login'
                    ]) @endnews
                    @news([
                        'columnLenght' => '6',
                        'imageName' => 'G_noticia_27524.jpg',
                        'category' => 'Mato Grosso do Sul',
                        'categoryColor' => 'success',
                        'later' => '3 dias atrás',
                        'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                        'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                        'route' => 'login'
                    ]) @endnews
                    @news([
                        'columnLenght' => '6',
                        'imageName' => 'download.jpg',
                        'category' => 'Mato Grosso do Sul',
                        'categoryColor' => 'success',
                        'later' => '3 dias atrás',
                        'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                        'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                        'route' => 'login'
                    ]) @endnews
                @endcategory
                @category([
                    'category' => 'Esporte',
                    'categoryColor' => 'info'
                ])
                    @news([
                        'columnLenght' => '12',
                        'imageName' => 'maxresdefault.jpg',
                        'category' => 'Esporte',
                        'categoryColor' => 'info',
                        'later' => '3 dias atrás',
                        'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                        'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                        'route' => 'login'
                    ]) @endnews
                    @news([
                        'columnLenght' => '6',
                        'imageName' => 'G_noticia_27524.jpg',
                        'category' => 'Esporte',
                        'categoryColor' => 'info',
                        'later' => '3 dias atrás',
                        'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                        'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                        'route' => 'login'
                    ]) @endnews
                    @news([
                        'columnLenght' => '6',
                        'imageName' => 'download.jpg',
                        'category' => 'Esporte',
                        'categoryColor' => 'info',
                        'later' => '3 dias atrás',
                        'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                        'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                        'route' => 'login'
                    ]) @endnews
                @endcategory
            </div>
            <div class="col-md-4">
                <div class="sticky-top z-1000">
                    @listGroup([
                        'title' => 'Mais Vistos'
                    ])
                        @groupItem([
                            'route' => 'login',
                            'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                            'later' => '3 dias atrás',
                            'description' => 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.'
                        ]) @endgroupItem
                        @groupItem([
                            'route' => 'login',
                            'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                            'later' => '3 dias atrás',
                            'description' => 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.'
                        ]) @endgroupItem
                        @groupItem([
                            'route' => 'login',
                            'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                            'later' => '3 dias atrás',
                            'description' => 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.'
                        ]) @endgroupItem
                        @advertising([
                            'url' => 'https://cdn.midiamax.com.br/elasticbeanstalk-us-west-2-809048387867/uploads/2018/12/BANNER-NATAL-MORANGO.jpg',
                            'name' => 'propaganda2.jpg'
                        ]) @endadvertising
                    @endlistGroup
                </div>
            </div>
        </div>
    </div>
@endmain
@main
    <!-- initial content -->
    <div class="container mb-4">
        @spotlight([
            'categoryColor' => 'success',
            'category' => 'Mato Grosso do Sul',
            'news' => 'MINISTRO DETERMINA SOLTURA DE PRESOS COM CONDENAÇÃO APÓS 2ª INSTÂNCIA E LULA PODE SER SOLTO',
            'description' => 'A decisão liminar (provisória) de Marco Aurélio Mello atendeu a pedido do PCdoBs',
            'route' => 'login',
        ]) 
        @endspotlight

        <div class="row">
            <div class="row col-lg-8">
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
            
        </div>
        <!-- advertising -->
        @advertising([
            'url' => 'https://tpc.googlesyndication.com/simgad/7855129284900403990',
            'name' => 'propaganda1.gif'
        ]) @endadvertising

        <div class="row">
            <div class="row col-lg-12">

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
                    'columnLenght' => '4',
                    'imageName' => 'download.jpg',
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
        </div>
        <div class="row col-lg-12">
            
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
                'columnLenght' => '8',
                'imageName' => 'maxresdefault.jpg',
                'category' => 'Mato Grosso do Sul',
                'categoryColor' => 'warning',
                'later' => '3 dias atrás',
                'title' => 'Curabitur diam urna, imperdiet vel orci ut',
                'description' => 'Curabitur diam urna, imperdiet vel orci ut, tincidunt pellentesque massa',
                'route' => 'login'
            ]) @endnews
        </div>
        @advertising([
            'url' => 'https://tpc.googlesyndication.com/simgad/7855129284900403990',
            'name' => 'propaganda1.gif'
        ]) @endadvertising 
    </div>

    
        
    
@endmain
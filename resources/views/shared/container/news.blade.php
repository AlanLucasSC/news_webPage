@main

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
                    </div> <!-- ./ Redes sociais-->

                    @newsPhoto([
                        'url' =>  "$urlPhoto" ,
                        'source' =>  "$source" 
                    ])
                    @endnewsPhoto

                    @newsText([
                        'text' =>  "$text" 
                    ])
                    @endnewsText
                </div>
                <div class="col-lg-2">
                    
                </div>
                
            </div>
        
            @author([ 
                'url' => "$urlAuthor" ,
                'author' =>  "$author" ,
                'description' => "$authorDescription"
            ])
            @endauthor
            
        </div><!-- ./ corpo noticia-->
    </main>


@endmain

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
                    </div>
                    
                </div>
                <div class="col-lg-2">
                    
                </div>
                
            </div>
        
            @author([ 
                'author' =>  "$author" ,
            ])
            @endauthor
            
        </div><!-- ./ corpo noticia-->
    </main>
    <script type="text/javascript">
        window.onload = function () {
            $(document).ready(function() {
                function replaceAll(text, needle, replacement){
                    return text.split(needle).join(replacement)
                }

                function insertMarkdom(markdown){
                    request = $.ajax({
                        url: "{{ route('getHtml') }}",
                        method: "GET",
                        dataType: "json",
                        data: {
                            markdown: markdown
                        },
                        complete: function(response) {
                            markdown = document.querySelector('.markdown-body')
                            markdown.innerHTML = response.responseText
                        }
                    })
                }

                $.ajax({
                    url: "{{ route('news.plus') }}",
                    method: "GET",
                    dataType: "json",
                    data: {
                        id: {{ $id }}
                    },
                    complete: function(response) {
                        console.log(response.responseText)
                    }
                })
            
                insertMarkdom( `{{ $text }}` )
            })
        }
    </script>

@endmain

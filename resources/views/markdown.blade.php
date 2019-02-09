@main
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 pb-3 row">
        <div class="col-12 w-100 ml-2 pt-3 px-3 overflow-hidden" style="display:inline-block;">
            <form 
                class="row" 
                enctype="multipart/form-data" 
                id="form" 
                role="form" 
                method="POST" 
                action="{{ isset($id) ? route('news.update', $id) : route('news.store') }}"
            >
                @if( isset($id) )
                    <input name="_method" type="hidden" value="PUT">
                @endif
                {{ csrf_field() }}
                <div class="form-group col-md-6">
                    <label for="inputTitle"><h4>Título</h4></label>
                    <input
                        type="text" 
                        name="title" 
                        class="form-control" 
                        id="inputTitle" 
                        placeholder="Coloque um título"
                        value="{{ $news->title ?? '' }}"
                        required
                    >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCategory"><h4>Categoria</h4></label>
                    <select class="form-control" name="category" id="inputCategory" required>
                        @foreach($categories as $category)
                            <option 
                                value="{{ $category->id }}"
                                @if( isset($news) )
                                    @if($category->id === $news->category_id)
                                        {{ 'selected' }}
                                    @endif
                                @endif
                            > {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCategory"><h4>Destaque - Slide</h4></label>
                    <select class="form-control" name="spotlight" id="inputSpotlight" required>
                        <option value="NO">NÂO</option>
                        <option value="YES">SIM</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputImage"><h4>Imagem de Capa</h4></label>
                    <input type="file" name="image" class="form-control-file" id="inputImage">
                </div>
                <div class="form-group col-md-8">
                    <label for="inputTitle"><h4>Fonte</h4></label>
                    <input
                        type="text" 
                        name="imageSource" 
                        class="form-control" 
                        id="imageSource" 
                        placeholder="Coloque a fonte da imagem"
                        value="{{ $news->imageSource ?? '' }}"
                    >
                </div>
                <div class="form-group col-md-12">
                    <label for="inputSubtitle"><h4>Subtítulo</h4></label>
                    <textarea 
                        class="form-control" 
                        name="subtitle" 
                        id="inputSubtitle" 
                        rows="3"
                    >{{ $news->subtitle ?? '' }}</textarea>
                </div>
                
                <textarea name="text" id="inputText" cols="30" rows="10" hidden></textarea>
                
                <div class="form-group col-md-12 pt-3 pb-3 text-right">
                    <input class="btn btn-success" type="Submit" value="Salvar">
                </div>
            </form>
        </div>
        
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 pb-3">
            <div class="col-md-6 w-md-50 mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden" style="display:inline-block;">
                <div class="text-center">
                    <h2 class="display-5"><h4>Notícia</h4></h2>
                    <a href="https://forum.techtudo.com.br/ajuda_markdown/"> Ajuda para escrever a noticia </a>
                </div>
                <div 
                    class="border shadow-lg mx-auto pb-3" 
                    style="width: 100%; min-height: 50vh; border-width: 5px;"
                >
                    <div 
                        contentEditable="true"
                        id="text"
                        class="pt-2 px-3 container-fluid text-secondary text-justify"
                        style="width: 100%; min-height: 50vh;">
                    </div>
                </div>
                <div class="text-right pb-1 pt-2">
                    <input class="btn btn-success" id="buttonNewImage" type="Submit" value="Adicionar Imagem ou video">
                    <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
                        {{ csrf_field() }}
                        <input type="file" name='file' id="newImage" hidden>
                        <input type="number" name='newsId' value="{{ $id ?? -1 }}" hidden>
                    </form>
                </div>
                <div class="text-center d-none" id="load">
                    Fazendo o upload do arquivo. Espera um pouco...
                </div>
                <div class="row pt-2" id="images">
                </div>
                <div>
                    <div class="form-group">
                        <label for="search">Nome do Arquivo</label>
                        <input type="text" class="form-control" id="search" aria-describedby="fileHelp" placeholder="Nome do arquivo">
                        <small id="emailHelp" class="form-text text-muted">Insira o nome de um arquivo para poder ser pesquisado.</small>
                    </div>

                    <input class="btn btn-success" id="searchButton" type="button" value="Pesquisar">
                </div>
                <div class="row pt-2" id="listImage">
                    @foreach($files as $file)
                        @if( $file->type === 'IMAGE' )
                            <div class="card col-md-4 bg-white border-0">
                                <img src="{{ URL::to('/') }}/files/{{ $file->name }}" class="mt-1 card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Importar</h5>
                                    <p class="card-text">
                                        ![{{ $file->originalName }}]({{ URL::to('/') }}/files/{{ $file->name }})
                                    </p>
                                </div>
                            </div>
                        @elseif( $file->type === 'VIDEO' )
                            <div class="card col-md-4 bg-white border-0">
                                <video width="100%" controls="">
                                    <source src="{{ URL::to('/') }}/files/{{ $file->name }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="card-body">
                                    <h5 class="card-title">Importar</h5>
                                    <p class="card-text">
                                        ?[{{ URL::to('/') }}/files/{{ $file->name }}]?
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <br>
            </div>
            <div class="col-md-6 w-md-50 bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
                <div class="text-center">
                    <h2 class="display-5">Visualização</h2>
                </div>
                <div 
                    class="bg-white shadow-lg mx-auto" 
                    style="width: 100%; min-height: 50vh; border-width: 5px;"
                >
                    @newsTitle([
                        'title' => isset($news) ? $news->title : '',
                        'subtitle' => isset($news)  ? $news->subtitle  : '',
                        'date' => isset($news)  ? $news->date : '',
                        'time' => isset($news)  ? $news->time : '',
                        'lastUpdated' => "Atualizado há uma hora"
                    ])
                    @endnewsTitle
                    @if( isset($image) )
                        <img src="{{ URL::to('/') }}/files/{{ $image->name}}" id="image" class="w-80 mx-auto d-block">
                    @endif
                    <div class="markdown-body">
                    </div>
                </div>
                <br>
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
        window.onload = function () {

            function replaceAll(text, needle, replacement){
                return text.split(needle).join(replacement)
            }

            function convertToEndOfLine(text){
                newText = replaceAll( text, '<br>', '</div><div>' )
                newText = replaceAll( text, '<p>', '<div>' )
                newText = replaceAll( text, '</p>', '</div>' )
                newText = replaceAll( newText, '<div>', '\n\n' )
                newText = replaceAll( newText, '</div>', '' )
                newText = replaceAll( newText, '&nbsp;', ' ' )
                return newText
            }
            function removePreTag(){
                tagsPre = $('#text > pre')
                for(var index = 0; index < tagsPre.length; index++){
                    pre = tagsPre[index]
                    text = pre.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    pre.replaceWith(div)
                }

                tagsPre = $('#text > div > pre')
                for(var index = 0; index < tagsPre.length; index++){
                    pre = tagsPre[index]
                    text = pre.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    pre.replaceWith(div)
                }
            }
            function removeFontTag(){
                tagsFont = $('#text > font')
                for(var index = 0; index < tagsFont.length; index++){
                    font = tagsFont[index]
                    text = font.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    font.replaceWith(div)
                }

                tagsFont = $('#text > div > font')
                for(var index = 0; index < tagsFont.length; index++){
                    font = tagsFont[index]
                    text = font.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    font.replaceWith(div)
                }
            }
            function removeSpanTag(){
                tagsSpan = $('#text > span')
                for(var index = 0; index < tagsSpan.length; index++){
                    span = tagsSpan[index]
                    text = span.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    span.replaceWith(div)
                }

                tagsSpan = $('#text > div > span')
                for(var index = 0; index < tagsSpan.length; index++){
                    span = tagsSpan[index]
                    text = span.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    span.replaceWith(div)
                }
            }

            function removePTag(){
                tagsP = $('#text > p')
                for(var index = 0; index < tagsP.length; index++){
                    p = tagsP[index]
                    text = p.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    p.replaceWith(div)
                }

                tagsP = $('#text > div > p')
                for(var index = 0; index < tagsP.length; index++){
                    p = tagsP[index]
                    text = p.textContent
                    var div = document.createElement("div")
                    div.innerText = text
                    p.replaceWith(div)
                }
            }

            function removeDivTag(){

                textInput = $('#text')
                tagsDiv = $('#text > div > div')
                for(var index = 0; index < tagsDiv.length; index++){
                    element = tagsDiv[index]
                    textInput.append(element)
                }
            }

            function removeHTag(){
                for(var index = 1; index <= 6; i++){
                    textInput = $('#text')
                    tagsH = $('#text > h'+index)
                    for(var index = 0; index < tagsH.length; index++){
                        h = tagsH[index]
                        text = h.textContent
                        var div = document.createElement("div")
                        div.innerText = text
                        h.replaceWith(div)
                    }
                }
            }

            function removeTags(){
                textInput = $('#text')
                textHtml = textInput[0]
                newTextHtml = replaceAll(textHtml.innerText, '\n', '</div><div>')
                var div = document.createElement("div")
                div.innerHTML = '<div>'+newTextHtml+'</div>'
                textInput.html(div)
            }

            function pasteHtmlToMarkdown(e){
                console.log('Aqui')
                removeTags()
                var markdown = convertToEndOfLine( $('#text').html() )

                

                $('#inputText').text(markdown)

                request = $.ajax({
                    url: "{{ route('getHtml') }}",
                    method: "POST",
                    dataType: "json",
                    data: {
                        markdown: markdown
                    },
                    complete: function(response) {
                        markdown = document.querySelector('.markdown-body')
                        markdown.innerHTML = response.responseText
                        //console.log(result.responseText)
                    }
                })
            }

            function getMarkdown(e){

                var markdown = convertToEndOfLine( $('#text').html() )

                $('#inputText').text(markdown)

                request = $.ajax({
                    url: "{{ route('getHtml') }}",
                    method: "POST",
                    dataType: "json",
                    data: {
                        markdown: markdown
                    },
                    complete: function(response) {
                        markdown = document.querySelector('.markdown-body')
                        markdown.innerHTML = response.responseText
                        //console.log(result.responseText)
                    }
                })
            }

            function insertMarkdom(markdown){
                htmlMarkdown = replaceAll( markdown, '\n&lt;br&gt;', '</div><div>' )
                htmlMarkdown = replaceAll( markdown, ' &lt;br&gt;', '</div><div>' )
                htmlMarkdown = replaceAll( htmlMarkdown, '&lt;br&gt;', ' ' )
                htmlMarkdown = replaceAll( htmlMarkdown, '.\n', '.</div><div>' )
                htmlMarkdown = replaceAll( htmlMarkdown, '\n\n', '</div><div>' )
                htmlMarkdown = replaceAll( htmlMarkdown, '.\r', '.</div><div>' )

                //console.log(htmlMarkdown)

                markdownSplited = htmlMarkdown.split("<br>")
                htmlMarkdown = ''
                for(var line = 0; line < markdownSplited.length; line++){
                    var text = markdownSplited[line]
                    htmlMarkdown += '<div>'+text+'</div>'
                }

                $('#text').append(htmlMarkdown)
                $('#inputText').append(markdown)
                request = $.ajax({
                    url: "{{ route('getHtml') }}",
                    method: "POST",
                    dataType: "json",
                    data: {
                        markdown: markdown
                    },
                    complete: function(response) {
                        markdown = document.querySelector('.markdown-body')
                        text = replaceAll( response.responseText, '&lt;br&gt;', ' ' )
                        markdown.innerHTML = text
                    }
                })
            }
            $(document).ready(function() {
                var typingTimer; //timer identifier
                var getMarkdownInterval = 1000; //time in ms, 1 second for example
                @if(isset($news))
                    insertMarkdom( `{{ $news->text }}` )
                @endif
                $("#text").on("paste", (e) => {
                    clearTimeout(typingTimer)
                    typingTimer = setTimeout( pasteHtmlToMarkdown, getMarkdownInterval);
                })
                $('#searchButton').on('click', function (){

                    request = $.ajax({
                        url: "{{ route('getFiles') }}?search="+$('#search').val(),
                        method: "GET",
                        dataType: "json",
                        complete: function(response) {
                            var jsonList = JSON.parse(response.responseText)
                            $( '#listImage' ).html( '' );
                            for(let i = 0; i < jsonList.length; i++){
                                json = jsonList[i]
                                switch(json.type){
                                    case 'IMAGE':
                                        $('#listImage').append(`
                                            <div class="card col-md-4 bg-white border-0">
                                                <img src="`+window.location.origin+`/files/`+json.name+`" class="mt-1 card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Importar</h5>
                                                    <p class="card-text">
                                                        ![`+json.originalName+`](`+window.location.origin+`/files/`+json.name+`)
                                                    </p>
                                                </div>
                                            </div>
                                        `)
                                        break;
                                    case 'VIDEO':
                                        $('#listImage').append(`
                                            <div class="card col-md-4 bg-white border-0">
                                                <video width="100%" controls="">
                                                    <source src="`+window.location.origin+`/files/`+json.uploaded_file+`" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="card-body">
                                                    <h5 class="card-title">Importar</h5>
                                                    <p class="card-text">
                                                        ?[`+window.location.origin+`/files/`+json.uploaded_file+`]?
                                                    </p>
                                                </div>
                                            </div>
                                        `)
                                        break;
                                }
                            }
                        }
                    })
                })
                $("body").on("keydown", "#text", (e) => {
                    clearTimeout(typingTimer)
                    typingTimer = setTimeout( getMarkdown, getMarkdownInterval);
                })
                $('#inputTitle').on('keyup', function (){
                    var title = $( this ).val()
                    $('h1#title').text( title )
                })
                $('#inputSubtitle').on('keyup', function (){
                    var title = $( this ).val()
                    $('#subtitle').text( title )
                })
                $('#inputImage').on('change', function(){
                    if($(this)[0].files.length > 0){
                        var image = this.files[0]
                        var reader = new FileReader()

                        var imageElement = document.getElementById("image");
                        imageElement.title = image.name;

                        reader.onload = function(event) {
                            imageElement.src = event.target.result;
                        };

                        reader.readAsDataURL(image);
                    } else {
                        var imageElement = document.getElementById("image");
                        imageElement.title = '';
                        imageElement.src = '...';
                    }
                })
                $('#buttonNewImage').on('click', function(){
                    $('#newImage').click()
                })
                $('#newImage').on('change', function(){
                    $('#load').removeClass('d-none')
                    if($(this)[0].files.length > 0){
                        console.log('nova imagem')
                        $.ajax({
                            url: '{{ route("file.store") }}',
                            data: new FormData( $("#upload_form")[0] ),
                            dataType: 'json',
                            type: 'POST',
                            processData: false,
                            contentType: false,
                            cache: false,
                            complete: function(response){
                                console.log(response)
                                var json = JSON.parse(response.responseText)
                                console.log(json)
                                $('#load').addClass('d-none')
                                switch(json.type){
                                    case 'IMAGE':
                                        $('#images').append(`
                                            <div class="card col-md-4 bg-white border-0">
                                                <img src="`+window.location.origin+`/files/`+json.uploaded_file+`" class="mt-1 card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Importar</h5>
                                                    <p class="card-text">
                                                        ![`+json.oriaginal_name+`](`+window.location.origin+`/files/`+json.uploaded_file+`)
                                                    </p>
                                                </div>
                                            </div>
                                        `)
                                        break;
                                    case 'VIDEO':
                                        $('#images').append(`
                                            <div class="card col-md-4 bg-white border-0">
                                                <video width="100%" controls="">
                                                    <source src="`+window.location.origin+`/files/`+json.uploaded_file+`" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="card-body">
                                                    <h5 class="card-title">Importar</h5>
                                                    <p class="card-text">
                                                        ?[`+window.location.origin+`/files/`+json.uploaded_file+`]?
                                                    </p>
                                                </div>
                                            </div>
                                        `)
                                        break;
                                }
                            }
                        })
                    }
                })
            })
        }
    </script>
@endmain

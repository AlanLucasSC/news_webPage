@main
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 pb-3">
        <div class="w-100 bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-white overflow-hidden" style="display:inline-block;">
            <form 
                class="row" 
                enctype="multipart/form-data" 
                id="form" 
                role="form" 
                method="POST" 
                action="{{ route('news.store') }}"
            >
                {{ csrf_field() }}
                <div class="form-group col-md-6">
                    <label for="inputTitle">Título</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Coloque um título">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCategory">Categoria</label>
                    <select class="form-control" name="category" id="inputCategory">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputImage">Imagem de Capa</label>
                    <input type="file" name="image" class="form-control-file" id="inputImage">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputSubtitle">Subtítulo</label>
                    <textarea class="form-control" name="subtitle" id="inputSubtitle" rows="3"></textarea>
                </div>
                <div class="text-right pt-3 pb-3">
                    <input class="button-save bg-dark text-white" type="Submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
    @if( isset($id) )
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 pb-3">
        <div class="w-md-50 bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-white overflow-hidden" style="display:inline-block;">
            <div class="text-center">
                <h2 class="display-5">Notícia</h2>
            </div>
            <div class="text-right pb-1">
                <input class="button-save bg-dark text-white" type="Submit" value="Salvar">
            </div>
            <div 
                class="bg-light box-shadow mx-auto pb-3" 
                style="width: 100%; height: 300px; border-radius: 2px 2px 2px 2px; overflow: auto;"
            >
                <div 
                    contentEditable="true"
                    id="text"
                    class="pt-2 px-3 container-fluid text-secondary text-justify"
                    style="width: 100%; min-height: 300px;">
                    @if( isset($text) )
                        {{ $text }}
                    @endif
                </div>
            </div>
            <div class="text-right pb-1 pt-2">
                <input class="button-save bg-dark text-white" id="buttonNewImage" type="Submit" value="Adicionar Arquivo">
                <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
                    {{ csrf_field() }}
                    <input type="file" name='file' id="newImage" hidden>
                    <input type="number" name='newsId' value="{{ $id }}" hidden>
                </form>
            </div>
            <div class="row pt-2" id="images">
            </div>
            <br>
        </div>
        <div class="w-md-50 bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
            <div class="text-center">
                <h2 class="display-5">Visualização</h2>
            </div>
            <div 
                class="bg-white box-shadow mx-auto" 
                style="width: 100%; height:auto; border-radius: 2px 2px 2px 2px;"
            >
                @newsTitle([
                    'title' => "",
                    'subtitle' => "",
                    'date' => "19/12/2018",
                    'time' => "08h44",
                    'lastUpdated' => "Atualizado há uma hora"
                ])
                @endnewsTitle
                <img src="" id="image" class="w-80 mx-auto d-block">
                <div class="markdown-body">
                </div>
            </div>
            <br>
        </div>
    </div>
    @endif
    <script type="text/javascript">
        window.onload = function () {
            function replaceAll(text, needle, replacement){
                return text.split(needle).join(replacement)
            }
            function convertToEndOfLine(text){
                newText = replaceAll( text, '<br>', '' )
                newText = replaceAll( newText, '<div>', '\n\n' )
                newText = replaceAll( newText, '</div>', '' )
                return newText
            }
            function removePreTag(){
                tagsPre = $('#text > pre')
                for(var index = 0; index < tagsPre.length; index++){
                    pre = tagsPre[index]
                    text = pre.textContent
                    pre.replaceWith(text)
                }
            }
            function removeFontTag(){
                tagsPre = $('#text > font')
                for(var index = 0; index < tagsPre.length; index++){
                    pre = tagsPre[index]
                    text = pre.textContent
                    pre.replaceWith(text)
                }
            }
            function removeSpanTag(){
                tagsPre = $('#text > span')
                for(var index = 0; index < tagsPre.length; index++){
                    pre = tagsPre[index]
                    text = pre.textContent
                    pre.replaceWith(text)
                }
            }
            $(document).ready(function() {
                $('#text').on("DOMSubtreeModified", function(e) {
                    var markdown = convertToEndOfLine($( this ).html())
                    removePreTag()
                    removeFontTag()
                    removeSpanTag()
                    console.log(markdown)
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
                            //console.log(result.responseText)
                        }
                    })
                })
                $('#inputTitle').on('keyup', function (){
                    var title = $( this ).val()
                    $('#title').text( title )
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
                                var json = JSON.parse(response.responseText)
                                console.log(json)
                                switch(json.type){
                                    case 'IMAGE':
                                        $('#images').append(`
                                            <div class="card col-md-4 bg-dark border-0">
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
                                            <div class="card col-md-4 bg-dark border-0">
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

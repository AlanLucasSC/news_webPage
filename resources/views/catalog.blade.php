@main

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        @if( Auth::user()->role === 'admin' )
            <div class="col-md-6 mb-2">
                <table class="table table-hover">
                    <thead class="">
                        <tr>
                            <th><h4>Anuncioss</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $catalog as $ads )
                            @php
                                $image = App\File::find($ads->file_id);
                            @endphp
                            <tr> 
                                <td>
                                    <figure class="text-center">
                                        <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="width: 100%;" /> 
                                        <figcaption>{{ $ads->url }}<figcaption>
                                        <figcaption>{{ $category->name }}<figcaption>
                                    </figure>
                                    @if( Auth::user()->role === 'admin' )
                                        <a href="{{ route('advertising.delete', $ads->id) }}">
                                            <span class="float-right">
                                                <span style="color: #bb2211;">
                                                    <i class="fas fa-trash fa-lg"></i>
                                                </span>
                                            </span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        @endif

        <div class="col-md-6 mb-2">
            <h3>Cadastrar anuncio</h3>
            
            <form 
                action="{{ route('catalog.store') }}" 
                id="form" 
                enctype="multipart/form-data"
                role="form" 
                method="POST"  
                class="form-row my-4"
            >
                {{ csrf_field() }}

                <div class="form-group col-md-12">
                    <label for="newCatalog">Novo anuncio</label>
                    <input name="url" class="form-control" id="newCatalog" placeholder="Insira a url onde deseja ser redirecionado o anuncio">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="contact">Seu contato</label>
                    <input name="contact" class="form-control" id="contact" placeholder="Onde os interessados podem te contactar?">
                </div>

                <div class="form-group col-md-12">
                    <label for="name">Nome do anuncio</label>
                    <input name="name" class="form-control" id="name" placeholder="Digite o nome do que deseja anunciar">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="description">Descriçao</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="digite um paragrafo sobre o que deseja anunciar">
                    </textarea>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputImage">Imagem do anuncio</label>
                    <input type="file" name="image" class="form-control-file" id="inputImage">
                </div>

                <div class="form-group col-md-12 pt-3 pb-3 text-right">
                    <input class="btn btn-success" type="Submit" value="Salvar">
                </div>
            </form>                    
        </div>
    </div>
</div>

@endmain
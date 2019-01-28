@main

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        @if( Auth::user()->role === 'admin' )
            <div class="col-md-6 mb-2">
                <table class="table table-hover">
                    <thead class="">
                        <tr>
                            <th><h4>Anuncios</h4></th>
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
                                        @if( isset($image) )
                                            <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="width: 100%;" />
                                        @endif 
                                        <figcaption>{{ $ads->url }}<figcaption>
                                    </figure>
                                    @if( Auth::user()->role === 'admin' )
                                        <a href="{{ route('catalog.delete', $ads->id) }}">
                                            <span class="float-right">
                                                <span style="color: #bb2211;">
                                                    <i class="fas fa-trash fa-lg"></i>
                                                </span>
                                            </span>
                                        </a>
                                    @endif
                                    @if( Auth::user()->role === 'admin' )
                                        <a href="{{ route('catalog.edit', $ads->id) }}" class="mx-2">
                                            <span class="m-2">
                                                <span style="color: #008582;">
                                                    <i class="fas fa-edit fa-lg"></i>
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
                action="{{ isset($id) ? route('catalog.update', $id) : route('catalog.store') }}" 
                id="form" 
                enctype="multipart/form-data"
                role="form" 
                method="POST"  
                class="form-row my-4"
            >
                {{ csrf_field() }}
                @if( isset($id) )
                    <input name="_method" type="hidden" value="PUT">
                @endif

                <div class="form-group col-md-12">
                        <label for="name">Nome do anuncio</label>
                        <input name="name" class="form-control" id="name" value="{{ $ad->name ?? '' }}" placeholder="Digite o nome do que deseja anunciar">
                    </div>

                <div class="form-group col-md-12">
                    <label for="newCatalog">Link do anuncio</label>
                    <input name="url" class="form-control" id="newCatalog" value="{{ $ad->url ?? '' }}" placeholder="Insira a url onde deseja ser redirecionado o anuncio">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="contact">Seu contato</label>
                    <input name="contact" class="form-control" id="contact" value="{{ $ad->contact ?? '' }}" placeholder="Onde os interessados podem te contactar?">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="description">Descriçao</label>
                    <textarea name="description" class="form-control text-left" id="description" rows="3">
                        {{ $ad->description ?? '' }}
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
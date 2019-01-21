@main

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        
        <div class="col-md-6 mb-2">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th><h4>Propagandas</h4></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $ads as $ad )
                        <?php 
                            $image = App\File::find($ad->file_id);
                            $category = App\AdvertisingCategory::find($ad->category_id);
                        ?>
                        <tr> 
                            <td>
                                <figure class="text-center">
                                    <img src="{{ URL::to('/') . '/files/' . $image->name }}" style="width: 100%;" /> 
                                    <figcaption>{{ $ad->url }}<figcaption>
                                    <figcaption>{{ $category->name }}<figcaption>
                                </figure>
                                @if( Auth::user()->role === 'admin' )
                                    <a href="{{ route('advertising.delete', $ad->id) }}">
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
        <div class="col-md-6 mb-2">
            <h3>Cadastrar nova propaganda</h3>
            
            <form 
                action="{{ route('advertising.store') }}" 
                id="form" 
                enctype="multipart/form-data"
                role="form" 
                method="POST"  
                class="form-row my-4"
            >
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <label for="newAdvertising">Nova propaganda</label>
                    <input name="url" class="form-control" id="newAdvertising" placeholder="Insira a url onde deseja ser redirecionado a propaganda">
                </div>
                <div class="form-group col-md-12">
                    <label for="newAdvertising">Categoria</label>
                    <select class="form-control" name="category" id="inputCategory" required>
                        @foreach($categories as $category)
                            <option 
                                value="{{ $category->id }}"
                            > {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="inputImage">Imagem da propaganda</label>
                    <input type="file" name="image" class="form-control-file" id="inputImage" required>
                </div>
                <div class="form-group col-md-12 pt-3 pb-3 text-right">
                    <input class="btn btn-success" type="Submit" value="Salvar">
                </div>
            </form>                    
        </div>
    </div>
</div>

@endmain
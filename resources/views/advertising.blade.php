@main

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        
        <div class="col-md-6 mb-2">
            <table class="table table-hover">
                <thead class="table-info">
                    <tr>
                        <th><h4>Propagandas</h4></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $ads as $ad )
                        <tr> 
                            <td>
                                <figure class="text-center mx-auto">
                                    <img src="{{ $ad->url }}" class="mx-auto d-block" /> 
                                    <figcaption>{{ $ad->name }}<figcaption>
                                </figure>

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
                role="form" 
                method="POST"  
                class="form-row my-4"
            >
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <label for="newAdvertising">Nova propaganda</label>
                    <input name="Advertising" class="form-control" id="newAdvertising" placeholder="Insira um nome para propaganda">
                </div>
                <div class="form-group col-md-12">
                    
                    <label for="inputImage">Imagem da noticia</label>
                    <input type="file" name="image" class="form-control-file" id="inputImage">
                </div>
            </form>                    
        </div>
    </div>
</div>

@endmain
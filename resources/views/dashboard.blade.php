@main
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-9 mb-2">
            
            <h2>Bem Vindo!</h2>
                
        </div>
        <div class="col-md-4 mb-2">
            <table class="table table-hover">
                <thead class="table-info">
                    <tr>
                        <th><h4>Categorias</h4></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $categories as $category )
                        <tr> 
                            <td>
                                {{ $category->name }} 
                                @if( Auth::id() == 1 )
                                    <a href="{{ route('category.delete', $category->id) }}">
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
                    <tr>
                        <td>
                            <form 
                                action="{{ route('category.store') }}" 
                                id="form" 
                                role="form" 
                                method="POST"  
                                class="row my-4"
                            >
                                {{ csrf_field() }}
                                <div class="form-group col-md-12">
                                    <label for="newCategory">Nova categoria</label>
                                    <input name="category" class="form-control" id="newCategory" placeholder="Insira uma nova categoria">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-success" id="buttonNewCategory" type="Submit">Adicionar Categoria</button>
                                </div>
                            </form>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-7 mb-2 w-100">
            <table class="table table-hover container-fluid">
                
                <tr class="table-info row ">
                    <th>
                        <h4>Suas noticias</h4>
                    </th>
                    
                </tr>
            
                @foreach($newsList as $news)
                    <tr id="{{ $news->id }}" class="row">
                        <td class="col-lg-2">
                            <div style="width: 100px;">
                                <img class="mx-auto" style="display: block; width: 100%; height: auto;" src="{{ URL::to('/') . '/files/' . $news->nameImage }}" alt="Card image cap">
                            </div>
                        </td>
                        <td class="col-lg-8">
                            <h5>{{ $news->title }}</h5>
                            <p>{{ $news->subtitle }}</p>
                        </td>
                        <td class="col-lg-2">                      
                            <a href="{{ route('news.delete', $news->id) }}" class="mx-2">
                                <span class="m-2">
                                    <span style="color: #bb2211;">
                                        <i class="fas fa-trash fa-2x"></i>
                                    </span>
                                </span>
                            </a>
                            <a href="{{ route('news.edit', $news->id) }}" class="mx-2">
                                <span class="m-2">
                                    <span style="color: #008582;">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </span>
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                   
                
            </table>
        
        </div>
    </div>
</div>
@endmain
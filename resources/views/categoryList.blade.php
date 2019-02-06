@main 
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-7 mb-2">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th><h4>Categorias</h4></th>
                    </tr>
                </thead>
                <tbody>

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
                    @foreach( $categories as $category )
                        <tr> 
                            <td>
                                {{ $category->name }} 
                                @if( Auth::user()->role === 'admin' )
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
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endmain
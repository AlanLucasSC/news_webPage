@main
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-9 mb-2">
            <div class="card">
                <div class="card-body">
                    Bem Vindo!
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">Categorias</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach( $categories as $category )
                            <li class="list-group-item"> 
                                {{ $category->name }} 
                                <a href="{{ route('category.delete', $category->id) }}" class="badge badge-danger">excluir</a>
                            </li>
                        @endforeach
                        <li class="list-group-item">
                            <form 
                                action="{{ route('category.store') }}" 
                                id="form" 
                                role="form" 
                                method="POST"  
                                class="row"
                            >
                                {{ csrf_field() }}
                                <div class="form-group col-md-12">
                                    <label for="newCategory">Nova categoria</label>
                                    <input type="text" name="category" class="form-control" id="newCategory" placeholder="Insira uma nova categoria">
                                </div>
                                <div class="col-md-4">
                                    <input class="button-save bg-dark text-white" id="buttonNewCategory" type="Submit" value="Adicionar Categoria">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7 mb-2">
            <div class="card">
                <div class="card-header">Suas Notícias</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <h5>
                                <a href="{{ route('news.create') }}" class="badge badge-secondary">nova notícia</a>
                            </h5>
                        </div>
                        @foreach($newsList as $news)
                            <div class="col-md-6 mb-2" id="{{ $news->id }}">
                                <div class="card justify-content-center">
                                    <img class="card-img-top" src="{{ URL::to('/') . '/files/' . $news->nameImage }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $news->title }}</h5>
                                        <p class="card-text"> {{ $news->subtitle }} </p>
                                        <a href="{{ route('news.edit', $news->id) }}" class="badge badge-info">editar</a>
                                        <a href="{{ route('news.delete', $news->id) }}" class="badge badge-danger">excluir</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endmain
@main 
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-7 mb-2">
            <table class="table table-hover">
                <thead >
                    <tr>
                        <th><h4>Suas noticias</h4></th>
                        <th><a class="btn btn-sm btn-success" href="{{ route('news.create') }}" role="button">Nova notícia</a>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newsList as $news)
                        <tr id="{{ $news->id }}">
                            <td>
                                <div>
                                    <img class="card-img-top" src="{{ URL::to('/') . '/files/' . $news->nameImage }}" alt="Card image cap">
                                </div>
                            <td>
                            <td>
                                <div>
                                    <h5>{{ $news->title }}</h5>
                                    <p> {{ $news->subtitle }} </p>
                                </div>
                            <td>
                            <td>                      
                                <a href="{{ route('news.delete', $news->id) }}" class="mx-2">
                                    <span class="m-2">
                                        <span style="color: #bb2211;">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </span>
                                    </span>
                                </a>
                                <a href="{{ route('news.edit', $news->id) }}" class="mx-2">
                                    <span class="m-2">
                                        <span style="color: #008582;">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </span>
                                    </span>
                                </a>
                            <td>
                        </tr>
                    @endforeach
                    
                   
                
            </table>
        
        </div>
    </div>
</div>
@endmain
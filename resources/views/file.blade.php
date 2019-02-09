@main
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h4>Arquivos</h4>
        </div>

        <div class="col-md-7 mb-2">
            <div class="form-group">
                <label for="search">Nome do Arquivo</label>
                <input type="text" class="form-control" id="search" aria-describedby="fileHelp" placeholder="Nome do arquivo">
                <small id="emailHelp" class="form-text text-muted">Insira o nome de um arquivo para poder ser pesquisado.</small>
            </div>

            <a class="btn btn-sm btn-success" id="linkSearch" href="{{ route('fileCatalog') }}" role="button">Pesquisar</a>
        </div>

        <div class="col-md-10 mb-2 mt-2">
            <div class="row justify-content-center">
                @foreach($files as $file)
                    @if( $file->type === 'IMAGE' )
                        <div class="card col-md-3 col-sm-6 bg-white border-0">
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
        </div>
    </div>
    {{ $pagination->appends(['search' => $search])->links() }}
</div>
<script type="text/javascript">
    window.onload = function () {
        $('#search').on('keyup', function (){
            $('#linkSearch').attr('href', "{{ route('fileCatalog') }}?search="+$(this).val())
        })
    }
</script>
@endmain
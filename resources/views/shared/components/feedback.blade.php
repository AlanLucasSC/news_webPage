@isset($feedback)
    <div class="alert alert-danger mx-auto w-50 mt-2 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <span>{{ $feedback }}</span>
    </div>
@endisset
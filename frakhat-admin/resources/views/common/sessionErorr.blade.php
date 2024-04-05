@if (Session::has('error'))
    <div class="flash alert alert-danger" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @if(is_array(Session::get('error')))
            @foreach(Session::get('error') as $error)
                <p>{{ $error }}</p>
            @endforeach
        @else
            <p>{{ htmlspecialchars(Session::get('error')) }}</p>
        @endif

    </div>
@endif

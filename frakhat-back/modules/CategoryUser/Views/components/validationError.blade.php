@if($errors->has($data))
    <p class="text-danger text-right">
        {{$errors->first($data)}}
    </p>
@endif

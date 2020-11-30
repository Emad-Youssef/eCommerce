@if(Session::has('success'))
    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
            id="type-error">
        {{Session::get('success')}}
    </button>
@endif
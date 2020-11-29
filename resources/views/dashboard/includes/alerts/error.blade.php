@if(Session::has('error'))
    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
            id="type-error">
        {{Session::get('error')}}
    </button>
@endif

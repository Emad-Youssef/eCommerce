
<div class="btn-group">
    <button type="button" class="btn btn-info"><i class="la la-cogs"></i></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; right: -38px; will-change: transform;">
    <a href="{{route('admin.admins.edit',$id)}}" class="dropdown-item btn btn-outline-primary"><i class="la la-edit"></i> @lang('site.edit')</a>
        <form data-action="{{route('admin.admins.destroy',$id)}}" class="form-delete" method="post">
            @csrf

            <button class="dropdown-item btn btn-outline-danger "><i class="la la-trash"></i> @lang('site.delete')</button>
        </form>
    </div>

</div>
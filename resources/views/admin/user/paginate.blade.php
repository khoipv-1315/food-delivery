<div class="x_content">                    
    <div class="row">
        <div class="col-sm-6">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{ trans('admin_user.create') }}</a>
        </div>
        <div class="col-sm-6">
            <div id="datatable_filter" class="dataTables_filter">
                <label><input type="search" class="form-control input-sm" placeholder="Search" aria-controls="datatable"></label>
            </div>
        </div>
    </div>                    
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>{{ trans('admin_user.name') }}</th>
                <th>{{ trans('admin_user.email') }}</th>
                <th>{{ trans('admin_user.avatar') }}</th>
                <th>{{ trans('admin_user.phone') }}</th>
                <th>{{ trans('admin_user.address') }}</th>
                <th>{{ trans('admin_user.role') }}</th>
                <th></th>
                <th></th>
            </tr>
        </thead>                        
        <tbody>
            @if ($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ $user['avatar'] }}" width="60" height="60"></td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role  }}</td>
                        <td>
                            {!! Form::open([
                                'route' => ['admin.user.edit', $user['id']], 
                                'method' => 'get', 
                                'id' => 'form-edit'
                            ]) !!}
                            {!! Form::button('Edit', [
                                'type'=>'submit',
                                'class' => 'btn btn-warning fa fa-edit'
                            ]) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::open([
                                'route' => ['admin.user.destroy', $user['id']], 
                                'method' => 'delete', 
                                'id' => 'form-delete'
                            ]) !!}
                            {!! Form::button('Delete', [
                                'type'=>'submit',
                                'class' => 'btn btn-danger fa fa-trash'
                            ]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>     
                @endforeach
            @endif                           
        </tbody>                                   
    </table>
    {{ $users->links() }}
</div>
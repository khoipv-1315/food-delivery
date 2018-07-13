@extends("admin.layouts.master")
@section('title')
    {{ trans('admin_user.List User') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{ trans('admin_user.List User') }} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{ trans('admin_user.create') }}</a>
                        </div>
                        <div class="col-sm-6">
                            <div id="datatable_filter" class="dataTables_filter">
                                <label><input type="text" id="search_user" class="form-control input-sm" placeholder="Search" aria-controls="datatable"></label>
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
                                        @if ($user->role === 'admin')
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
                                        @else
                                            <td>
                                                {!! Form::button('Edit', [
                                                    'type'=>'submit',
                                                    'class' => 'btn btn-warning fa fa-edit disabled'
                                                ]) !!}
                                            </td>
                                        @endif
                                        <td>
                                            {!! Form::open([
                                                'route' => ['admin.user.destroy', $user['id']], 
                                                'method' => 'delete', 
                                                'id' => 'form-delete',
                                                'onsubmit' => 'if(CheckForm() == false) return false'
                                            ]) !!}
                                            {!! Form::button('Delete', [
                                                'type'=>'submit',
                                                'class' => 'btn btn-danger fa fa-trash',
                                                'id' => 'btn-delete'
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
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- {{ Html::script('js/admin.js') }} --}}
    {{ Html::script('js/search-user.js') }}
@endpush

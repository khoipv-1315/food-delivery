<div class="x_content">
    <div class="row">
        <div class="col-sm-6">
            <a href="{{ route('admin.order.create') }}" class="btn btn-primary">{{ trans('admin_order.create') }}</a>
        </div>
        <div class="col-sm-6">
            <div id="datatable_filter" class="dataTables_filter">
                <label>
                    <input type="search" class="form-control input-sm" placeholder="{{ trans('admin_order.Search') }}" aria-controls="datatable">
                </label>
            </div>
        </div>
    </div>                    
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>{{ trans('admin_order.name') }}</th>
                <th>{{ trans('admin_order.email') }}</th>
                <th>{{ trans('admin_order.total price (vnd)') }}</th>
                <th>{{ trans('admin_order.status') }}</th>
                <th>{{ trans('admin_order.description') }}</th>
                <th>{{ trans('admin_order.create date') }}</th>
                <th>{{ trans('admin_order.update date') }}</th>
                <th></th>
                <th></th>
            </tr>
        </thead>                        
        <tbody>
            @if ($orders)
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->user->user_id }}</td>
                        <td>{{ $order->user->user_id }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->status == 1 ? trans('admin_order.activate') : trans('admin_order.pending') }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->create_at }}</td>
                        <td>{{ $order->update_at }}</td>
                        <td>
                            {!! Form::open([
                                'route' => ['admin.order.edit', $order['id']], 
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
                                'route' => ['admin.order.destroy', $order['id']], 
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
    {{ $orders->links() }}
</div>

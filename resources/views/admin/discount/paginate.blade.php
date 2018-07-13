<div class="x_content">
    <div class="row">
        <div class="col-sm-6">
            <a href="{{ route('admin.discount.create') }}" class="btn btn-primary">{{ trans('admin_discount.create') }}</a>
        </div>
        <div class="col-sm-6">
            <div id="datatable_filter" class="dataTables_filter">
                <label>
                    <input type="search" class="form-control input-sm" placeholder="{{ trans('admin_discount.Search') }}" aria-controls="datatable">
                </label>
            </div>
        </div>
    </div>                    
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>{{ trans('admin_discount.discount') }}</th>
                <th>{{ trans('admin_discount.start date') }}</th>
                <th>{{ trans('admin_discount.end date') }}</th>
                <th></th>
                <th></th>
            </tr>
        </thead>                        
        <tbody>
            @if ($discounts)
                @foreach($discounts as $discount)
                    <tr>
                        <td>{{ $discount->discount }}%</td>
                        <td>{{ $discount->start_date }}</td>
                        <td>{{ $discount->end_date }}</td>
                        <td>
                            {!! Form::open([
                                'route' => ['admin.discount.edit', $discount['id']], 
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
                                'route' => ['admin.discount.destroy', $discount['id']], 
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
    {!! $discounts->link() !!}
</div>
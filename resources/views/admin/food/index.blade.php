@extends('admin.layouts.master')
@section('title')
	{{ trans('admin_food.List food') }}
@endsection
@section('content')
	<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{ trans('admin_food.List food') }} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                @include('admin.layouts.common')

                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('admin.food.create') }}" class="btn btn-primary">{{ trans('admin_food.create') }}</a>
                        </div>
                        <div class="col-sm-6">
                            <div id="datatable_filter" class="dataTables_filter">
                                <label>
                                    <input type="text" id="search_food" class="form-control input-sm" placeholder="{{ trans('admin_food.Search') }}" aria-controls="datatable">
                                </label>
                            </div>
                        </div>
                    </div>                    
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('admin_food.name') }}</th>
                                <th>{{ trans('admin_food.image') }}</th>
                                <th>{{ trans('admin_food.discount') }}</th>
                                <th>{{ trans('admin_food.price (vnd)') }}</th>
                                <th>{{ trans('admin_food.status') }}</th>
                                <th>{{ trans('admin_food.description') }}</th>
                                <th>{{ trans('admin_food.top') }}</th>
                                <th>{{ trans('admin_food.category') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>                        
                        <tbody>
                            @if ($foods)
                                @foreach($foods as $food)
                                    <tr>
                                        <td>{{ $food->name }}</td>
                                        <td><img src="{{ $food->image }}" class="img-rounded" alt="none" style="width: 60px; height: 60px;"></td>
                                        <td>{{ $food->discountFood->discount }}</td>
                                        <td>{{ number_format($food->price) }}</td>
                                        <td>{{ $food->status == 1 ? trans('admin_food.activate') : trans('admin_food.pending') }}</td>
                                        <td>{{ str_limit($food->description, config('customer.product.description')) }}</td>
                                        <td>{{ $food->is_top == 1 ? trans('admin_food.yes') : trans('admin_food.no') }}</td>
                                        <td>{{ $food->category->name }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['admin.food.edit', $food['id']], 
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
                                                'route' => ['admin.food.destroy', $food['id']], 
                                                'method' => 'delete', 
                                                'id' => 'form-delete',
                                                'class' => 'warning',
                                                'onsubmit' => 'if(CheckForm() == false) return false'
                                            ]) !!}
                                            {!! Form::button('Delete', [
                                                'type'=>'submit',
                                                'class' => 'btn btn-danger fa fa-trash delete',
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>                             
                                @endforeach
                            @endif
                        </tbody>        
                    </table>
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ Html::script('js/search-food.js') }}
@endpush

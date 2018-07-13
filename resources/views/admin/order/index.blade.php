@extends('admin.layouts.master')
@section('title')
    {{ trans('admin_order.List order') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{ trans('admin_order.List order') }} </h2>
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
                                <th>{{ trans('admin_order.address') }}</th>
                                <th>{{ trans('admin_order.phone') }}</th>
                                <th>{{ trans('admin_order.total price (vnd)') }}</th>
                                <th>{{ trans('admin_order.status') }}</th>
                                <th>{{ trans('admin_order.description') }}</th>
                                <th>{{ trans('admin_order.date') }}</th>
                                <th></th>
                            </tr>
                        </thead>                        
                        <tbody>
                            @if ($orders)
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ $order->user->address }}</td>
                                        <td>{{ $order->user->phone }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>@if ($order->status == config('customer.order.pending'))
                                                {{ trans('admin_order.pending') }}
                                            @elseif ($order->status == config('customer.order.confirmed'))
                                                {{ trans('admin_order.confirmed') }}
                                            @elseif ($order->status == config('customer.order.delivery'))
                                                {{ trans('admin_order.delivery') }}
                                            @elseif ($order->status == config('customer.order.done'))
                                                {{ trans('admin_order.done') }}
                                            @else
                                                {{ trans('admin_order.canceled') }}
                                            @endif
                                        </td>
                                        <td>{{ $order->description }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['admin.order.detailOrder', $order->id], 
                                                'method' => 'get', 
                                                'id' => 'form-edit'
                                            ]) !!}
                                            {!! Form::button('Detail', [
                                                'type'=>'submit',
                                                'class' => 'btn btn-primary fa fa-info-circle'
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
            </div>
        </div>
    </div>
@endsection


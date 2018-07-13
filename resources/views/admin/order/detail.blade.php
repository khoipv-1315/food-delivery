@extends('admin.layouts.master')
@section('title')
    {{ trans('admin_order.order_detail') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{ trans('admin_order.order_detail') }} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content">                    
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            	<th>{{ trans('admin_order.food') }}</th>
                                <th>{{ trans('admin_order.quantity') }}</th>
                                <th>{{ trans('admin_order.price') }}</th>                               
                            </tr>
                        </thead>                        
                        <tbody>
                            @if ($orders)
                                @foreach($orders->foodOrders as $order)
                                    <tr>                                        
                                        <td>{{ $order->food->name }}</td> 
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ number_format($order->price) }}đ</td>                      
                                    </tr>                      
                                @endforeach
                            @endif                            
                        </tbody>        
                    </table>                        
                </div>
                <div class="col-md-4">
                    {!! Form::open([
                        'route' => ['admin.order.update', $orders['id']], 
                        'method' => 'PUT', 
                        'enctype' => 'multipart/form-data',
                        'class' => 'form-group'
                    ]) !!}
                    {!! Form::select('status', [
                        '0' => trans('admin_order.pending'),
                        '1' => trans('admin_order.confirmed'),
                        '2' => trans('admin_order.shipped'),
                        '3' => trans('admin_order.done'),
                        '4' => trans('admin_order.canceled'),
                    ], $value = $orders['status'])
                    !!}
                    {!! Form::button('Update', [
                        'type'=>'submit',
                        'class' => 'btn btn-success fa fa-check'
                    ]) !!}
                    {!! Form::close() !!}                   
                </div>
                <div class="col-md-3">
                    {!! Form::open([
                        'route' => ['admin.order.destroy', $orders->id], 
                        'method' => 'delete', 
                        'id' => 'form-delete',
                        'onsubmit' => 'if(CheckForm() == false) return false'
                    ]) !!}
                    {!! Form::button('Delete', [
                        'type'=>'submit',
                        'class' => 'btn btn-danger fa fa-trash'
                    ]) !!}
                    {!! Form::close() !!}
                </div>
                <div>
                    <button type="button" class="btn btn-info fa fa-print" data-toggle="modal" data-target="#print-modal">{{ trans('admin_order.print') }}</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.order.print')
@endsection
@push('style')
    <link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
    {{-- {{ Html::style('css/print.css') }} --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#printableArea').printPage();
        // });
        // function printDiv(printableArea) {
        //      var printContents = document.getElementById(printableArea).innerHTML;
        //      var originalContents = document.body.innerHTML;

        //      document.body.innerHTML = printContents;

        //      window.print();

        //      document.body.innerHTML = originalContents;
        // }
        $('button#printf').off('click.print').on('click.print', function(e){
            e.preventDefault();
            printElement(document.getElementById("printableArea11111"));
            $('#printSection').addClass('hidden');
        });
        // document.getElementById("printf").onclick = function (e) {
            
            
        //     // var modThis = document.querySelector("#printSection .modifyMe");
        //     // modThis.appendChild(document.createTextNode(" new"));
            
        //     // window.print();
        // }

        function printElement (elem) {
            $('#printSection').removeClass('hidden');
            var domClone = elem.cloneNode(true);
            var printHeader = document.getElementById('print_header');
            var divHeader = document.createElement('div');
            var divRowHeader = document.createElement('div');
            var printSection = document.getElementById('printSection');
            // var header = printHeader.cloneNode(true);

            divRowHeader.classList.add('row');
            divHeader.classList.add('col-sm-12');
            divHeader.classList.add('text-center');

            if (!printSection) {
              printSection = document.createElement('div');
              printSection.id = 'printSection';
              document.body.appendChild(printSection);
            }

            printSection.innerHTML = '';
            printSection.classList.add('container');
            // divHeader.appendChild(header);
            divRowHeader.appendChild(divHeader);
            printSection.appendChild(divRowHeader);
            printSection.appendChild(domClone);
            print();
            // printSection.classList.add('hidden');

          }

        function CheckForm(){
            r = confirm("Ban co muon xoa khong?");
            if(r == false) return false;
            else return true;                               
        }
    </script>
@endpush

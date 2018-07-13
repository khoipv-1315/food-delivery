@extends('layouts.master')
@section('title','Chi tiết đơn hàng')
@section('content')
<section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="/" ><span itemprop="title">{{ trans('master.home') }}</span></a>                        
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li><strong itemprop="title">{{ trans('master.cart') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="wrap_border col-lg-12">
            <span class="bordered"></span>
        </div>
    </div>
</div>
<section class="main-cart-page main-container col1-layout">
    <div class="main container hidden-xs">
        <h1 class="title-head-login"><a href="#">{{ trans('master.cart') }}</a></h1>
        <div class="col-main cart_desktop_page cart-page">
            <div class="cart page_cart cart_des_page hidden-xs-down">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pd-right cart_desktop ">
                    <div class="bg-scroll">
                        <div class="cart-thead">
                            <div class="a-center" style="width: 35%"><span>{{ trans('master.product') }}</span></div>
                            <div style="width: 20%" class="a-center"><span class="nobr">{{ trans('master.price') }}</span></div>
                            <div style="width: 14%" class="a-center">{{ trans('master.quantity') }}</div>
                        </div>
                        <div class="cart-tbody">
                            @foreach($order->foodOrders as $food_order)
                                <div class="item-cart ">
                                    <div class="content_" style="width: 15%"><a class="product-image" title="{{ $food_order->food->name }}" href="{{ route('food', $food_order->food->id) }}"><img alt="{{ $food_order->food->name }}" src="{{ $food_order->food->image }}" width="75" height="auto"></a></div>
                                    <div class="content_ content_s" style="width: 20%">
                                        <h3 class="product-name"> <a class="text2line" href="{{ route('food', $food_order->food->id) }}">{{ $food_order->food->name }}</a> </h3>
                                    </div>
                                    <div style="width: 20%" class="a-center"><span class="item-price"> <span class="price bold-price">{{ \App\Helpers\Helper::showPrice($food_order->food) }}{{ trans('master.unit') }}</span></span></div>
                                    <div style="width: 14%" class="a-center">
                                        <form method="post" action="#">
                                            {{ csrf_field() }}
                                            <div class="input_qty_pr">{{ $food_order->quantity }}</div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="btn_bottom" style="background-color: #52ba9a"><i class="fa fa-print"></i>
                            <a href="#printf" title="{{ trans('master.print') }}"><span>{{ trans('master.print') }}</span></a>
                        </div>
                        <div class="btn_bottom" style="background-color: #fcc630">
                            <a href="{{ route('order') }}" title="{{ trans('master.back') }}"><span>{{ trans('master.back') }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{ Html::script('js/check_email.js') }}
<link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
@if (session()->has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif
<script>
    $('a[href="#printf"]').off('click.print').on('click.print', function(e){
        e.preventDefault();
        printElement(document.getElementById("printableArea11111"));
        $('#printSection').addClass('hidden');
    });

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
</script>
@endsection
@push('style')
    <link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
@endpush
@push('scripts')
    
@endpush

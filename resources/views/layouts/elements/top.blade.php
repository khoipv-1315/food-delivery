<div class="header_top">
    <div class="topbar_wrap">
        <div class="container">
            <div class="row">
                <div class="head_content col-lg-12 col-md-12 col-sm-12">
                    <div class="menu-bar hidden-md hidden-lg">
                        <img src='http://bizweb.dktcdn.net/100/244/304/themes/577104/assets/menu-bar.png?1509501415605' alt='menu bar' /> 
                    </div>
                    <div class="logo_top">                              
                        <a href="{{ route('index') }}" class="logo-wrapper">                   
                        {{-- <img src=" {{ asset('images/bepmeun.png') }}" alt="logo">                --}}
                        </a>                                    
                    </div>
                    <div class="header_top_cart left">
                        <div class="search-cart">
                            <div class="use_register hidden-xs">
                                <span class="use_ico_register"><i class="icon-user icons"></i></span>
                                <ul class="login_and_register">
                                    @if (Auth::guest())
                                        <li class="hidden-sm hidden-xs"><a href="{{ route('getLogin') }}"  title="{{ trans('master.login') }}">{{ trans('master.login') }}</a></li>
                                        <li class="hidden-sm hidden-xs"><a href="{{ route('getRegister') }}"  title="{{ trans('master.register') }}">{{ trans('master.register')}}</a></li>
                                    @else
                                        @if (Auth::user()->role != config('customer.user.default_role'))
                                            <li class="hidden-sm hidden-xs"><a href="{{ route('admin.home') }}">{{ trans('master.dashboard') }}</a></li>
                                        @endif                                  
                                        <li class="hidden-sm hidden-xs"><a href="{{ route('showProfile') }}">{{ trans('master.profile') }}</a></li>
                                        <li class="hidden-sm hidden-xs"><a href="{{ route('order') }}">{{ trans('master.order')}}</a></li>
                                        <li class="hidden-sm hidden-xs"><a href="{{ route('logout') }}">{{ trans('master.logout')}}</a></li>
                                    @endif    
                                </ul>
                            </div>
                            <div class="searching">
                                <div class="header_search search_form ">
                                    <form class="input-group search-bar search_form" action="" method="post" role="search" id="search-form">   
                                        {{ csrf_field() }}   
                                        <span class="input-group-btn">
                                        <button class="btn icon-fallback-text">
                                        <i class="icon-magnifier icons"></i>
                                        </button>
                                        </span>
                                        <input type="search" name="query" value="" placeholder="Find Food Or Price" class="input-group-field st-default-search-input search-text" autocomplete="off" id="search-input">            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header_top_cart right">
                        <div class="search_cart">
                            <span class="phone_header hidden-sm hidden-xs"><i class="fa fa-phone" aria-hidden="true"></i> <a title="CallMe">{{ trans('master.myTelephone') }}</a></span>
                            <div class="top-cart-contain f-right hidden-sm hidden-xs">
                                <div class="mini-cart text-xs-center">
                                    <div class="heading-cart">
                                        <a href="{{ route('cart.index') }}">
                                        <span class="background_cart"><i class="icon-bag icons"></i></span>
                                        <span class="cart_num" id="cart-total"><span class="cartCount count_item_pr">{{ Cart::count() }}</span></span>
                                        </a>
                                    </div>
                                    <div class="top-cart-content">
                                        <ul id="cart-sidebar" class="mini-products-list count_li">
                                            @if (Cart::count() != 0)
                                            <ul class="list-item-cart">
                                                @foreach (Cart::content() as $item)
                                                <li class="item">
                                                    <div class="wrap_item">
                                                        <a class="product-image" href="{{ route('food', $item->id) }}" title="{{ $item->name }}"><img alt="{{ $item->name }}" src="{{ $item->options->image }}" width="80"></a>
                                                        <div class="detail-item">
                                                            <div class="product-details">
                                                                <span class="quaty item_quanty_count">{{ $item->qty }}</span><a href="{{ route('removeFromCart', $item->rowId) }}" title="{{ trans('master.delete') }}" class="remove-item-cart fa fa-times">&nbsp;</a>
                                                                <p class="product-name"> <a class="text2line" href="{{ route('food', $item->id) }}" title="{{ $item->name }}">{{ $item->name }}</a></p>
                                                            </div>
                                                            <div class="product-details-bottom"><span class="price">{{ number_format($item->subtotal) }}{{ trans('master.unit') }}</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="wrap_total">
                                                <div class="top-subtotal">{{ trans('master.total') }}: <span class="price">{{ Cart::total() }}{{ trans('master.unit') }}</span></div>
                                            </div>
                                            <div class="wrap_button">
                                                <div class="actions"><a href="{{ route('cart.index') }}" class="btn btn-gray btn-checkout"><span>{{ trans('master.confirmOrder') }}</span></a></div>
                                            </div>
                                            @else
                                            <div class="list-item-cart">{{ trans('master.emptyCart') }}</div>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

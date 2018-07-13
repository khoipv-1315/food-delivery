<div class="site_menu">
    <div class="container">
        <div class="row">
            <nav class="hidden-sm hidden-xs col-md-12 col-lg-12">
                <div class="menu_hed">
                    <span class="content_null_left"><span class="content_"></span></span>
                    <ul id="nav" class="nav">
                        <li class="nav-item active"><a class="nav-link" href="{{route('index')}}">{{ trans('master.home') }}</a></li>
                        <li class="nav-item nav-items ">
                            <a href="{{ route('category.index') }}" class="nav-link">{{ trans('master.menu') }} <i class="fa fa-caret-down" data-toggle="dropdown"></i></a>	
                            <ul class="dropdown-menu border-box">
                                @foreach ($categories as $category)
                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="{{ route('category.show',['id' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item "><a class="nav-link" href="{{ route('topFood') }}">{{ trans('master.special') }}</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{ route('discountFood') }}">{{ trans('master.discount') }}</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{ route('contact') }}">{{ trans('master.contact') }}</a></li>
                    </ul>
                    <span class="content_null_right"><span class="content_"></span></span>
                </div>
            </nav>
        </div>
    </div>
</div>

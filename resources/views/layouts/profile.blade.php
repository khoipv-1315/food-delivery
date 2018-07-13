@extends('layouts.master')
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
                    <li><strong itemprop="title">{{ trans('master.profilePage') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="signup page_customer_account margin-top-20">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
                <div id="parent" class="row">
                    <div id="a" class="col-xs-12 col-sm-12 col-lg-8 col-left-account">
                        <div class="page-title m992">
                            <h1 class="title-head"><a href="#">{{ trans('master.profile') }}</a></h1>
                        </div>
                        <div class="form-signup name-account m992">
                            <p><strong>{{ trans('master.hello') }}, <a href="#" style="color:#ffc601;"> {{ $user->name }}</a>&nbsp;!</strong></p>
                        </div>
                    </div>
                    <div id="b" class="col-xs-12 col-sm-12 col-lg-8 col-right-account">
                        <div class="page-title mx991">
                            <h1 class="title-head"><a href="#">{{ trans('master.profile') }}</a></h1>
                        </div>
                        <div class="form-signup body_right mx991">
                            <p><strong>{{ trans('master.hello') }}, <a href="#" style="color:#ffc601;"> {{ $user->name }}</a>&nbsp;!</strong></p>
                        </div>
                        <div class="block-account">
                            <div class="block-title-account">
                                <h5>{{ trans('master.myAccount') }}</h5>
                            </div>
                            <div class="block-content form-signup">
                                @if (isset($user->avatar))
                                    <img src="{{ $user->avatar }}" style="max-height: 300px; max-width: 200px;">
                                @endif
                                @if (isset($user->address))
                                    <p><i class="fa fa-home font-some" aria-hidden="true"></i>  <span>{{ trans('master.address') }}: {{ $user->address }}</span></p>
                                @endif
                                @if (isset($user->phone))
                                    <p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <span>{{ trans('master.phone') }}: {{ $user->phone }}</span></p>
                                @endif
                                    <p><i class="fa fa-envelope font-some" aria-hidden="true"></i> <span>{{ trans('master.email') }}: {{ $user->email }}</span></p>
                                    <p style="margin-top:20px;"><a href="{{ route('getProfile') }}" class="btn btn-bg full-width btn-lg btn-style article-readmore">{{ trans('master.editAccount') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

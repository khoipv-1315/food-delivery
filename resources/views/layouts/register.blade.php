@extends('layouts.master')
@section('content')
<section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home">
                        <a itemprop="url" href="{{ route('index') }}" ><span itemprop="title">{{ trans('master.home') }}</span></a>						
                        <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                    </li>
                    <li><strong itemprop="title">{{ trans('master.register') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h1 class="hidden title-head-login"><a href="#">{{ trans('master.register') }}</a></h1>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
            <div class="page-login wrap_page row">
                <div class="col-right col-lg-12 col-md-12 col-sm-12 col-xs-12" id="login">
                    <div class="wrap_lg">
                        <h4 class="title-head title-head-login"><span>{{ trans('master.register') }}</span></h4>
                        <form accept-charset='UTF-8' action='{{ route('postRegister') }}' id='customer_register' method='post'>
                        {{ csrf_field() }}
                        <div class="form-signup clearfix">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="{{	trans('master.username') }}" value="{{ old('name') }}" name="name" id="firstName"   required >
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                        	<strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <fieldset class="form-group">
                                        <input type="email" class="form-control form-control-lg" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="{{ trans('master.email') }}" value="{{ old('email') }}" name="email" id="email"  required="">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                        	<strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="password" class="form-control form-control-lg" placeholder="{{ trans('master.password') }}" name="password"  required >
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                        	<strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="password" class="form-control form-control-lg" placeholder="{{ trans('master.confirmPassword') }}" name="password_confirmation"  required >
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12 text-xs-left" style="padding: 0">
                                <button type="submit" value="Đăng ký" class="btn button-50 btn-50-blue">{{ trans('master.register') }}</button>
                                <span class="have_ac">{{ trans('master.hasAccount') }}<a href="{{ route('getLogin') }}"> {{ trans('master.here') }}</a></span>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

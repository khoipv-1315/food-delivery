@extends("admin.layouts.master")
@section('title')
    {{ trans('welcome') }}
@endsection

@section('content')
<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user-o"></i></div>
            <div class="count">
                @if(isset($userCount))
                    {{ $userCount }}
                @endif
            </div>
            <h3>{{ trans('Total Users') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-cutlery"></i></div>
            <div class="count">
                @if(isset($foodCount))
                    {{ $foodCount }}
                @endif
            </div>
            <h3>{{ trans('Total Foods') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
            <div class="count">
                {{ App\Models\Food::where('status', config('setup.pending'))->count() }}
            </div>
            <h3>{{ trans('Pending Foods') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-edit"></i></div>
            <div class="count">
                @if(isset($orderCount))
                    {{ $orderCount }}
                @endif
            </div>
            <h3>{{ trans('Today Orders') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-comments-o"></i></div>
            <div class="count">
                @if(isset($reviewCount))
                    {{ $reviewCount }}
                @endif
            </div>
            <h3>{{ trans('Today Reviews') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i></div>
            <div class="count">135
            </div>
            <h3>{{ trans('Today Nones') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i></div>
            <div class="count">179</div>
            <h3>{{ trans('Today Nones') }}</h3>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i></div>
            <div class="count">179</div>
            <h3>{{ trans('Today Nones') }}</h3>
        </div>
    </div>
</div>
@endsection

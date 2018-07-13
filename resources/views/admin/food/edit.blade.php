@extends('admin.layouts.master')
@section('title')
	{{ trans('Edit') }}
@endsection
@section('content')
	<section class="content-header">
        <h1>{{ trans('admin_food.edit food') }}</h1>
        <div class="">
            
            @include('admin.layouts.common')
            
            {!! Form::open(['route' => [
                'admin.food.update', $foods['id']], 
                'method' => 'PUT', 'enctype' => 'multipart/form-data'],
                ['class' => 'form-group'
            ]) !!}
            <table class="table">
                <tr>
                    <td>{!! Form::label('name', trans('admin_food.name')) !!}</td>
                    <td>{!! Form::text('name', $value = $foods['name'], ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('price', trans('admin_food.price')) !!}</td>
                    <td>{!! Form::number('price', $value = $foods['price'], ['placeholder' => 'Vnd', 'class' => 'form-control'] ) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('category_id', trans('admin_food.category')) !!}</td>
                    <td>{!!Form::select('category_id', $categories, $value = $foods['category_id'], ['class' => 'form-control'] )!!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('description', trans('admin_food.description')) !!}</td>
                    <td>{!! Form::text('description', $value = $foods['description'], ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('discount_id', trans('admin_food.discount')) !!}</td>
                    <td>{!!Form::select('discount_id', $discounts, $value = $foods['discount_id'] )!!} %</td>
                </tr>
                <tr>
                    <td>{!! Form::label('is_top', trans('admin_food.is_top')) !!}</td>
                    <td>{!! Form::select('is_top', [
                            '0' => trans('admin_food.no'),
                            '1' => trans('admin_food.yes'),
                        ], $value = $foods['is_top'])
                        !!}
                    </td>
                </tr>
                <tr>
                    <td>{!! Form::label('status', trans('admin_food.status')) !!}</td>
                    <td>{!! Form::select('status', [
                            '0' => trans('admin_food.pending'),
                            '1' => trans('admin_food.activate'),
                        ], $value = $foods['status'])
                        !!}
                    </td>
                </tr>               
                <tr>
                    <td>{!! Form::label('image', trans('admin_food.image')) !!}</td>
                    <td><img src="{{ $foods['image'] }}" width="60" height="60">
                        {!! Form::file('image') !!}</td>
                </tr>
            </table>
            {!! Form::submit(trans('admin_user.update'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </section>
@endsection

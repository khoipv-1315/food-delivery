@extends('admin.layouts.master')
@section('title')
    {{ trans('admin_food.Add Food') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>{{ trans('admin_food.add food') }}</h1>
        <div class="">

            @include('admin.layouts.common')
            
            {!! Form::open(['route' => 'admin.food.store', 'method' => 'post', 'enctype' => 'multipart/form-data'], ['class' => 'form-group'])  !!}
                <table class="table">
                    <tr>
                        <td>{!! Form::label('name', trans('admin_food.name')) !!}</td>
                        <td>{!! Form::text('name', $value = '', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('price', trans('admin_food.price')) !!}</td>
                        <td>{!! Form::number('price', $value = '', ['placeholder' => 'Vnd', 'class' => 'form-control'] ) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('description', trans('admin_food.description')) !!}</td>
                        <td>{!! Form::text('description', $value = '', ['placeholder' => trans('admin_food.description'), 'class' => 'form-control']) !!}</td>
                    </tr>              
                    <tr>
                        <td>{!! Form::label('discount_id', trans('admin_food.discount')) !!}</td>
                        <td>{!!Form::select('discount_id', $discounts, ['class' => 'form-control'] )!!}%</td>
                    </tr> 
                    <tr>
                        <td>{!! Form::label('is_top', trans('admin_food.is_top')) !!}</td>
                        <td>{!! Form::select('is_top', [
                                '0' => trans('admin_food.no'),
                                '1' => trans('admin_food.yes'),
                            ])
                            !!}
                        </td>
                    </tr>                   
                    <tr>
                        <td>{!! Form::label('status', trans('admin_food.status')) !!}</td>
                        <td>{!! Form::select('status', [
                                '0' => trans('admin_food.pending'),
                                '1' => trans('admin_food.activate'),
                            ])
                            !!}
                        </td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('category_id', trans('admin_food.category')) !!}</td>
                        <td>{!!Form::select('category_id', $categories, ['class' => 'form-control'] )!!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('image', trans('admin_food.image')) !!}</td>
                        <td>{!! Form::file('image') !!}</td>
                    </tr>
                </table>
            {!! Form::submit(trans('admin_food.add'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </section>
@endsection

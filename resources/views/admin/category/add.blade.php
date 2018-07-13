@extends('admin.layouts.master')
@section('title')
    {{ trans('admin_category.Add Category') }}
@endsection

@section('content')
    <section class="content-header">
        <h1>{{ trans('admin_category.add category') }}</h1>
        <div class="">

            @include('admin.layouts.common')
            
            {!! Form::open(['route' => 'admin.category.store', 'method' => 'post', 'enctype' => 'multipart/form-data'], ['class' => 'form-group'])  !!}
                <table class="table">
                    <tr>
                        <td>{!! Form::label('name', trans('admin_category.name')) !!}</td>
                        <td>{!! Form::text('name', $value = '', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('status', trans('admin_category.status')) !!}</td>
                        <td>{!! Form::select('status', [
                                '0' => trans('admin_category.pending'),
                                '1' => trans('admin_category.activate'),
                            ])
                             !!}
                        </td>
                    </tr>
                </table>
                {!! Form::submit(trans('admin_category.add'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </section>
@endsection

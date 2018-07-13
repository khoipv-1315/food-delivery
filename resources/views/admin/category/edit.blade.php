@extends("admin.layouts.master")
@section('title')
    {{ trans('Edit') }}
@endsection

@section('content')
    <section class="content-header">
        <h1>{{ trans('admin_user.edit user') }}</h1>
        <div class="">

            @include('admin.layouts.common')
            
            {!! Form::open(['route' => [
                'admin.category.update', $categories['id']], 
                'method' => 'PUT', 'enctype' => 'multipart/form-data'],
                ['class' => 'form-group'
                ]) !!}
            <table class="table">
                <tr>
                    <td>{!! Form::label('name', trans('admin_category.name')) !!}</td>
                    <td>{!! Form::text('name', $value = $categories['name'], ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>{!! Form::label('status', trans('admin_category.status')) !!}</td>
                    <td>{!! Form::select('status', [
                            '0' => trans('admin_category.pending'),
                            '1' => trans('admin_category.activate'),
                        ],$value = $categories['status'])
                        !!}
                    </td>
                </tr>
            </table>
            {!! Form::submit(trans('admin_user.update'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </section>
@endsection

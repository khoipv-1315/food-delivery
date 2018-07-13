@extends("admin.layouts.master")
@section('title')
    {{ trans('Add') }}
@endsection

@section('content')
    <section class="content-header">
        <h1>{{ trans('admin_user.add user') }}</h1>
        <div class="">
            
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('fail'))
                <div class="alert alert-danger">
                {{ session()->get('fail') }}
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-message">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (count($errors))      
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach   
                    </ul>
                </div>    
            @endif
            
            {!! Form::open(['route' => 'admin.user.store', 'method' => 'post', 'enctype' => 'multipart/form-data'], ['class' => 'form-group'])  !!}
                <table class="table">
                    <tr>
                        <td>{!! Form::label('name', trans('admin_user.name')) !!}</td>
                        <td>{!! Form::text('name', $value = '', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('email', trans('admin_user.email')) !!}</td>
                        <td>{!! Form::text('email', $value = '', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('password', trans('admin_user.password')) !!}</td>
                        <td>{!! Form::password('password', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('password_confirmation', trans('admin_user.confirm password')) !!}</td>
                        <td>{!! Form::password('password_confirmation',  ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('address', trans('admin_user.address')) !!}</td>
                        <td>{!! Form::text('address', $value = '', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('phone', trans('admin_user.phone')) !!}</td>
                        <td>{!! Form::text('phone', $value = '', ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>

                        <td>{!! Form::label('avatar', trans('admin_user.avatar')) !!}</td>
                        <td>{!! Form::file('avatar') !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::label('role', trans('admin_user.role')) !!}</td>
                        <td>{!! Form::select('role', [
                                'admin' => trans('admin_user.admin'),
                                'customer' => trans('admin_user.customer'),
                            ])
                             !!}
                        </td>
                    </tr>
                </table>
            {!! Form::submit(trans('admin_user.add'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@if ($foods)
    @foreach($foods as $food)
        <tr>
            <td>{{ $food->name }}</td>
            <td><img src="{{ $food->image }}" class="img-rounded" alt="none" style="width: 60px; height: 60px;"></td>
            <td>{{ $food->discountFood->discount }}</td>
            <td>{{ $food->price }}</td>
            <td>{{ $food->status == config('setup.one') ? trans('admin_food.activate') : trans('admin_food.pending') }}</td>
            <td>{{ $food->description }}</td>
            <td>{{ $food->is_top == config('setup.one') ? trans('admin_food.yes') : trans('admin_food.no') }}</td>
            <td>{{ $food->category->name }}</td>
            <td>
                {!! Form::open([
                    'route' => ['admin.food.edit', $food['id']], 
                    'method' => 'get', 
                    'id' => 'form-edit'
                ]) !!}
                {!! Form::button('Edit', [
                    'type'=>'submit',
                    'class' => 'btn btn-warning fa fa-edit'
                ]) !!}
                {!! Form::close() !!}
            </td>
            <td>
                {!! Form::open([
                    'route' => ['admin.food.destroy', $food['id']], 
                    'method' => 'delete', 
                    'id' => 'form-delete'
                ]) !!}
                {!! Form::button('Delete', [
                    'type'=>'submit',
                    'class' => 'btn btn-danger fa fa-trash'
                ]) !!}
                {!! Form::close() !!}
            </td>
        </tr>                             
    @endforeach
@endif

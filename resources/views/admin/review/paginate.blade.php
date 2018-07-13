<div class="x_content">
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <div id="datatable_filter" class="dataTables_filter">
                <label>
                    <input type="search" class="form-control input-sm" placeholder="{{ trans('admin_review.Search') }}" aria-controls="datatable">
                </label>
            </div>
        </div>
    </div>                    
    <table id="datatable" class="table table-striped table-breviewed">
        <thead>
            <tr>
                <th>{{ trans('admin_review.food') }}</th>
                <th>{{ trans('admin_review.rate') }}</th>
                <th>{{ trans('admin_review.content') }}</th>
                <th>{{ trans('admin_review.customer') }}</th>
                <th></th>
            </tr>
        </thead>                        
        <tbody>
            @if ($reviews)
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->food->name }}</td>
                        <td>
                            {!! Form::hidden('', $value = $review->rate/2, [
                                'class' => 'rating',
                                'data-filled' => 'fa fa-star',
                                'data-empty' => 'fa fa-star-o',
                                'data-fractions' => '2',
                                'disabled' => 'disabled'
                            ]) !!}
                        </td>
                        <td>{{ $review->content }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td>
                            {!! Form::open([
                                'route' => ['admin.review.destroy', $review->id], 
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
        </tbody>        
    </table>
    {{ $reviews->links() }}
</div>
                
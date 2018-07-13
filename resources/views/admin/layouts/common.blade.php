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

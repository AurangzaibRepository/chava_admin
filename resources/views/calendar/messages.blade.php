@if(session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <span>{{ucfirst($error)}}</span> <br />
    @endforeach
</div>
@endif
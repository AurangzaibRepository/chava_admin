<div class="dv-filter">
    {{Form::open()}}
    <div class="row">
        <div class="col-md-4">
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="col-md-4">
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
    </div>
    {{Form::close()}}
</div>
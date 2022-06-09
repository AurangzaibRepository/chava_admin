<div class="dv-filter">
    {{Form::open()}}
    <div class="row">
        <div class="col-md-4">
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="col-md-4">
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
        <div class="col-md-4 d-flex align-items-end justify-content-end">
            {{Form::button('Search', ['class' => 'btn btn-primary'])}}
            {{Form::button('Reset', ['class' => 'btn btn-secondary'])}}
        </div>
    </div>
    {{Form::close()}}
</div>
<div class="dv-filter">
    {{Form::open(['id' => 'form-filter'])}}
    <div class="row">
        <div class="col-md-4 mb-3">
            {{Form::text('reminder', null, ['class' => 'form-control', 'placeholder' => 'Reminder'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::text('place', null, ['class' => 'form-control', 'placeholder' => 'Place'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::select('user', [], null, ['class' => 'form-select'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::text('datetime', null, ['class' => 'form-control', 'placeholder' => 'Datetime'])}}
        </div>
        <div class="col-md-8 mb-3 d-flex align-items-end justify-content-end">
            {{Form::button('Search', ['class' => 'btn btn-primary'])}}
            {{Form::button('Reset', ['class' => 'btn btn-secondary'])}}
        </div>
    </div>
    {{Form::close()}}
</div
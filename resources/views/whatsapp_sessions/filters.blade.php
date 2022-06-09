<div class="dv-filter">
    {{Form::open(['id' => 'form-filter'])}}
    <div class="row">
        <div class="col-md-4">
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="col-md-4">
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
        <div class="col-md-4 d-flex align-items-end justify-content-end">
            {{Form::button('Search', ['class' => 'btn btn-primary', 'onClick' => 'PopulateUsers()'])}}
            {{Form::button('Reset', ['class' => 'btn btn-secondary', 'onClick' => 'reset()'])}}
        </div>
    </div>
    {{Form::close()}}
</div>
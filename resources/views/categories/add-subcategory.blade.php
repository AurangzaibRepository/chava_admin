<div class="modal" id="modal-subcategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label>Add Subcategory</label>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div>
                            {{Form::label('subcategory', 'Subcategory')}}
                            {{Form::text('subcategory', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="col-12 text-end col-buttons">
                        {{Form::button('Save', ['class' => 'btn btn-primary'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal'])}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
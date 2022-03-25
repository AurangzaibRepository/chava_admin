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
                            <span class="spn-error" id="spn-subcategory">Subcategory required</span>
                        </div>
                    </div>
                    <div class="col-12 text-end col-buttons">
                        {{Form::button('Save', ['class' => 'btn btn-primary', 'onClick' => 'save()'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal'])}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
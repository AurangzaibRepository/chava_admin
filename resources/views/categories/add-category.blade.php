<div class="modal" id="modal-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label>Add Category</label>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            {{Form::label('category', 'Category')}}
                            {{Form::text('category', null, ['class' => 'form-control', 'id' => 'category'])}}
                        </div>
                        <div>
                            {{Form::label('status', 'Status')}}
                            {{Form::select('status', $statusArray, '', ['class' => 'form-select'])}}
                        </div>
                    </div>
                    <div class="col-12 dv-checkbox">
                        {{Form::checkbox('publish', '', false, ['id' => 'publish'])}}
                        {{Form::label('publish', 'Publish')}}
                    </div>
                    <div class="col-12 text-end">
                        {{Form::button('Save', ['class' => 'btn btn-primary'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                        <div class="mb-3">
                            {{Form::label('status', 'Status')}}
                            {{Form::select('status', $statusArray, '', ['class' => 'form-select'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modal-edit-topic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{Form::label('header-label', 'Edit Topic')}}
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        {{Form::label('type', 'Type')}}
                        {{Form::select('type', [], null, ['class' => 'form-select'])}}
                    </div>
                    <div class="col-12 mb-3">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', null, ['class' => 'form-control'])}}
                    </div>
                    <div class="col-12">
                        {{Form::label('video', 'Select File')}}
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" id="iframe-video" allowfullscreen></iframe>
                        </div>
                        {{Form::file('video')}}
                    </div>
                    <div class="col-12 text-end">
                        {{Form::button('Save', ['class' => 'btn btn-primary'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
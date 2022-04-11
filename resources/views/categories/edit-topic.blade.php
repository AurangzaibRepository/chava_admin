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
                        {{Form::select('type', $topicTypes, null, ['class' => 'form-select'])}}
                        <span class="spn-error" id="error-type">Type required</span>
                    </div>
                    <div class="col-12 mb-3">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', null, ['class' => 'form-control'])}}
                        <span class="spn-error" id="error-title">Title required</span>
                    </div>
                    <div class="col-12">
                        {{Form::label('video', 'Select File')}}
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" id="iframe-video" allowfullscreen></iframe>
                        </div>
                        {{Form::file('video')}}
                        <span class="spn-error" id="error-video">File required</span>
                    </div>
                    <div class="col-12 text-end">
                        {{Form::button('Save', ['class' => 'btn btn-primary'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal' ])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
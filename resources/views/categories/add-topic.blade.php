<div class="modal" id="modal-add-topic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{Form::label('header-label', 'Add Topic')}}
            </div>
            <div class="modal-body">
                {{Form::open()}}
                <div class="row">
                    <div class="col-12">
                        {{Form::label('type', 'Type')}}
                        {{Form::select('type', $topicTypes, null, ['class' => 'form-select'])}}
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

</div>
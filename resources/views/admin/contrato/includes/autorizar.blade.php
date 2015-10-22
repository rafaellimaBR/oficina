{{--FORMULARIO MODAL PARA CANCELAMENTO--}}

<div class="modal fade" id="form-autorizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open((['route'=>['contrato.autorizar'],'method'=>'post','name'=>'autorizar'])) !!}
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Autorizar</h4>
            </div>
            <div class="modal-body">
                @include('admin.contrato.includes.form-alteracao-status')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="submit"  class="btn btn-success">Autorizar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


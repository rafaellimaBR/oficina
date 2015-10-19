{{--FORMULARIO MODAL PARA EXCLUSÃO--}}

<div class="modal fade" id="form-excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open((['route'=>['servico.excluir'],'method'=>'post','name'=>'excluir'])) !!}
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('id',null,['id'=>'id']) !!}
                <h6>Deseja realmente excluir esse registor?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit"  class="btn btn-danger">Excluir</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


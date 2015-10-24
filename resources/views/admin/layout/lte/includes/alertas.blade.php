@if(session('alerta'))

    <div class="alert alert-{!! session('alerta')['tipo'] !!} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-{!! session('alerta')['icon'] !!}"></i> Alerta!</h4>
        {!! session('alerta')['msg'] !!}
    </div>

@endif
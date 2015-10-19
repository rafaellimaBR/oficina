<table id="tabela-telefones" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width:3%">DDD</th>
        <th style="width:30%">Numero</th>
        <th style="width:10%">Tipo Contato</th>
        <th style="width:10%">Operadora</th>
        <th style="width:10%">Disponibilidade</th>
        <th style="width:8%">Excluir</th>

    </tr>
    </thead>
    <tbody>
    @foreach($cliente->contatos as $r)
        <tr>
            <td>{!! $r->telefone->ddd !!}</td>
            <td>{!! $r->telefone->id !!}</td>
            <td>{!! $r->telefone->tipo !!}</td>
            <td>{!! $r->telefone->operadora !!}</td>
            <td>{!! $r->dis !!}</td>

            <td>
                <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th >DDD</th>
        <th >Numero</th>
        <th >Tipo Contato</th>
        <th >Operadora</th>
        <th>Disponibilidade</th>
        <th>Excluir</th>
    </tr>
    </tfoot>
</table>
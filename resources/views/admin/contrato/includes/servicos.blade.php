<table class="table table-bordered table-hover">
    <thead>
        <th>Servico</th>
        <th>Valor</th>
        <th></th>
    </thead>
    <tbody>
    @foreach($contrato->maoobra as $r)
        <tr>
            <td>{!! $r->servico->nome !!}</td>
            <td>{!! $r->valor !!}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
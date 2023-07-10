<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de tarefas</title>
</head>
<style>
    .titulo{
        border: 1px;
        background-color: gray;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;

    }

    .tabela{
        width: 100%;
    }

    table th{
        text-align: left;
    }

    .page-break {
    page-break-after: always;
}
</style>

<body>
    <div class="titulo">Lista de tarefas</div>
    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>tarefa</th>
                <th>Data limite conclusão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $key => $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

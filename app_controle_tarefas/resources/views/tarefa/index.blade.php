@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefas
                   <a href="{{route('tarefa.create')}}" class="float-right" style="margin-left:10px">Novo</a>
                   <a href="{{route('tarefa.exportacao',['extensao' => 'xlsx'])}}" class="float-right"style="margin-left:10px">XLSX</a>
                   <a href="{{route('tarefa.exportacao',['extensao' => 'csv'])}}" class="float-right" style="margin-left:10px">CSV</a>
                   <a href="{{route('tarefa.exportacao',['extensao' => 'pdf'])}}" class="float-right" style="margin-left:10px">PDF</a>
                   <a href="{{route('tarefa.exportar',['extensao' => 'pdf'])}}" class="float-right">PDF V2</a>
                  </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Data limite conclusão</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $key => $t)
                            <tr>
                                <th scope="row">{{$t['id']}}</th>
                                <td>{{$t['tarefa']}}</td>
                                <td>{{ date('d/m/Y',strtotime($t['data_limite_conclusao'])) }}</td>
                                <td><a href="{{route('tarefa.edit', $t['id'])}}">Editar<i class="bi bi-pencil-fill"></i></a></td>
                                <td>
                                  <form id="form_{{$t['id']}}" method="post" action="{{ route('tarefa.destroy', ['tarefa' => $t['id']]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$t['id']}}').submit()">Excluir<i class="bi bi-trash3"></i></a>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <nav>
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                            @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                            <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}} ">
                                <a class="page-link" href="{{$tarefas->url($i)}}">{{$i}}</a>
                            </li>
                            @endfor
                          <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Próximo</a></li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

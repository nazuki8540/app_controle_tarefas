<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\withMapping;
class TarefasExport implements FromCollection, withHeadings, withMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return auth()->user()->tarefas()->get();
    }

    public function headings():array //declarando o tipo de retorno
    {
        return [
         'ID da tarefa',
         'tarefa',
         'data limite conclusão',
         
        ];
    }
    public function map($linha):array
    {
        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y)',strtotime ($linha->data_limite_conclusao)),
        ];
    }
}

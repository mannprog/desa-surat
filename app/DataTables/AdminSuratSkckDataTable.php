<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\SuratSkck;
use App\Models\AdminSuratSkck;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AdminSuratSkckDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            return view('auth.admin.pages.surat.skck.component.action', compact('row'))->render();
        })
        ->addColumn('tanggal_request_formatted', function ($row) {
            return Carbon::parse($row->tanggal_request)->format('d M Y H:i');
        })
        ->addColumn('status_permohonan', function ($row) {
            $don = 'Surat Pengantar Telah Selesai Dibuat';
            $rej = 'Permohonan Ditolak';
            $acc = 'Surat Pengantar Sedang Diproses';
            $not = 'Belum Ditentukan';
            if ($row->status === 'selesai') {
                return $don;
            } elseif($row->status === 'proses') {
                return $acc;
            } elseif($row->status === 'tolak') {
                return $rej;
            } else {
                return $not;
            }
        })
        ->rawColumns(['status_permohonan'])
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratSkck $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('user');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('adminsuratskck-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->addColumnDef([
                        'responsivePriority' => 1,
                        'targets' => 1,
                    ])
                    ->orderBy(1, 'asc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                // ->width(5)
                ->searchable(false)
                ->orderable(false)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
            Column::make('user.name')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->orderable(false)
                ->title('Nama Pemohon'),
            Column::make('tanggal_request_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tanggal Permohonan'),
            Column::make('status_permohonan')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                // ->width(30)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center')
                ->title('Aksi'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AdminSuratSkck_' . date('YmdHis');
    }
}

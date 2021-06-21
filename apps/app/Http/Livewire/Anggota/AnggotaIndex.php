<?php

namespace App\Http\Livewire\Anggota;

use App\Exports\AnggotaExport;
use App\Models\Anggota;
use Livewire\Component;
use File;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $addMode = false;
    public $updateMode = false;
    public $filter = 10;
    public $search;

    protected $listeners = [
        'created' => 'itemCreated',
        'updated' => 'itemUpdated',
    ];

    public function add()
    {
        $this->addMode = true;
    }
    public function deleteItem($id)
    {
        $anggota = Anggota::find($id);
        if (isset($anggota->pas_foto)) {
            \File::delete('public/pasfoto/' . $anggota->pas_foto);
        }
        if (isset($anggota->foto_ktp)) {
            \File::delete('public/foto/' . $anggota->foto_ktp);
        }
        if (isset($anggota->foto_kk)) {
            \File::delete('public/kk/' . $anggota->foto_kk);
        }
        $anggota->delete();
        session()->flash('sukses', 'Berhasil dihapus');
    }

    public function cetak()
    {
        return redirect()->route('admin.anggota.cetak');
    }
    public function exportExcel()
    {
        $anggotas = Anggota::all();
        return  Excel::download(new AnggotaExport($anggotas), 'anggota.xlsx');
    }
    public function render()
    {
        $list_anggota = Anggota::paginate($this->filter);
        $search = Anggota::where('nama', 'LIKE', '%' . $this->search . '%')->orWhere('nik', 'LIKE', '%' . $this->search . '%')->orwhere('nia', 'LIKE', '%' . $this->search . '%')->orWhere('district_domisili', 'LIKE', '%' . $this->search . '%')->paginate($this->filter);
        return view('livewire.anggota.anggota-index', [
            'list_anggota' => $this->search == null ? $list_anggota : $search,
        ]);
    }
}

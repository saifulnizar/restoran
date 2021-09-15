<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\Bahan as ModelBahan;
use App\Models\Kategori;

class Bahan extends Component
{	
	use WithPagination;

	public $name, $kategori_id, $keterangan, $bahan_id;
    public $isModalOpen = 0;

    public function render()
    {
    	$bahan = ModelBahan::with(['kategori'])->get();
    	$kategori = Kategori::all();

        return view('livewire.bahan', [
        	'bahan' => $bahan,
        	'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->kategori_id = '';
        $this->keterangan = '';
    }
    
    public function store(Request $request)
    {
   
        $this->validate([
        	'kategori_id' => 'required',
            'name' => 'required',
            'keterangan' => 'required',
        ]);
      

        ModelBahan::updateOrCreate(['id' => $this->bahan_id], [
            'name' => $this->name,
            'kategori_id' => $this->kategori_id,
            'katerangan' => $this->keterangan,
        ]);

        session()->flash('message', $this->bahan_id ? 'bahan updated.' : 'bahan created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $bahan = ModelBahan::findOrFail($id);
        $this->bahan_id = $id;
        $this->kategori_id = $bahan->kategori_id;
        $this->name = $bahan->name;
        $this->keterangan = $bahan->katerangan;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        ModelKategori::find($id)->delete();
        session()->flash('message', 'kategori deleted.');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\Http\Request;
use Livewire\WithPagination;

use App\Models\Kategori as ModelKategori;

class Kategori extends Component
{	

	use WithPagination;

	public $name, $kategori_id;
    public $isModalOpen = 0;

    public function render()
    {
    	 $kategori = ModelKategori::all();


        return view('livewire.kategori',['kategori' => $kategori]);
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
    }
    
    public function store(Request $request)
    {
   
        $this->validate([
            'name' => 'required|unique:kategoris',
        ]);
      

        ModelKategori::updateOrCreate(['id' => $this->kategori_id], [
            'name' => $this->name,
        ]);

        session()->flash('message', $this->kategori_id ? 'kategori updated.' : 'kategori created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $kategori = ModelKategori::findOrFail($id);
        $this->kategori_id = $id;
        $this->name = $kategori->name;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        ModelKategori::find($id)->delete();
        session()->flash('message', 'kategori deleted.');
    }
}

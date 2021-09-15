<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Illuminate\Http\Request;

use App\Models\Resep as ModelResep;
use App\Models\Bahan;
use App\Models\Kategori;

class Resep extends Component
{	

	public $name, $resep_id, $id_resep;
	public $isModalOpen = 0;
	public $isDetailOpen = 0;
	public $isiDetail = null;

    
    public function render()
    {
    	$dataKategori = Kategori::all();
       	
       	$dataResep = ModelResep::with(['kategori'])->get();

        return view('livewire.resep',[
        	'bahan'   => Bahan::all()->count(),
        	'kategori'=> Kategori::all()->count(),
        	'resep' => ModelResep::all()->count(),
        	'dataKategori' => $dataKategori,
        	'dataResep' => $dataResep,
        	// 'isiDetail' => $this->isiDetail,
        ]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function detail($id){
    	$data = Bahan::where('kategori_id', $id)->get();
    	$this->isiDetail = $data;

    	$this->openDetailPopover();
    }

     public function openDetailPopover()
    {
        $this->isDetailOpen = true;
    }

    public function closeDetailPopover()
    {
    	$this->isiDetail = null;
        $this->isDetailOpen = false;
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
        $this->resep_id = '';
    }
    
    public function store(Request $request)
    {
   
        $this->validate([
        	'resep_id' => 'required',
            'name' => 'required',
        ]);
      

        ModelResep::updateOrCreate(['id' => $this->id_resep], [
            'name' => $this->name,
            'resep_id' => $this->resep_id,
        ]);

        session()->flash('message', $this->id_resep ? 'bahan updated.' : 'bahan created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $resep = ModelResep::findOrFail($id);
        $this->id_resep = $id;
        $this->resep_id = $resep->resep_id;
        $this->name = $resep->name;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        ModelResep::find($id)->delete();
        session()->flash('message', 'kategori deleted.');
    }
}

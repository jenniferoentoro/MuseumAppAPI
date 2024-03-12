<?php

namespace App\Http\Livewire;

use App\Models\Museum as ModelsMuseum;
use Livewire\Component;

class Museum extends Component
{
    public $museums;
    public $selectedMuseumId = -1;
    public $changed;
    
    public $nama;
    public $gambarUtama;
    public $alamatLengkap;
    public $alamatKota;
    public $deskripsi;
    public $linkGoogleMap;
    public $linkVirtualTour;

    public function render()
    {
        return view('livewire.museum');
    }

    public function click()
    {
        // Query data from the database
        $museums = ModelsMuseum::all();

        // Store the data in a property
        $this->museums = $museums;
    }

    public function displayMuseumDetails() {
        // $this->changed = $selectedMuseumId;
        $cur_museum = ModelsMuseum::where('id', '=', $this->selectedMuseumId)->first();
        $this->nama = $cur_museum->nama;
        $this->gambarUtama = $cur_museum->gambarUtama;
        $this->alamatLengkap = $cur_museum->alamatLengkap;
        $this->alamatKota = $cur_museum->alamatKota;
        $this->deskripsi = $cur_museum->deskripsi;
        $this->linkGoogleMap = $cur_museum->linkGoogleMap;
        $this->linkVirtualTour = $cur_museum->linkVirtualTour;
    }

    public function save() {
        $museum = ModelsMuseum::find($this->selectedMuseumId);
        $museum->nama = $this->nama;
        $museum->gambarUtama = $this->gambarUtama;
        $museum->alamatLengkap = $this->alamatLengkap;
        $museum->alamatKota = $this->alamatKota;
        $museum->deskripsi = $this->deskripsi;
        $museum->linkGoogleMap = $this->linkGoogleMap;
        $museum->linkVirtualTour = $this->linkVirtualTour;

        if ($museum->save()) {
            // session()->flash('message', 'Post successfully updated.');
            $this->emit('sweetalert', 'Success!', 'Museum has been updated.','success');
        }


    }
}
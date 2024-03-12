<div>
    <select wire:click="click" class="form-select mt-2" wire:model="selectedMuseumId" wire:change="displayMuseumDetails">
        
        <option value="-1" selected>-- Choose Museum --</option>
        @if ($museums)
      
            @foreach ($museums as $museum)
                <option value="{{ $museum->id }}">{{ $museum->nama }}</option>
            @endforeach
        @endif
        
      </select>
      <label for="exampleFormControlInput1" class="form-label">Nama Museum</label>
    <input type="text" wire:model="nama" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Link Gambar Utama</label>
    <input type="text" wire:model="gambarUtama" class="form-control">
    <div class="d-flex justify-content-center">
        <img src="{{ $gambarUtama }}" class="" alt="">

    </div>

    <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
    <input type="text" wire:model="alamatLengkap" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Alamat Kota</label>
    <input type="text" wire:model="alamatKota" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
    <input type="text" wire:model="deskripsi" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Link Google Map</label>
    <input type="text" wire:model="linkGoogleMap" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Link Virtual Tour</label>
    <input type="text" wire:model="linkVirtualTour" class="form-control">

    <button type="submit" wire:click="save" class="btn btn-primary mt-2">Save</button>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
        {{-- {{ $selectedMuseumId }} --}}
</div>

<script>
window.livewire.on('sweetalert', function(title, text, icon) {
    
            Swal.fire({ title, text, icon });
        });
</script>
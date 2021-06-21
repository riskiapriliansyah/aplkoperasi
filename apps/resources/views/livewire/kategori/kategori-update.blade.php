<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <label for="kategori">{{$jenis == 'event' ? 'Event' : 'Kategori'}}</label>
                <input type="text" wire:model='kategori' class="form-control @error('kategori') is-invalid @enderror">
                <input type="text" wire:model='jenis' class="form-control @error('kategori') is-invalid @enderror" hidden>

                <button class="btn btn-warning btn-sm mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <form wire:submit.prevent="create">
                <label for="kategori">{{$jenis == 'event' ? 'Event' : 'Kategori'}}</label>
                <input type="text" wire:model='kategori' class="form-control @error('kategori') is-invalid @enderror">
                <input type="text" wire:model='jenis' class="form-control @error('kategori') is-invalid @enderror" hidden>

                <button class="btn btn-success btn-sm mt-2" wire:loading.attr="disabled">Add</button>
                <div wire:loading wire:target="create">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </form>
        </div>
    </div>
</div>

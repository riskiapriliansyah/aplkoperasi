<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <form wire:submit.prevent="create">
                <label for="bidang">Bidang</label>
                <input type="text" wire:model='bidang' class="form-control @error('bidang') is-invalid @enderror">
                <button class="btn btn-success btn-sm mt-2" wire:loading.attr="disabled">Add</button>
                <div wire:loading wire:target="create">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </form>
        </div>
    </div>
</div>

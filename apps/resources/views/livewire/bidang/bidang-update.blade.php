<div>
    <div class="card overflow-auto">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <label for="bidang">Bidang</label>
                <input type="text" wire:model='bidang' class="form-control @error('bidang') is-invalid @enderror">
                <button class="btn btn-success btn-sm mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

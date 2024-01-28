{{-- store model --}}
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent='storeBrand'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Brand Slug</label>
                        <input type="text" wire:model.defer='slug' class="form-control">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" wire:model.defer='status'> Checked=Hidden,Un-Checked=Visible
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- update model --}}
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
                <button type="button" wire:click='closeModal' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:loading>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        {{-- <span class="sr-only">Loading...</span> --}}
                    </div>
                </div>
            </div>
            <div wire:loading.remove class="p-2">
                <form wire:submit.prevent='updateBrand'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Brand Name</label>
                            <input type="text" wire:model.defer='name' class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Brand Slug</label>
                            <input type="text" wire:model.defer='slug' class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" wire:model.defer='status'> Checked=Hidden,Un-Checked=Visible
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='closeModal' class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div wire:ignore.self class="modal fade" id="DeleteBrandModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brands</h5>
                <button type="button" wire:click='closeModal' class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:loading>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        {{-- <span class="sr-only">Loading...</span> --}}
                    </div>
                </div>
            </div>
            <div wire:loading.remove class="p-2">
                <form wire:submit.prevent='destroyBrand'>
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='closeModal' class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

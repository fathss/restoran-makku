@php $modalId = 'deleteModal' . ($menu->menu_id ?? ''); @endphp
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="{{ $modalId }}Label">Hapus Menu</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Apakah Anda yakin ingin menghapus menu 
                <strong>{{ $menu->menu_name }}</strong>?  
                Tindakan ini tidak dapat dibatalkan.
            </div>

            <div class="modal-footer">
                <!-- BS4 dismiss -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                <form action="{{ route('admin.menus.destroy', $menu->menu_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

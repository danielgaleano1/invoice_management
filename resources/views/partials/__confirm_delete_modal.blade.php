<div class="modal fade" tabindex="-1" role="dialog" id="confirm_delete_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Are you sure?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('This action cannot be undone!') }}</p>
                <form id="delete_form" action="" method="POST">
                    @method('DELETE')
                    @csrf()
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> {{ __('Close') }}</button>
                <button type="submit" form="delete_form" class="btn btn-danger"><i class="fas fa-trash-alt"></i> {{ __('Delete') }}</button>
            </div>
        </div>
    </div>
</div>
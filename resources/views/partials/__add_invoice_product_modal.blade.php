<div class="modal fade" tabindex="-1" role="dialog" id="add_invoice_product_modal">
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
                <form id="add_form" action="" method="POST">
                    @csrf()
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" form="add_form" class="btn btn-danger">{{ __('Delete') }}</button>
            </div>
        </div>
    </div>
</div>
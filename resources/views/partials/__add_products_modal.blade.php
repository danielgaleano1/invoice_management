<div class="modal fade" tabindex="-1" role="dialog" id="add_products_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add producto quantity and price') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Add quantity to product') }}</p>
                <form id="add_product_form" action="" method="post">
                    @csrf()

                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" form="add_product_form" class="btn btn-success">{{ __('Add product quantity') }}</button>
            </div>
        </div>
    </div>
</div>
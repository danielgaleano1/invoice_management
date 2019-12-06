<div class="modal fade" tabindex="-1" role="dialog" id="add_invoice_product_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add producto at invoice') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('This action cannot be undone!') }}</p>
                <form id="add_form" action="" method="POST">
                    @csrf()

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">{{ __('Code') }}</label>
                            <input type="number" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" value="" required>
                            @includeWhen($errors->has('code'), 'partials.__invalid_feedback', ['feedback' => $errors->first('code')])
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">{{ __('description') }}</label>
                            <select class="form-control custom-select {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>
                                <option value="">{{ __('Please select a description') }}</option>
                                @foreach($invoice_product_list as $invoice_product_lists)
                                    <option value="{{ $invoice_product_lists->id }}">{{ $invoice_product_lists->name }}</option>
                                @endforeach
                            </select>
                            @includeWhen($errors->has('description'), 'partials.__invalid_feedback', ['feedback' => $errors->first('description')])
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" form="add_form" class="btn btn-danger">{{ __('Delete') }}</button>
            </div>
        </div>
    </div>
</div>
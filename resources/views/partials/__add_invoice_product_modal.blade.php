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
                <p>{{ __('Select one product') }}</p>
                <form id="add_form" action="" method="post">
                    @csrf()

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control {{ $errors->has('invoice_id') ? 'is-invalid' : '' }}" name="invoice_id" id="invoice_id" value="{{ $invoice_list->id }}" required readonly>
                            @includeWhen($errors->has('invoice_id'), 'partials/__invalid_feedback', ['feedback' => $errors->first('invoice_id')])
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_id">{{ __('Code') }}</label>
                            <select v-model="selected" @change="getDataOfProduct" class="form-control custom-select {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                                <option value="">{{ __('Please select a code') }}</option>
                                <option v-for="product in products" v-bind:value="product.id">
                                    @{{ product.code }}
                                </option>
                            </select>
                            @includeWhen($errors->has('product_id'), 'partials/__invalid_feedback', ['feedback' => $errors->first('product_id')])
                        </div>
                    </div>
 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity">{{ __('Quantity') }}</label>
                            <input type="number" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" id="quantity" value="1" required>
                            @includeWhen($errors->has('quantity'), 'partials/__invalid_feedback', ['feedback' => $errors->first('quantity')])
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">{{ __('Price') }}</label>
                            <input type="text" class="form-control" name="price" id="price" v-bind:value="price" readonly>
                            @includeWhen($errors->has('price'), 'partials/__invalid_feedback', ['feedback' => $errors->first('price')])
                        </div>
                    </div>
                </form>
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stock">{{ __('Stock') }}</label>
                        <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" name="stock" id="stock" v-bind:value="stock" readonly>
                        @includeWhen($errors->has('stock'), 'partials/__invalid_feedback', ['feedback' => $errors->first('stock')])
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> {{ __('Close') }}</button>
                <button type="submit" form="add_form" class="btn btn-success"><i class="fas fa-plus-circle"></i> {{ __('Add product') }}</button>
            </div>
        </div>
    </div>
</div>
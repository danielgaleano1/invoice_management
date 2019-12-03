<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <select class="form-control custom-select {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" required>
                <option value="">{{ __('Please select a code') }}</option>
                @foreach($product_list as $product_lists)
                    <option value="{{ $product_lists->id }}">{{ $product_lists->code }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('product_lists'), 'partials.__invalid_feedback', ['feedback' => $errors->first('product_lists')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <select class="form-control custom-select {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>
                <option value="">{{ __('Please select a description') }}</option>
                @foreach($product_list as $product_lists)
                    <option value="{{ $product_lists->id }}">{{ $product_lists->description }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('product_lists'), 'partials.__invalid_feedback', ['feedback' => $errors->first('product_lists')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="stock">{{ __('Stock') }}</label>
            <input type="text" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" name="stock" id="stock" value="" required>
            @includeWhen($errors->has('stock'), 'partials.__invalid_feedback', ['feedback' => $errors->first('stock')])
        </div>
    </div>

</div>
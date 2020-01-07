<div class="row">

<div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" value="{{ old('code') }}" required>
            @includeWhen($errors->has('code'), 'partials/__invalid_feedback', ['feedback' => $errors->first('code')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" value="{{ old('description') }}" required>
            @includeWhen($errors->has('description'), 'partials/__invalid_feedback', ['feedback' => $errors->first('description')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="stock">{{ __('Stock') }}</label>
            <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" name="stock" id="stock" value="{{ old('stock') }}" required>
            @includeWhen($errors->has('stock'), 'partials/__invalid_feedback', ['feedback' => $errors->first('stock')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="price">{{ __('Price') }}</label>
            <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" value="{{ old('price') }}" required>
            @includeWhen($errors->has('price'), 'partials/__invalid_feedback', ['feedback' => $errors->first('price')])
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" value="{{ old('code', $invoice_list->code) }}" required>
            @includeWhen($errors->has('code'), 'partials.__invalid_feedback', ['feedback' => $errors->first('code')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="expiration_at">{{ __('expiration_at') }}</label>
            <input type="expiration_at" class="form-control {{ $errors->has('expiration_at') ? 'is-invalid' : '' }}" name="email" id="expiration_at" value="{{ old('expiration_at', $invoice_list->expiration_at) }}" required>
            @includeWhen($errors->has('expiration_at'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expiration_at')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="collaborator">{{ __('Collaborator') }}</label>
            <select class="form-control custom-select {{ $errors->has('collaborator') ? 'is-invalid' : '' }}" name="city" id="collaborator" required>
                <option value="">{{ __('Please select a collaborator') }}</option>
                @foreach($collaborator_list as $collaborator)
                    <option value="{{ $collaborator->id }}" {{ old('collaborator', $invoice_list->collaborator_id) == $collaborator->id ? 'selected' : ''}}>{{ $collaborator->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('collaborator'), 'partials.__invalid_feedback', ['feedback' => $errors->first('collaborator')])
        </div>
    </div>
</div>
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
            <label for="collaborator">{{ __('Collaborator') }}</label>
            <select class="form-control custom-select {{ $errors->has('collaborator') ? 'is-invalid' : '' }}" name="collaborator" id="collaborator" required>
                <option value="">{{ __('Please select a collaborator') }}</option>
                @foreach($collaborator_list as $collaborator)
                    <option value="{{ $collaborator->id }}" {{ old('collaborator', $invoice_list->collaborator_id) == $collaborator->id ? 'selected' : ''}}>{{ $collaborator->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('collaborator'), 'partials.__invalid_feedback', ['feedback' => $errors->first('collaborator')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="invoice_state">{{ __('Invoice State') }}</label>
            <select class="form-control custom-select {{ $errors->has('invoice_state') ? 'is-invalid' : '' }}" name="invoice_state" id="invoice_state" required>
                <option value="">{{ __('Please select a invoice state') }}</option>
                @foreach($invoice_state_list as $invoice_state)
                    <option value="{{ $invoice_state->id }}" {{ old('invoice_state', $invoice_list->invoice_state_id) == $invoice_state->id ? 'selected' : ''}}>{{ $invoice_state->type }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('invoice_state'), 'partials.__invalid_feedback', ['feedback' => $errors->first('invoice_state')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="client">{{ __('client') }}</label>
            <select class="form-control custom-select {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client" id="client" required>
                <option value="">{{ __('Please select a client') }}</option>
                @foreach($client_list as $client)
                    <option value="{{ $client->id }}" {{ old('client', $invoice_list->client_id) == $client->id ? 'selected' : ''}}>{{ $client->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('client'), 'partials.__invalid_feedback', ['feedback' => $errors->first('client')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="expiration_at">{{ __('expiration at') }}</label>
            <input type="date" class="form-control {{ $errors->has('expiration_at') ? 'is-invalid' : '' }}" name="expiration_at" id="expiration_at" value="{{ old('expiration_at', $invoice_list->expiration_at) }}" required>
            @includeWhen($errors->has('expiration_at'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expiration_at')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="value_tax">{{ __('Tax Value') }}</label>
            <input type="text" class="form-control {{ $errors->has('value_tax') ? 'is-invalid' : '' }}" name="value_tax" id="value_tax" value="{{ old('value_tax', $invoice_list->value_tax) }}" required readonly>
            @includeWhen($errors->has('value_tax'), 'partials.__invalid_feedback', ['feedback' => $errors->first('value_tax')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="total_value">{{ __('Total Value') }}</label>
            <input type="text" class="form-control {{ $errors->has('total_value') ? 'is-invalid' : '' }}" name="total_value" id="total_value" value="{{ old('total_value', $invoice_list->total_value) }}" required readonly>
            @includeWhen($errors->has('total_value'), 'partials.__invalid_feedback', ['feedback' => $errors->first('total_value')])
        </div>
    </div>

</div>
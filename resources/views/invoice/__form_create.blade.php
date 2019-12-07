<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" value="" required>
            @includeWhen($errors->has('code'), 'partials.__invalid_feedback', ['feedback' => $errors->first('code')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="collaborator_id">{{ __('Collaborator') }}</label>
            <select class="form-control custom-select {{ $errors->has('collaborator_id') ? 'is-invalid' : '' }}" name="collaborator_id" id="collaborator_id" required>
                <option value="">{{ __('Please select a collaborator') }}</option>
                @foreach($collaborator_list as $collaborator)
                    <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('collaborator_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('collaborator_id')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="invoice_state_id">{{ __('Invoice State') }}</label>
            <select class="form-control custom-select {{ $errors->has('invoice_state_id') ? 'is-invalid' : '' }}" name="invoice_state_id" id="invoice_state_id" required>
                <option value="">{{ __('Please select a invoice state') }}</option>
                @foreach($invoice_state_list as $invoice_state)
                    <option value="{{ $invoice_state->id }}">{{ $invoice_state->type }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('invoice_state_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('invoice_state_id')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="client_id">{{ __('client') }}</label>
            <select class="form-control custom-select {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                <option value="">{{ __('Please select a client') }}</option>
                @foreach($client_list as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('client_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('client_id')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="expiration_at">{{ __('expiration at') }}</label>
            <input type="date" class="form-control {{ $errors->has('expiration_at') ? 'is-invalid' : '' }}" name="expiration_at" id="expiration_at" value="" required>
            @includeWhen($errors->has('expiration_at'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expiration_at')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="value_tax">{{ __('Tax Value') }}</label>
            <input type="text" class="form-control {{ $errors->has('value_tax') ? 'is-invalid' : '' }}" name="value_tax" id="value_tax" value="0" required readonly>
            @includeWhen($errors->has('value_tax'), 'partials.__invalid_feedback', ['feedback' => $errors->first('value_tax')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="total_value">{{ __('Total Value') }}</label>
            <input type="text" class="form-control {{ $errors->has('total_value') ? 'is-invalid' : '' }}" name="total_value" id="total_value" value="0" required readonly>
            @includeWhen($errors->has('total_value'), 'partials.__invalid_feedback', ['feedback' => $errors->first('total_value')])
        </div>
    </div>

</div>
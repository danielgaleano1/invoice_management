<div class="row">
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" value="{{ old('code', $invoice_list->code) }}" required readonly>
            @includeWhen($errors->has('code'), 'partials/__invalid_feedback', ['feedback' => $errors->first('code')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="value_tax">{{ __('Invoice State') }}</label>
            <input type="text" class="form-control {{ $errors->has('invoice_state') ? 'is-invalid' : '' }}" name="invoice_state" id="invoice_state" value="{{ old('invoice_state', $invoice_list->InvoiceState->type) }}" required readonly>
            @includeWhen($errors->has('invoice_state'), 'partials/__invalid_feedback', ['feedback' => $errors->first('invoice_state')])
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
            @includeWhen($errors->has('collaborator'), 'partials/__invalid_feedback', ['feedback' => $errors->first('collaborator')])
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
            @includeWhen($errors->has('client'), 'partials/__invalid_feedback', ['feedback' => $errors->first('client')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="created_at">{{ __('expedition at') }}</label>
            <input type="datetime" class="form-control {{ $errors->has('created_at') ? 'is-invalid' : '' }}" name="created_at" id="created_at" value="{{ old('created_at', $invoice_list->created_at) }}" required readonly>
            @includeWhen($errors->has('created_at'), 'partials/__invalid_feedback', ['feedback' => $errors->first('created_at')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="expiration_at">{{ __('expiration at') }}</label>
            <input type="date" class="form-control {{ $errors->has('expiration_at') ? 'is-invalid' : '' }}" name="expiration_at" id="expiration_at" value="{{ old('expiration_at', $invoice_list->expiration_at) }}" required>
            @includeWhen($errors->has('expiration_at'), 'partials/__invalid_feedback', ['feedback' => $errors->first('expiration_at')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="receipt_at">{{ __('receipt at') }}</label>
            <input type="date" class="form-control {{ $errors->has('date_of_receipt') ? 'is-invalid' : '' }}" name="date_of_receipt" id="date_of_receipt" value="{{ old('date_of_receipt', $invoice_list->date_of_receipt) }}">
            @includeWhen($errors->has('date_of_receipt'), 'partials/__invalid_feedback', ['feedback' => $errors->first('date_of_receipt')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="value_tax">{{ __('Tax Value') }}</label>
            <input type="text" class="form-control {{ $errors->has('value_tax') ? 'is-invalid' : '' }}" name="value_tax" id="value_tax" value="{{ number_format(old('value_tax', $invoice_list->value_tax), 2) }}" required readonly>
            @includeWhen($errors->has('value_tax'), 'partials/__invalid_feedback', ['feedback' => $errors->first('value_tax')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="total_value">{{ __('Total Value') }}</label>
            <input type="text" class="form-control {{ $errors->has('total_value') ? 'is-invalid' : '' }}" name="total_value" id="total_value" value="{{ number_format(old('total_value', $invoice_list->total_value), 2) }}" required readonly>
            @includeWhen($errors->has('total_value'), 'partials/__invalid_feedback', ['feedback' => $errors->first('total_value')])
        </div>
    </div>

</div>
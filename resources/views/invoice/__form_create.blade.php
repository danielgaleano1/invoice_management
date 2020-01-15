<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="collaborator_id">{{ __('Collaborator') }}</label>
            <select class="form-control custom-select {{ $errors->has('collaborator_id') ? 'is-invalid' : '' }}" name="collaborator_id" id="collaborator_id" required>
                <option value="">{{ __('Please select a collaborator') }}</option>
                @foreach($collaborator_list as $collaborator)
                    <option value="{{ $collaborator->id }}" {{ old('collaborator_id') == $collaborator->id ? 'selected' : ''}}>{{ $collaborator->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('collaborator_id'), 'partials/__invalid_feedback', ['feedback' => $errors->first('collaborator_id')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="client_id">{{ __('client') }}</label>
            <select class="form-control custom-select {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                <option value="">{{ __('Please select a client') }}</option>
                @foreach($client_list as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : ''}}>{{ $client->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('client_id'), 'partials/__invalid_feedback', ['feedback' => $errors->first('client_id')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="expiration_at">{{ __('expiration at') }}</label>
            <input type="date" class="form-control {{ $errors->has('expiration_at') ? 'is-invalid' : '' }}" name="expiration_at" id="expiration_at" value="{{ old('expiration_at', now()->addDays(config('invoices.expiration_days'))->toDateString()) }}" required>
            @includeWhen($errors->has('expiration_at'), 'partials/__invalid_feedback', ['feedback' => $errors->first('expiration_at')])
        </div>
    </div>
</div>

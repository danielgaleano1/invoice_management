<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="document_type">{{ __('Document Type') }}</label>
            <select class="form-control custom-select {{ $errors->has('document_type') ? 'is-invalid' : '' }}" name="document_type" id="document_type" required>
                <option value="">{{ __('Please select a Document Type') }}</option>
                @foreach($document_types as $document_type)
                    <option value="{{ $document_type->id }}" {{ old('document_type', $client_list->document_type_id) == $document_type->id ? 'selected' : ''}}>{{ $document_type->code }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('document_type'), 'partials/__invalid_feedback', ['feedback' => $errors->first('document_type')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Document') }}</label>
            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code" value="{{ old('code', $client_list->code) != '' ? $client_list->code : '' }}" required>
            @includeWhen($errors->has('code'), 'partials/__invalid_feedback', ['feedback' => $errors->first('code')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $client_list->name) != '' ? $client_list->name : '' }}" required>
            @includeWhen($errors->has('name'), 'partials/__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" value="{{ old('address', $client_list->address) != '' ? $client_list->address : '' }}" required>
            @includeWhen($errors->has('address'), 'partials/__invalid_feedback', ['feedback' => $errors->first('address')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" id="phone" value="{{ old('phone', $client_list->phone) != '' ? $client_list->phone : '' }}" required>
            @includeWhen($errors->has('phone'), 'partials/__invalid_feedback', ['feedback' => $errors->first('phone')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email', $client_list->email) != '' ? $client_list->email : '' }}" required>
            @includeWhen($errors->has('email'), 'partials/__invalid_feedback', ['feedback' => $errors->first('email')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="city">{{ __('City') }}</label>
            <select class="form-control custom-select {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city" id="city" required>
                <option value="">{{ __('Please select a city') }}</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city', $client_list->city_id) == $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('city'), 'partials/__invalid_feedback', ['feedback' => $errors->first('city')])
        </div>
    </div>
</div>
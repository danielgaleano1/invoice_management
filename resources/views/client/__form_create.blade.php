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
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" required>
            @includeWhen($errors->has('name'), 'partials/__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" value="{{ old('address') }}" required>
            @includeWhen($errors->has('address'), 'partials/__invalid_feedback', ['feedback' => $errors->first('address')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" id="phone" value="{{ old('phone') }}" required>
            @includeWhen($errors->has('phone'), 'partials/__invalid_feedback', ['feedback' => $errors->first('phone')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" required>
            @includeWhen($errors->has('email'), 'partials/__invalid_feedback', ['feedback' => $errors->first('email')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="city">{{ __('City') }}</label>
            <select class="form-control custom-select {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city" id="city" required>
                <option value="">{{ __('Please select a city') }}</option>
                @foreach($city_list as $city)
                    <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('city'), 'partials/__invalid_feedback', ['feedback' => $errors->first('city')])
        </div>
    </div>

</div>
@extends('layout')

@section('content')
    @php $input_error = null @endphp
    @if ($errors->any())
        @foreach ($errors->getMessages() as $key => $value)
            @php
                $input_error[$key] = 'erro';
                $input_error[$key . '-msg-erro'] = $value[0];
            @endphp
        @endforeach
    @endif
    <div class="container">
        <form action="{{ url('contact/' . ($contact ? $contact->id : '')) }}" method="POST">
            @csrf
            @if ($contact)
                @method('PATCH')
            @else
                @method('POST')
            @endif
            <div class="row pt-5">
                <div class="col-md-3 pb-2">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input id="name" name="name" type="text" class="form-control {{ RequestHelper::error_class($input_error, 'contact') }}" value="{{ $contact->name ?? '' }}">
                    </div>
                    {{ RequestHelper::error_field($input_error, 'name') }}
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact">Contact *</label>
                        <input id="contact" name="contact" type="text" class="form-control {{ RequestHelper::error_class($input_error, 'contact') }}" value="{{ $contact->contact ?? '' }}">
                    </div>
                    {{ RequestHelper::error_field($input_error, 'contact') }}
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="email" class="form-control {{ RequestHelper::error_class($input_error, 'email') }}" value="{{ $contact->email ?? '' }}">
                    </div>
                    {{ RequestHelper::error_field($input_error, 'email') }}
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input id="save" name="save" type="submit" class="btn btn-success" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

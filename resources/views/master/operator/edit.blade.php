@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Healthection') }} | {{ $title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Operator') }}</li>
        <li class="breadcrumb-item">{{ $data->name }}</li>
        <li class="breadcrumb-item"><a href="{{ route('operator.edit', $data->id) }}">{{ __('Edit') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <b>{{ $title }}</b>
                    </h4>
                </div>
                <form action="{{ route('operator.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Full Name*') }}</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name) }}" placeholder="Enter Full Name">
                                    
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                            <div class="col-sm-9">
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $data->email) }}" placeholder="Enter Email">
                                    
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('operator.index') }}" class="btn btn-warning">{{ __('Back') }}</a>
                        <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
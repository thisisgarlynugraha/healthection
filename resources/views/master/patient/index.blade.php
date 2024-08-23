@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Healthection') }} | {{ $title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Patient') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('patient.index') }}">{{ __('Data') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <h4>
                            <b>{{ $title }}</b>
                        </h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('patient.create') }}" class="btn btn-primary float-right"><span class="fas fa-plus"></span> {{ __('Create') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudPatient" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('Name') }}</th>
                                    <th class="text-center">{{ __('Email') }}</th>
                                    <th class="text-center">{{ __('Phone') }}</th>
                                    <th class="text-center">{{ __('BPM') }}</th>
                                    <th class="text-center">{{ __('Systolic') }}</th>
                                    <th class="text-center">{{ __('Diastolic') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var datatable = $('#crudPatient').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('patient.ajax') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'bpm', name: 'bpm', width: '10%', class: 'text-center' },
                { data: 'systolic', name: 'systolic', width: '10%', class: 'text-center' },
                { data: 'diastolic', name: 'diastolic', width: '10%', class: 'text-center' },
                { data: 'status', name: 'status', width: '10%', class: 'text-center' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '10%' }
            ]
        })
    </script>
@endpush
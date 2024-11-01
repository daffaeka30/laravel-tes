@extends('layouts.app')

@section('title', 'Writers')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@push('js')
    
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 col-xs-10">
                <x-card icon="users" title="Writers" class="card-responsive">
                    <div class="table-responsive-sm" style="overflow-x: auto;">
                        <table class="table table-striped table-bordered table-striped" id="yajra" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered At</th>
                                    <th>Verified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </x-card>
            </div>
        </div>
    </div>

    @include('backend.writers._modal')

@endsection

@push('js')
    <script src="{{ asset('assets/backend/library/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('assets/backend/js/helper.js') }}"></script>
    <script src="{{ asset('assets/backend/js/writer.js') }}"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\TagRequest', '#formWriter') !!}

@endpush


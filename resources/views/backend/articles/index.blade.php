@extends('layouts.app')

@section('title', 'Articles')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <x-card icon="newspaper" title="Articles" class="card-responsive">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary d-block d-md-inline-block">Create</a>
                    <div class="table-responsive-sm overflow-x-auto">
                        <table class="table table-striped table-bordered table-striped" id="yajra" width="100%">
                            <thead>
                                <tr>
                                    <th width="1%" class="text-nowrap">No</th>
                                    <th class="text-nowrap">Title</th>
                                    <th class="text-nowrap">Category</th>
                                    <th class="text-nowrap">Tag</th>
                                    <th class="text-nowrap">Views</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Confirm</th>
                                    <th class="text-nowrap">Action</th>
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

@endsection

@push('js')
    <script src="{{ asset('assets/backend/library/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('assets/backend/js/helper.js') }}"></script>
    <script src="{{ asset('assets/backend/js/article.js') }}"></script>
@endpush

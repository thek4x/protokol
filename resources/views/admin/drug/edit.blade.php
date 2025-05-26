@extends('admin.app')

@section('page_title', $page_title)
@push('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@endpush


@section('content')
    <!-- general form elements -->
    <div class="row">
        @include('admin.drug.form')
        @include('admin.drug.formShow')
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
 
        });
    </script>
@endpush

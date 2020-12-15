@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? "EZPay" }}</h1>

    <!-- Main Content goes here -->

    <div style="padding: 20px">
		{!! $output !!}
	</div>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush

@push('css')
    @foreach ($css_files as $css_file)
    <link rel="stylesheet" href="{{ $css_file }}">
    @endforeach
@endpush

@push('js')
    @foreach ($js_files as $js_file)
    <script src="{{ $js_file }}"></script>
    @endforeach
    <script>
    if (typeof $ !== 'undefined') {
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    }
    </script>
@endpush

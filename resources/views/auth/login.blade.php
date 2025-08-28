@extends('components.layouts.master')

@section('content')
<script>
    // Redirect to home page with login modal open
    window.location.href = '{{ route("home") }}?auth=login';
</script>
@endsection

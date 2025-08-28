@extends('components.layouts.master')

@section('content')
<script>
    // Redirect to home page with register modal open
    window.location.href = '{{ route("home") }}?auth=register';
</script>
@endsection

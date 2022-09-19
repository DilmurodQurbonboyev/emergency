@extends('admin.layouts.app')
@section('title')
404
@endsection
@section('content')
<div class="error-page">
    <h2 class="headline text-danger"> 500</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>
        <p>
            We will work on fixing that right away. Meanwhile, you may
            <a href="{{ url()->previous() }}">return to back</a>.
        </p>
    </div>
</div>
@endsection

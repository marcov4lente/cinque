@extends('base.app')

@section('pageTitle', 'View Invoice')

@section('content')
    <div class="row">
        <div class="col sm12">
            <h1>View Invoice</h1>
        </div>
    </div>
    <div class="row document z-depth-2">
        <div class="col sm12">
            @include('document.invoice')
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="{{ route('update-invoice', ['id' => $id]) }}" class="btn-floating btn-large blue z-depth-3">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
    </div>
@endsection

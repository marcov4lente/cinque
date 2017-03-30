@extends('base.app')

@section('pageTitle', 'Invoices')

@section('content')
    <div class="row">
        <div class="col sm12">
            <h1>Invoices</h1>
        </div>
    </div>
    <div class="row">
        <div class="col sm12 m12">
            <ul class="collection">
                @foreach($data as $d)
                    <li class="collection-item avatar">
                        <i class="circle fa fa-file-text" aria-hidden="true"></i>
                        <span class="title"><a href="{{ route('view-invoice', ['id' => $d['id']]) }}">Invoice #{{ $d['id'] }} - {{ $d['client']['name'] }}</a></span>
                        <p>

                            {{ $d['status'] }} <br>
                            <span class="blue-grey-text text-lighten-3">Created {{ $d['created_at'] }}, Updated {{ $d['updated_at'] }}</span>

                        </p>
                        <div class="secondary-content">
                            <a href="{{ route('update-invoice', ['id' => $d['id'] ]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" onclick="deleteDialog('{{ route('delete-invoice', ['id' => $d['id'] ]) }}')"><i class="fa fa-trash" aria-hidden="true"></i></a><br>
                            <h3>{{ $d['total'] }}<h3>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col sm12 m12">
            @include('components.pagination')
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="{{ route('create-invoice') }}" class="btn-floating btn-large blue z-depth-3">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
    </div>
@endsection

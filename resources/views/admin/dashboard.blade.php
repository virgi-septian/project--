@extends('layouts.admin')

@section('content')
    <div class="card-header border-bottom border-1">{{ __('Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @role('admin')
        You are logged in as Admin!, {{ Auth::user()->name }} 
        @endrole
        You are logged in, {{ Auth::user()->name }} 
        
    </div>
@endsection

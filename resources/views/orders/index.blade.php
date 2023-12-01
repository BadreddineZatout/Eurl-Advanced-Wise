@extends('layout')

@section('content')
    <orders :orders='{{ $orders }}' />
@endsection

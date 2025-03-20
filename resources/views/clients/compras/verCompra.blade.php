@extends('layouts.app')

@section('title', 'Ver Compra - ' . $compra->id)

@section('content')
<div>{{ $compra }}</div>

<div>{{ $productos }}</div>

@endsection
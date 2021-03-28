@extends('layout')
@section('title', 'Products Chart')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/modules/products/chart.css') }}">
@endsection

@section('content')
    <div class="my-4 text-right">
        <a href="{{ route('products.index') }}" class="btn btn-primary ">Back</a>
    </div>
    <div class="chart-container">
        <bar-chart :chart-data="dataCollection" v-if="dataCollection"></bar-chart>
    </div>
@endsection

@section('page_script')
    <script src="{{ mix('js/modules/products/chart.js') }}"></script>
@endsection
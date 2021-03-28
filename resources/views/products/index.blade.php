@extends('layout')
@section('title', 'Products')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/modules/products/index.css') }}">
@endsection

@section('content')
    <div class="my-4 text-right">
        <a href="{{ route('products.chart') }}" class="btn btn-primary ">View chart</a>
    </div>
    <table id="products" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>   
@endsection

@section('page_script')
    <script src="{{ mix('js/modules/products/index.js') }}"></script>
@endsection
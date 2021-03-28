@extends('layout')
@section('title', 'View Product')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/modules/products/show.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <input type="hidden" ref="id" value="{{ $product->id ?? '' }}">
            <input type="hidden" ref="name" value="{{ $product->name ?? '' }}">
            <input type="hidden" ref="quantity" value="{{ $product->quantity ?? '' }}">
            <input type="hidden" ref="ingredients" value="{{ $product->ingredients ?? '' }}">

            <img class="shadow-1-strong rounded mb-4" src="{{ $product->image }}" />
            
            <div class="form-group">
                <label>Name/Title
                    <button class="btn" :class="BtnEditClass" v-if="hover || editing" @click="toggleEdit"
                        @mouseover="onNameOver" @mouseleave="onNameLeave">
                        <template v-if="!editing">Edit</template>
                        <template v-if="editing">Cancel</template>
                    </button>
                </label> 
                <br>
                <div class="d-inline-block" v-if="!editing" @mouseover="onNameOver" @mouseleave="onNameLeave">
                    @{{ product.name }}
                </div>
                <template v-if="editing">
                    <input type="text" class="form-control" name="name" v-model="product.name" placeholder="Name/Title" @blur="save"/>
                </template>
            </div>
            <div class="form-group">
                <label>SKU</label>
                <br>
                {{ $product->sku ?? '' }}
            </div>
            <div class="form-group">
                <label>Price</label>
                <br>
                {{ $product->price ?? '' }}
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <br>
                <template v-if="!editing">
                    @{{ product.quantity }}
                </template>
                <template v-if="editing">
                    <input type="number" class="form-control" name="quantity" v-model="product.quantity" placeholder="Quantity" @blur="save"/>
                </template>
            </div>
            <div class="form-group">
                <label>Ingredients</label>
                <br>
                <template v-if="!editing">
                    @{{ product.ingredients }}
                </template>
                <template v-if="editing">
                    <textarea class="form-control" name="ingredients" v-model="product.ingredients" cols="30" rows="5" placeholder="Ingredients" @blur="save"></textarea>
                </template>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection

@section('page_script')
    <script src="{{ mix('js/modules/products/show.js') }}"></script>
@endsection
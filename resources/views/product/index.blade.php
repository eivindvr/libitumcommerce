@extends('layouts.app')

@section('categories-menu')

@stop

@section('breadcrumbs')
    @if($taxon)
        @include('product._breadcrumbs')
    @endif
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($taxon && $products->isEmpty() && $taxon->children->count())
                    <div class="card card-default mb-4">
                        <div class="card-header">{{ $taxon->name }} Subcategories</div>

                        <div class="card-body">
                            <div class="row">
                            @foreach($taxon->children as $child)
                                <div class="col-12 col-sm-6 col-md-4 mb-4">
                                    @include('product.index._category', ['taxon' => $child])
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if(!$products->isEmpty())
                <div class="card card-default">
                    <div class="card-header">{{ $taxon ?  'Products in ' . $taxon->name : 'All Products' }}</div>

                    <div class="card-body">
                        <div class="row">

                            @foreach($products as $product)
                                <div class="col-12 col-sm-6 col-md-4 mb-4">
                                    @include('product.index._product')
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

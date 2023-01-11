@extends('dashboard.layout.layout')

@section('body')

<div class="card">
    <div class="card-header">
        <h3>المنتجات</h3>
        <a href="{{ route('dashboard.product.create') }}" class="btn btn-primary">اضافه منتج </a>
    </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th>Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount Price</th>
                    <th>Color Count</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                  <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount_price }}</td>
                    @if($product->color== null)
                    <td>0</td>
                    @else
                    <td>{{ count($product->color) }}</td>
                    @endif
                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>



</div>

@endsection

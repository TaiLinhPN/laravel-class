@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div class="container beta-relative">
  
  <div class="pull-left">
    <h2>List</h2>
    <div>Tổng = {{count($products)}} sản phẩm</div>
  </div>
  <table id="table_admin_product" class="table table-striped display">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col">Description</th>
        <th scope="col">price</th>
        <th scope="col">Unit</th>
        <th scope="col">New</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr class="products-list-admin">
        <th scope="row">{{$product->id}}</th>
        <th><img src="sources/image/product/{{$product->image}}" alt="image" style="height: 100px;" /></th>
        <td>{{$product->name}}</td>
        <td>{{$product->id_type}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->unit_price}}</td>
        <td>{{$product->unit}}</td>
        <td>
          <a href='admin/{{$product->id}}/edit' type="submit" class="btn btn-success" style="width:80px; margin-bottom:5px ;">Edit</a>
          <form role="form" action="delete/{{$product->id}}" method="post">
            @csrf
            <button name="edit" type="submit" class="btn btn-warning" style="width:80px;">Delete</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="space50">&nbsp;</div>
</div>
<script>
$(document).ready(function() {
  $('#table_admin_product').DataTable();
});
</script>
@endsection
@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div class="container beta-relative">
  
  <div class="pull-left">
    <h2>List</h2>
   
    <form action="/search" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for='inputNameFind'>Name</label>
                <input type="text" class="form-control" name="inputNameFind" id="inputNameFind" placeholder="Search ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </form>
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
        <th scope="col"><a href="{{route('admin.create')}}" class="btn btn-primary" style="width:80px;">Add</a></th>
      </tr>
    </thead>
    <tbody>
 
      <tr class="products-list-admin">
        <th scope="row">{{$product->id}}</th>
        <th><img src="sources/image/product/{{$product->image}}" alt="image" style="height: 100px;" /></th>
        <td>{{$product->name}}</td>
        <td>{{$product->id_type}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->unit_price}}</td>
        <td>{{$product->unit}}</td>
        <td>
          <a href="{{ route('admin.edit',$product->id) }}" type="submit" class="btn btn-success" >Edit</a>
          <form action="{{ route('admin.destroy',$product->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          
        </td>

      </tr>
 
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
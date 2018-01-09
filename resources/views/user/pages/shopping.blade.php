@extends('user.master')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
            <th class="action">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
          @foreach($cartContent as $item)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{!! url('public/images/'.$item['options']->image) !!}" height="200" width="200"></a></td>
            <td  class="name"><a href="#">{!! $item['name'] !!}</a></td>
            <td class="quantity"><input type="text" size="1" value="{!! $item['qty'] !!}" name="quantity[40]" class="col-lg-1"></td>
            <td class="action"> 
                <a href="{!! route('delYourCart', $item['rowid']) !!}" style="margin-right:10px;">Remove</a>
                <a href="#">Edit</a>
            </td>
           
             
            <td class="price">{!! $item['price'] !!}</td>
            <td class="total">{!! $item['price'] * $item['qty'] !!} </td>
             
          </tr>
          @endforeach
        </table>
      </div>
      
      <div class="container">
      <div>
          <div class="col-lg-4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{!! $cartTotal !!}</span></td>
              </tr>
            </table>
            <input type="submit" value="CheckOut" class="btn btn-orange pull-right">
            <input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10">
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection()
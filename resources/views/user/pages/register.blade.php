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
        <li class="active">Register Account</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="col-lg-9">
          <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
          <form class="form-horizontal" method="POST" action="{!! url('guest/postRegister') !!}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <h3 class="heading3">Your Personal Details</h3>
            @if(count($errors) > 0)
              <ul>
                @foreach($errors->all() as $error)
                  <li style="color:red;">{!! $error !!}</li>
                @endforeach
              </ul>
            @endif
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Your Name:</label>
                  <div class="controls">
                    <input type="text" name="username" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input type="text" name="email" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            
            <h3 class="heading3">Your Password</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password:</label>
                  <div class="controls">
                    <input type="password" name="password" class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> LPassword Confirm::</label>
                  <div class="controls">
                    <input type="password" name="confirmedPassword" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            
            <div class="pull-right">
              <input type="Submit" class="btn btn-orange" value="Continue">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>        
        <!-- Sidebar Start-->
        <!-- <aside class="col-lg-3">
          <div class="sidewidt">
            <h2 class="heading2"><span>Account</span></h2>
            <ul class="nav nav-list categories">
              <li>
                <a href="#"> My Account</a>
              </li>
              <li>
                <a href="#">Edit Account</a>
              </li>
              <li>
                <a href="#">Password</a>
              </li>
              <li>
                <a href="#">Wish List</a>
              </li>
              <li><a href="#">Order History</a>
              </li>
              <li><a href="#">Downloads</a>
              </li>
              <li><a href="#">Returns</a>
              </li>
              <li>
                <a href="#"> Transactions</a>
              </li>
              <li>
                <a href="category.html">Newsletter</a>
              </li>
              <li>
                <a href="category.html">Logout</a>
              </li>
            </ul>
          </div>
        </aside> -->
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
@endsection()
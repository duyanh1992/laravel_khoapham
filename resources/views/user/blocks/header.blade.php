<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<div class="headerstrip">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"> <a href="{!! url('/') !!}" class="logo pull-left"><img src="{!! url('public/user/img/logo.png') !!}" alt="SimpleOne" title="SimpleOne"></a> 
                    <!-- Top Nav Start -->
                    <div class="pull-left">
                        <div class="navbar" id="topnav">
                            <div class="navbar-inner">
                                <ul class="nav" >
                                    <li><a class="home active" href="{!! url('/') !!}">Home</a> </li>
                                    <?php
                                        if(isset($_SESSION['user'])){
                                            echo '<li><a class="myaccount" href="#">My Account</a> </li>';
                                        }
                                        else{
                                            echo '<li><a class="myaccount" href="'.route('getMemberLogin').'">Login</a> </li>';
                                        }
                                    ?>
                                    
                                    <li><a class="shoppingcart" href="{!! route('viewYourCart') !!}">My Shopping Cart</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Nav End -->
                    <div class="pull-right">
                        <form class="form-search top-search">
                            <input type="text" class="input-medium search-query" placeholder="Search Here…">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
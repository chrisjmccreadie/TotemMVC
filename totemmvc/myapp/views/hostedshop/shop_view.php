<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        
      </a>
 
      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="#">Totem MVC</a>
 
      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
        <!-- .nav, .navbar-search, .navbar-form, etc -->
      </div>
       <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
<ul class="nav">
                     
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visit us <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="http://www.totemsoftware.co.uk/" target="_blank">Totem Software</a></li>

                          <li><a href="http://www.mojag.co/" target="_blank">Mojag</a></li>
                          <li><a href="http://www.mojagcart.com/" target="_blank">Mojag Cart</a></li>

                          <li><a href="https://github.com/chrisjmccreadie/TotemMVC" target="_blank">Totem MVC on Github</a></li>
                          <li><a href="https://github.com/chrisjmccreadie/Mojag-Front-End-Class" target="_blank">Standalone Classes</a></li>

                      </li>
                      
                  
                    </ul>
                    </li>
                    
                         <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Demos <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                       

                          <li><a href="shop">Shop</a></li>
                                                      <li><a href="hostedshop">Hosted Shop</a></li>

                          <li><a href="#">Booking </a></li>

                          <li><a href="#">Collection</a></li>
                          <li><a href="#">Kickstarter</a></li>

                      
                      </ul>
                      </li>
 
    </div>
  </div>
</div>
<body>
	
	
<!--main body part start-->
<div id="wrapper" class="row-fluid">
<div class="row-fluid">
  <div class="container">

    <div class="span12">
    	<button class="btn btn-success btn pull-rightdropdown-toggle" id='sr-basket-button'><i class="icon-white icon-star"></i>View Basket</button>
    	 <!--
    	  <button class="btn btn-success btn-large pull-rightdropdown-toggle" id='sr_createsession'><i class="icon-white icon-star"></i> Create a seesoin</button>
    	  <button class="btn btn-success btn-large pull-rightdropdown-toggle" id='sr_fetchallproducts'><i class="icon-white icon-star"></i> Fetch All Products</button>
    	 -->
    	 
    	 
<div id='sr-productlist'>
</div>
<div class="product hide">
		<div class="productimage">
			<img src="http://d1y7fugidfyvfy.cloudfront.net/api/file/E4E6y6jJQvaDPOKY27u3/convert?h=100&amp;w=100&amp;fit=max&amp;quality=50">
		</div>
		<div class="productname">
			Medium Triangle Pendant			
		</div>
		<div class="productprice">
				30.00			
		</div>
			<a href="#" class="sr-additem btn btn-large" sr-name="Medium Triangle Pendant" sr-id="151" sr-slug="anytext" sr-price="30.00" sr-option="">Buy</a>
		</div>

</div>
<div class="product">
		<div class="productimage">
			<img src="http://d1y7fugidfyvfy.cloudfront.net/api/file/E4E6y6jJQvaDPOKY27u3/convert?h=100&amp;w=100&amp;fit=max&amp;quality=50">
		</div>
		<div class="productname">
			Medium Triangle Pendant		2	
		</div>
		<div class="productprice">
				180.00	
		</div>
			<a href="#" class="sr-additem btn btn-large" sr-name="Medium Triangle Pendant1" sr-id="161" sr-slug="anytext" sr-price="40.00" sr-option="">Buy</a>
		</div>

</div>
</div>
		</div>
    </div>
  </div>
</div>
</div>
<!-- Shop rocket variables -->

<!-- company id -->
<input type="hidden" name="sr-companyid" id="sr-companyid" value="11">
<!-- these vars are optional and allow you to contol the configuration of shop rocket from your own site, pretty cool no?
<!-- check if we need to rescane the whole page for products-->
<input type="hidden" name="sr-scanpage" id="sr-scanpage" value="1">
<!-- dynamic price, check with Shop rocket for latest price -->
<input type="hidden" name="sr-dynamicprice" id="sr-dynamicprice" value="1">
<!-- currency symbole, set your currency symbol -->
<input type="hidden" name="sr-currencysmbol" id="sr-currencysmbol" value="1">
<!-- base shipping price, set the basic shipping paice -->
<input type="hidden" name="sr-shipping" id="sr-shiping" value="1">
<!-- check stock flag, chekc if item is in stock or not. -->
<input type="hidden" name="sr-checkstock" id="sr-checkstock" value="1">
<!-- Out of stock message. -->
<input type="hidden" name="sr-outofstockmessage" id="sr-outofstockmessage" value="We are sorry to say we are out of stock.">
<!-- if we are going to log stats or not default = 1 -->
<input type="hidden" name="sr-stats" id="sr-stats" value="1">
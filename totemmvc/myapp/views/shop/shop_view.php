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
    	<div class="well">
    		A simple example that shows all the products being displayed.</br>
    		Points to note:</br>
    		We are using the Mojag Image API to render control the size and quality of the images</br>
    		We are using Mojag Cache to cache all the products</br>
    		excution time: {TMVC_TIMER} </br>
			Number of Products Renderded : <?php echo count($products);?>
    		
    	</div>
    	<?php
    		echo $mc_shopping_basket;
    	?>
    			<ul class="thumbnails">

    	<?php
    	
    	foreach ($products as $product)
		{
		?>
			  <li class="span3">
		<div class="product">
		<div class="productimage">

				<?php
					$images = $product->images;
					if(is_array($images))
					{
				?>
				<img src="
				<?php 
				echo $images[0]->cdnurl;
				?>/convert?h=100&w=100&fit=max&quality=50" />
				
				<?php
					}
				?>
				
			</div>
			<div class="productname">
				<?php 
				//print_r($product);
				//exit;
				echo $product->product->name;
				?>
			</div>
			<div class="productprice">
				<?php echo $product->product->price;?>
			</div>
			

			
			
			<a href='#' class="mojagadditem btn btn-large"  mc-name="<?php echo $product->product->name;?>" mc-id="<?php echo $product->product->id;?>" mc-slug="<?php echo $product->product->slug;?>" mc-price="<?php echo $product->product->price;?>" mc-option="">Buy</a>
		</div>
		</li>
			
		<?php
		}
		?>
		</ul>
</div>
</div>
		</div>
    </div>
  </div>
</div>
</div>

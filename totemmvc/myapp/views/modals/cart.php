<div id="cart">
	<?php
	//print_r($totals);
	//echo "ddd".$showc;
	if ($showc != 1)
	{
	?>
		<p class="view_checkout"><a id='mojagviewcart' href="#">VIEW CART</a> / <a id='shoppingcart2' href="<?php echo base_url()?>index.php?/checkout">CHECKOUT</a></p>
	<?php
	}
	else {
	
	?>
	
			<br/>


	<?php
	}
	?>
	
		<p class="item_price"><span class="item">(<span id='stockcount'><?php echo $totals['itemcount'];?></span>) ITEMS</span> 
			<span class="price">£<span  id='cartprice'><?php echo $totals['total'];?></span></span></p>
</div>
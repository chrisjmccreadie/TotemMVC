<?php
/**
 *
 * @package		Totem MvC Shop controller
 * @author		Totem Software
 * 
 *This is an example shop controller so you can see how to easily integrate with Mojag Cart.
 * or anything else you wish.
 * 
 * TODO: 
 * 
 * 
 */
 
class Shop_Controller extends TinyMVC_Controller
{
	

  function index()
  {
  	//get the array informaiton.
  	$tmvc = tmvc::instance();
	//fetch the products.
	$products = $this->mojagcart->fetchProducts($tmvc->config['companyid']);
	//load the shop model.
	$this->load->model('Shop_Model','shop');

	//assing the products to a view.
	$this->view->assign('products',$products);
	//get the cart parts
	$basket = $this->view->fetch('parts/mc_shopping_basket');
	$this->view->assign('mc_shopping_basket',$basket);	
	$template = $this->compile('shop/shop_view');
	echo $template;
  }

}
?>
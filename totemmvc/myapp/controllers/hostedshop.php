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
 
class Hostedshop_Controller extends TinyMVC_Controller
{
	

  function index()
  {
  	//get the array informaiton.
  	$tmvc = tmvc::instance();
	//fetch the products.
	//$products = $this->mojagcart->fetchProducts($tmvc->config['companyid']);
	//load the shop model.
	//$this->load->model('Shop_Model','shop');
	//echo "ddd".$tmvc->config['ru'];
	$this->view->assign('resourceurl',$tmvc->config['ru']);
	//exit;
	//echo $tmvc->resourceurl(); 
	//assing the products to a view.
	//$this->view->assign('products',$products);
	//////get the cart parts
	//$basket = $this->view->fetch('parts/mc_shopping_basket');
	////get the chose payment modal
	//$choosepayment = $this->view->fetch('parts/mc_choosepayment_modal');
	//$this->view->assign('mc_shopping_basket',$basket);
	//$this->view->assign('mc_choosepayment_modal',$choosepayment);	
	$template = $this->compile('hostedshop/shop_view','layout/hostedheader','layout/hostedfooter');
	echo $template;
  }

}
?>
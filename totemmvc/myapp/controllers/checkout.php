<?php

class Checkout_Controller extends TinyMVC_Controller
{
	function customerinfo()
	{
   		$this->load->library('mojagclass','mojagclass');
		//define the site id;
		$siteid = 401;
		//get the site details
		$site = $this->mojagclass->getSite($siteid);
		//print_r($site);
		//exit;
		//get the page
		//$pageid = 3291; 
		//$page = $this->mojagclass->getPage($pageid);
		
		//get the collection header
		$metacollections = $this->mojagclass->getKeyword($siteid,'collection');
		//print_r($meta);
		foreach($metacollections as $m)
		{
			$collectionname[] = $m->name;
		}
		$this->view->assign('collectionname',$collectionname);

		$this->view->assign('baseurl','http://'.$_SERVER['HTTP_HOST']);
		/*========================================================================================
		 * PRESS MODAL CODE
		 */
		$pageid = 3341; 
		$page = $this->mojagclass->getPage($pageid);
		$metapress = $this->mojagclass->getKeyword($siteid,'press');
		foreach($metapress as $m)
		{
			$pressname[] = $m->name;
			$pressgallery[] = $m->gallery;
			//print_r($pressgallery);
			//exit;
		}
		$this->view->assign('pressname',$pressname);
		$this->view->assign('pressgallery',$pressgallery);
		$this->view->assign('presstitle', $page->name);
		/*========================================================================================
		 * ABOUT MODAL CODE
		 */
		$pageid = 3371; 
		$page = $this->mojagclass->getPage($pageid);
		$metaabout = $this->mojagclass->getKeyword($siteid,'about');
		$i = 0;
		foreach($metaabout as $m)
		{
			$aboutname[] = $m->name;
			$mdata[] = $this->mojagclass->getPage($m->id)->pagedata;
			//$aboutcontents[] = $this->mojagclass->searchContent('BodyText',$m->pagedata,'');
			//$bodytext[] = $mdata[]->BodyText;
			//exit;
		}
		//print_r($aboutcontents);
		//print_r ($mdata);
		//print_r($bodytext);
		//exit;
		$this->view->assign('aboutname',$aboutname);
		$this->view->assign('aboutdata',$mdata);
		$this->view->assign('abouttitle', $page->name);
		/*========================================================================================
		 * PROJECTS MODAL CODE
		 */
		$pageid = 3411; 
		$page = $this->mojagclass->getPage($pageid);
		$projectgallery = $page->gallery;
		$this->view->assign('projecttitle', $page->name);
		$this->view->assign('projectgallery',$projectgallery);
		
		 
		$this->view->display('header_shop');
		$this->view->display('checkout_view');
		$this->view->display('projectModal_view');
		$this->view->display('pressModal_view');
		$this->view->display('aboutModal_view');
		$this->view->display('newsletter_view');
	    $this->view->display('footer_checkout');
	   
	}

	function comingsoon() {
		$this->view->display('comingsoon');
	}
	
	function makepayment() {
		$this->load->library('../mojagcartajax','mojagcartajax');
		echo 'loaded controller';
		$data['fintotal'] = $_POST['fintotal'];
		$data['finshipping'] = $_POST['finshipping'];
		//print_r($data);

		$this->mojagcartajax->storecustomerinfo();
		
		$this->view->display('header_shop');/*
		$this->view->display('checkout_view');
		$this->view->display('projectModal_view');
		$this->view->display('pressModal_view');
		$this->view->display('aboutModal_view');
		$this->view->display('newsletter_view');*/
	    $this->view->display('footer_checkout');
	}
}

?>


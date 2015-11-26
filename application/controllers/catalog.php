<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function index()
	{			
		$this->home1();//load->view('welcome_message');
	}
	public function home1()
	{
		//trying changes
		//$data['title']='Welcome to UBsMart!';		
		$data['searchval'] ="no_search_query";
		$data['filter'] ="default";
		$this->load->view('includes/header_loggedin');
		$this->load->view('catalog_v',$data);
		$this->load->view('includes/footer');
		//print_r($this->session->userdata());//temporary. Feel free to remove once development of seller only/buyer only pages gets going!				
	}
	public function execute_search($sort_by='price', $sort_order='asc',$filter='abcde', $offset=0)
	{
		$limit=8;
					
		$search_term = 'no_search_query'; // default when no term in session or POST
		if ($this->input->post('search_query'))
		{
    		// use the term from POST and set it to session
    		$search_term = $this->input->post('search_query');
    		$this->session->set_userdata('search_term', $search_term);
		}
		elseif ($this->session->userdata('search_term'))
		{
    		// if term is not in POST use existing term from session
    		$search_term = $this->session->userdata('search_term');
		}
		
		$data['searchval']=$search_term;	
		
		$this->load->model('catalog_m');
		$query_results=$this->catalog_m->fetch_results($search_term,$limit,$offset,$sort_by,$sort_order,$filter);
		$data['results']=$query_results['query'];
		$data['results_num']=$query_results['num_rows'];
		 
		//pagination		
		$this->load->library('pagination');
		$conf = array();
		$conf['base_url']=base_url("catalog/execute_search/$sort_by/$sort_order/$filter");
		if($data['results']!=NULL)
		{
			$conf['total_rows']=$data['results_num'];
		}
		$conf['per_page']=$limit;
		$conf['uri_segment']=6;
		//$conf['searchval']=$_POST['search_query'];
		$this->pagination->initialize($conf);
		$data['pagination']=$this->pagination->create_links();
		
		$data['sort_by']=$sort_by; 
 		$data['sort_order']=$sort_order;
		$data['filter']=$filter;
		
		$this->load->view('includes/header_loggedin');
		$this->load->view('catalog_v',$data);
		$this->load->view('includes/footer');
			
	}
	
}

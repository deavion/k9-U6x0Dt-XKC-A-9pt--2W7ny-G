<?php
/**
 * 
 */
class index extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		error_reporting(0);
		$this->load->database();
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('security');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->library('template');
		$this->load->library('user_agent');
		$this->load->model('m');
	}
public function blog($value='')
{
	# code...
	$page=intval($this->input->get('page'));
	$search=urldecode($this->input->get('search',TRUE));
	$query=$this->m->paginatearticle($page,$search)->result_array();
	foreach ($query as $key => $value) {
		# code...
		$each.=$this->m->eacharticle($value);
	}
	if ($search<>'') {
		# code...
		$base_url=base_url('index/blog?search='.urlencode($search));
	} else {
		# code...
		$base_url=base_url('index/blog?');
	}
	$data=[
		'article'=>$search,
		'bararticle'=>$each,
		'barcategory'=>$this->m->eachcategory(),
		'bardate'=>$this->m->eachdate(),
		'number'=>$this->m->article($search)->num_rows(),];
	$data['pagination']=$this->m->pagination($base_url,$data['number']);
	$this->template->load('home-recruitment','blog-articles-cards-sidebar',$data);
}
public function category($category='')
{
	# code...
	$page=intval($this->input->get('page'));
	$where=['category'=>$category,];
	$query=$this->m->paginatearticle($page,null,$where)->result_array();
	foreach ($query as $key => $value) {
		# code...
		$each.=$this->m->eacharticle($value);
	}
	$data=[
		'bararticle'=>$each,
		'barcategory'=>$this->m->eachcategory(),
		'bardate'=>$this->m->eachdate(),
		'number'=>$this->m->article(null,$where)->num_rows(),];
	$data['pagination']=$this->m->pagination(base_url('index/category/'.$category),$data['number']);
	$this->template->load('home-recruitment','blog-articles-cards-sidebar',$data);
}
public function date($year='',$month='')
{
	# code...
	$page=intval($this->input->get('page'));
	$where=['year(modified)'=>$year,'month(modified)'=>$month,];
	$query=$this->m->paginatearticle($page,null,$where)->result_array();
	foreach ($query as $key => $value) {
		# code...
		$each.=$this->m->eacharticle($value);
	}
	$data=[
		'bararticle'=>$each,
		'barcategory'=>$this->m->eachcategory(),
		'bardate'=>$this->m->eachdate(),
		'number'=>$this->m->article(null,$where)->num_rows(),];
	$data['pagination']=$this->m->pagination(base_url('index/date/'.$year.'/'.$month.''),$data['number']);
	$this->template->load('home-recruitment','blog-articles-cards-sidebar',$data);
}
public function login($value='')
{
	# code...
	if ($this->session->userdata('login')==true) {
		# code...
		redirect('backend');
	}
	if (isset($_POST['submit'])) {
		# code...
		$this->m->loginrules();
		if ($this->form_validation->run()==true) {
			# code...
			$input=array(
				'password'=>md5($this->input->post('npassword',true)),
				'username'=>$this->input->post('nusername',true),);
			$query=$this->db->get_where('user',$input)->row_array();
			if (count($query)>0) {
				# code...
				$user=array(
					'login'=>true,
					'name'=>$query['name'],
					'username'=>$query['username'],);
				$this->session->set_userdata($user);
				redirect('backend');
			} else {
				# code...
				$this->m->bgerror();
				redirect('index/login');
			}
		}
	}
	$this->load->view('page-accounts-create-2');
}
public function login2($value='')
{
	# code...
	$password=$this->input->post('npassword',true);
	$username=$this->input->post('nusername',true);
	if ($this->session->userdata('login')==true) {
		# code...
		redirect('backend');
	}
	if (isset($_POST['submit'])) {
		# code...
		if ($password=='password'&&$username=='username') {
			# code...
			$this->session->set_userdata(array(
				'level'=>1,
				'login'=>true,
				'username'=>'username',));
			redirect('backend');
		} else {
			# code...
			$this->m->bgerror();
			redirect('index/login2');
		}
	}
	$this->load->view('page-accounts-create-2');
}
public function logout($value='')
{
	# code...
	if ($this->session->userdata('login')==true) {
		# code...
		$this->session->unset_userdata(array('login','name','username'));
		$this->session->sess_destroy();
	}
	redirect(base_url('index/login'));
}
public function read($id='')
{
	# code...
	$idarticle=$this->m->article(null,array('idarticle'=>$id));
	if ($idarticle->num_rows()>0) {
		# code...
		foreach ($idarticle->result_array() as $key => $value) {
			# code...
			$article.=$this->m->articleread($value);
		}
		$data=[
			'numcomment'=>$this->db->get_where('comment',array('commentarticle'=>$id))->num_rows(),
			'row'=>$idarticle->row(),
			'bararticle'=>$article,
			'barcomment'=>$this->m->comment($id),];
	}
	if (isset($_POST['submit'])) {
		# code...
		$input=array(
			'commentarticle'=>$this->input->post('ncommentarticle',true),
			'name'=>$this->input->post('nname',true),
			'email'=>$this->input->post('nemail',true),
			'comment'=>$this->input->post('ncomment',true),
			'idparent'=>$this->input->post('nidparent',true),);
		$this->db->insert('comment',$input);
		redirect(base_url('index/read/'.$id.''));
	}
	$this->template->load('home-recruitment','blog-post-video-single',$data);
}
public function profile($value='')
{
	# code...
	$this->template->load('home-recruitment','page-accounts-profile');
}

}
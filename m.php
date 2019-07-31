<?php
/**
 * 
 */
class m extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
        $this->perpage=2;
	}
public function article($search=null,$where=null)
{
    # code...
    $this->db->select('*')->from('article')->join('category','article.articlecategory=category.idcategory')->join('user','article.articleusername=user.iduser');
    if ($search!=null) {
        # code...
        $this->db->like('title',$search)->or_like('article',$search);
    }
    if ($where!=null) {
        # code...
        $this->db->where($where);
    }
    $this->db->order_by('modified','desc');
    return $this->db->get();
}
public function articleread($value='')
{
    # code...
    return  $each.='<article>
                                <div class="article__title text-center">
                                    <h1 class="h2">'.ucfirst($value['title']).'</h1>
                                    <span>'.date('M jS Y',strtotime($value['modified'])).' in </span>
                                    <span>
                                        <a href="'.base_url('index/category/'.$value['category']).'">'.ucfirst($value['category']).'</a>
                                    </span>
                                </div>
                                <!--end article title-->
                                <div class="article__body">
                                    <img alt="Image" src="'.base_url($value['photo']).'" />
                                    '.$value['article'].'
                                </div>
                                <div class="article__share text-center">
                                    <a class="btn bg--facebook btn--icon" href="#">
                                        <span class="btn__text">
                                            <i class="socicon socicon-facebook"></i>
                                            Share on Facebook
                                        </span>
                                    </a>
                                    <a class="btn bg--twitter btn--icon" href="#">
                                        <span class="btn__text">
                                            <i class="socicon socicon-twitter"></i>
                                            Share on Twitter
                                        </span>
                                    </a>
                                </div>
                            </article>';
}
public function bgerror($value='')
{
    # code...
    return $this->session->set_flashdata('message','<div class="alert bg--error">
                                <div class="alert__body">
                                    <span>Invalid Username or Password</span>
                                </div>
                                <div class="alert__close">&times;</div>
                            </div>');
}
public function comment($id)
{
    # code...
    $storeid=array();
    $idparent=$this->m->commentcommentarticle($id);
    foreach ($idparent as $key => $value) {
        # code...
        array_push($storeid,$value['idparent']);
    }
    return $this->commentresult(0,$id,$storeid);
}
public function commentcommentarticle($id)
{
    # code...
    $this->db->select('*')->from('comment')->where('commentarticle',$id);
    $query=$this->db->get()->result_array();
    foreach ($query as $key => $value) {
        # code...
        $data[]=$value;
    }
    return $data;
}
public function commentresult($parent,$id,$storeid)
{
    # code...
    if (in_array($parent,$storeid)) {
        # code...
        $result=$this->m->commentidparent($id,$parent);
        
        foreach ($result as $key => $value) {
            # code...
            $html.=$parent==0?'<ul class="comments__list">
                                    <li>':'';
            $html.='<div class="comment">
                                            <div class="comment__avatar">
                                                <img alt="Image" src="'.base_url('Stack 2.0.6/img/avatar-round-3.png').'" />
                                            </div>
                                            <div class="comment__body">
                                                <h5 class="type--fine-print">'.$value['name'].'</h5>
                                                <div class="comment__meta">
                                                    <span>'.date('jS M Y',strtotime($value['created'])).'</span>
                                                    <a href="#comment_form123" class="reply" id="'.$value['idcomment'].'">Reply</a>
                                                </div>
                                                <p>
                                                    '.$value['comment'].'
                                                </p>
                                            </div>
                                        </div>';
            $html.=$this->commentresult($value['idcomment'],$id,$storeid);
            $html.=$parent==0?'</li>
                                </ul>':'';
        }
    }
    return $html;
}
public function commentidparent($id,$parent)
{
    # code...
    $this->db->select('*')->from('comment')->where(array('commentarticle'=>$id,'idparent'=>$parent,));
    $query=$this->db->get()->result_array();
    foreach ($query as $key => $value) {
        # code...
        $data[]=$value;
    }
    return $data;
}
public function eacharticle($value='')
{
    # code...
    return $each='<div class="masonry__item col-md-6">
                                        <article class="feature feature-1">
                                            <a href="#" class="block">
                                                <img alt="Image" src="'.base_url('Stack 2.0.6/img/blog-2.jpg').'" />
                                            </a>
                                            <div class="feature__body boxed boxed--border">
                                                <span>'.date('M jS Y',strtotime($value['modified'])).'</span>
                                                <h5>'.ucfirst($value['idarticle']).'</h5>
                                                <a href="'.base_url('index/read/'.$value['idarticle'].'/'.url_title($value['title'])).'">
                                                    Read More
                                                </a>
                                            </div>
                                        </article>
                                    </div>';
}
public function eachcategory($value='')
{
    # code...
    $query=$this->db->get('category')->result_array();
    foreach ($query as $key => $value) {
        # code...
        $each.='<li>
                                            <a href="'.base_url('index/category/'.$value['category']).'">'.ucfirst($value['category']).'</a>
                                        </li>';
    }
    return $each;
}
public function eachdate($value='')
{
    # code...
    $this->db->distinct()->select('*')->from('article')->group_by('year(modified),month(modified)')->order_by('modified','desc');
    $query=$this->db->get()->result_array();
    foreach ($query as $key => $value) {
        # code...
        $each.='<li>
                                            <a href="'.base_url('index/date/'.date('Y/m',strtotime($value['modified']))).'">'.date('M Y',strtotime($value['modified'])).'</a>
                                        </li>';
    }
    return $each;
}
public function loginrules($value='')
{
    # code...
    $this->form_validation->set_rules('nusername','username','required|xss_clean');
    $this->form_validation->set_rules('npassword','password','required|xss_clean');
    $this->form_validation->set_error_delimiters('<div class="alert bg--error">
                                <div class="alert__body">','</div>
                                <div class="alert__close">&times;</div>
                            </div>');
}
public  function offset($offset)
{
    # code...
    if (is_null($offset)||empty($offset)) {
        # code...
        $offset=0;
    } else {
        # code...
        $offset=($offset*$this->perpage)-$this->perpage;
    }
    return $offset;
}
public function paginatearticle($offset,$search=null,$where=null)
{
    # code...
    $this->db->limit($this->perpage,$this->offset($offset));
    return $this->article($search,$where);
}
public function pagination($url,$number)
{
    # code...
    $config=[
        'page_query_string'=>true,
        'query_string_segment'=>'page',
        'base_url'=>$url,
        'first_link'=>'first',
        'last_link'=>'last',
        'next_link'=>'&raquo',
        'prev_link'=>'&laquo',
        'full_tag_open'=>'<div class="pagination"><ol>',
        'full_tag_close'=>'</ol></div>',
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>'<li class="pagination__current">',
        'cur_tag_close'=>'</li>',
        'next_tag_open'=>'<li>',
        'next_tag_close'=>'</li>',
        'prev_tag_open'=>'<li>',
        'prev_tag_close'=>'</li>',
        'first_tag_open'=>'<li>',
        'first_tag_close'=>'</li>',
        'last_tag_open'=>'<li>',
        'last_tag_close'=>'</li>',
        'num_links'=>2,
        'per_page'=>$this->perpage,
        'total_rows'=>$number,
        'use_page_numbers'=>true,];
    $this->pagination->initialize($config);
    return $this->pagination->create_links();
}
public function visitor($value='')
{
    # code...
    if ($this->agent->is_browser()) {
        # code...
        $agent=$this->agent->browser();
    } elseif ($this->agent->is_robot()) {
        # code...
        $agent=$this->agent->robot();
    } elseif ($this->agent->is_mobile()) {
        # code...
        $agent=$this->agent->is_mobile();
    } else {
        # code...
        $agent='Unidentified User Agent';
    }
    $count=$this->db->get_where('visitor',array('platform'=>$agent));
    $input['visitor']=$this->db->set('visitor',($count->row()->visitor+1));
    $input=array('platform'=>$agent,);
    if ($count->num_rows()>0) {
        # code...
        return $this->db->where('platform',$agent)->update('visitor',$input);
    } else {
        # code...
        return $this->db->insert('visitor',$input);
    }
}
}
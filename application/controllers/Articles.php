<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 * On liste les articles
	 *
	 */
	public function index()
	{
		// $this->load->model('article');
		$all_data = $this->article->get_data();
		// var_dump($all_data);
		foreach ($all_data as $data){
		  $this->load->view('vue_articles', $data);
		 }
		/**
	 * Ne pas faire d 'echo dans  le controller, il faut le faire dans view voir vue_article
	 */
		// echo 'Articles de kiwii';
		$this->load->view('liste_articles');
	}


	public function view($id)
	{
	$this->article->article_id =$id;
	$this->article->load();

	$this->load->view('vue_articles', $this->article);
	}


//-------------------- exemple de function add (1)-----------------
	// public function add()
	// {

		// $this->article->article_name = 'Mon deuxième article(num:' . rand(1, 1000)  . ')';
		// $this->article->article_body = 'Mon deuxième article est extraordinaire';
		//$this->article->article_modified = date('Y-m-d H:i:s');
		//$this->article->article_created = date('Y-m-d H:i:s');
		// $this->article->article_id = $this->article->save();

		// $this->article->save();
	// }
//--------------------------------------------------------------------
	public function add(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'article_name',
			'"Titre de l\'article"',
			'trim|required|min_length[3]',
			'trim|required|max_lenght[40]',
			array(
				'required'=>'Le titre est requis'
			)
		);
		$this->form_validation->set_rules(
			'article_body',
			'"Contenu de l\'article"',
			'trim|required|min_length[40] |callback_validate_body'
		);
			$this->form_validation->set_error_delimiters('<div style="color:red; ">', '</div>');

		if ($this->form_validation->run()) {
			$this->load->view('article_form_success');
		}else{

			$this->load->view('article_form');
		}

	}
	public function validate_body($input){
if (preg_match('/href/', $input)){
	$this->form_validation->Set_message('validate_body', 'Les liens ne sont pas autorisés');
	return FALSE;
}
return TRUE;
	}
	public function delete ($id){
		$this->article->article_id = $id;
		$this->article->delete();
	}
	public function calendar ($id){

		$this->article->article_id = $id;
		$this->article->load();

		$expl = explode('-', $this->article->article_modified);
		$data =array(
			$expl [2] => $this->config->base_url() . 'articles/view/' . $id
		);

		$this->load->library('calendar');
		echo $this->calendar->generate($expl [0], $expl [1], $data);
	}
}

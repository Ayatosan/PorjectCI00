<?php

class Fruits extends CI_Controller {


	public function view(){
		$this->load->model('fruit');
		$datafruit = $this->fruit->get_datakiwi();
		$this->load->view('vue_fruit', $datafruit);

  }


}

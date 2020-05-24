<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');

		$html = $this->output->get_output();

		$this->load->library('pdf');

		$this->dompdf->loadHtml($html);

		$this->dompdf->setPaper('A4','portair');

		$this->dompdf->render();

		$this->dompdf->stream('Cart.pdf',array('Attachment'=>0));




	}
}

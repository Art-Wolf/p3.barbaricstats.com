<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_chat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper(array('url'));
		$this->load->database();
		$this->load->model('chat_model');
		$data['chat'] = $this->chat_model->get_latest();
 
		$this->load->view('ajax_chat_box', $data);
	}

	public function submit()
	{
		$this->load->helper(array('form','url'));
		$this->load->database();

		$data = array (	'chat.username' => 'Test',
				'chat.message' => set_value('chat-message')
		);

		$this->load->model('chat_model');
		$this->chat_model->insert($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

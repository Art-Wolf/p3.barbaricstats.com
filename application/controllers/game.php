<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends CI_Controller {

	 public function __construct() {
                parent::__construct();

                if (is_null($this->session->userdata('current_page'))) {
                        $this->session->set_userdata('previous_page', 'public_main');
                } else {
                        $this->session->set_userdata('previous_page', $this->session->userdata('current_page'));
                }

                $this->session->set_userdata('current_page', substr($_SERVER['REQUEST_URI'],1));
        }

	public function lobby()
	{
		$this->load->helper(array('form','url'));
		$this->load->database();

		$this->load->view('header');

		$this->load->model('game_model');
		$data['game_list'] = $this->game_model->staging_games();

		$this->load->view('game_lobby', $data);
		$this->load->view('footer');
	}

	public function join($game_id)
	{
		$this->load->helper(array('form','url'));
                $this->load->database();

                $this->load->view('header');

                $this->load->model('game_model');

		$form_data = array ( 'game.id'=> $game_id,
				'game.userid' => $this->session->userdata('user_id'));

		$check = 0; // $this->game_model->check_game($form_data);

		if ($check == 0)
		{
			$form_data = array ( 'game.id'=> $game_id,
                                'game.end_time' => null,
                                'game.userid' => $this->session->userdata('user_id'));
                	$this->game_model->join_game($form_data);
		}

		$this->session->set_userdata('game_id', $game_id);

		$form_data = array ( 'game.id'=> $game_id );
		$data['game_info'] = $this->game_model->game_details($form_data);

                $this->load->view('game_center', $data);
                $this->load->view('footer');	
	}

	public function create()
	{
		$this->load->helper(array('form','url'));
                $this->load->database();

                $this->load->view('header');

                $this->load->model('game_model');

                $form_data = array (
                                'game.end_time' => null,
                                'game.userid' => $this->session->userdata('user_id'));

                $this->game_model->join_game($form_data);

		$game_id = $this->game_model->get_latest_game($form_data);

                $this->session->set_userdata('game_id', $game_id[0]->id);

                $form_data = array ( 'game.id'=> $game_id[0]->id );
                $data['game_info'] = $this->game_model->game_details($form_data);

                $this->load->view('game_center', $data);
                $this->load->view('footer');
	}


	public function chat_message()
        {
                $this->load->helper(array('form','url'));
                $this->load->database();

                if($this->session->userdata('user_name')) {
                        $data = array ( 'chat.game_id'=> $this->session->userdata('game_id'),
					'chat.username' => $this->session->userdata('user_name'),
                                        'chat.message' => set_value('chat-message')
                        );
                }
                $this->load->model('chat_model');
                $this->chat_model->game_insert($data);
        }

	public function chat()
	{
		$this->load->helper(array('url'));
                $this->load->database();
                $this->load->model('chat_model');
		$form_data = array('chat.game_id' => $this->session->userdata('game_id'));
                $data['chat'] = $this->chat_model->get_game_latest($form_data);

                $this->load->view('ajax_chat_box', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

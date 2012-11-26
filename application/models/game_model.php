<?php
class Game_model extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		$this->db->escape($data);

		$this->db->insert('chat', $data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		} 

		return FALSE;
	}

	function check_game($data)
	{
		$this->db->escape($data);

		$this->db->select('COUNT(*) cnt');
		$this->db->from('game');
		$this->db->where($data);

		return $this->db->get()->result();
	}

	function join_game($data)
	{
		$this->db->escape($data);

		$update = array( 'game.end_time' => 'CURRENT_TIMESTAMP()');
		$this->db->where('game.end_time IS NULL and game.userid = ' . $data['game.userid']);
		$this->db->update('game', $update);


		$update = array( 'game.end_time' => NULL);
		$this->db->where('game.id = ' . $data['game.id'] . ' AND game.userid = ' . $data['game.userid']);
		$this->db->update('game', $update);
 
		if ($this->db->affected_rows() == '0')
                {
			$this->db->insert('game', $data);
                }
	}

	function get_latest_game($data)
	{
		$this->db->escape($data);

		$this->db->select('game.id');
		$this->db->from('game');
		$this->db->where($data);

		return $this->db->get()->result();
	}

	function game_details($data)
	{
		$this->db->escape($data);

		$this->db->select('game.userid, users.user_name, users.photo');
		$this->db->from('game');
		$this->db->join('users', 'game.userid = users.id');
		$this->db->where($data);

		return $this->db->get()->result();
	}

	function staging_games()
	{
		$this->db->select('game.id, COUNT(*) cnt');
		$this->db->from('game');
		$this->db->where('game.end_time IS NULL');
		$this->db->group_by('game.id');

		return $this->db->get()->result();
	}

	function get_latest()
	{
		$this->db->select('chat.username, chat.timestamp, chat.message');
		$this->db->from('chat');
		$this->db->limit(50);
		$this->db->order_by('chat.id', 'desc');

		return $this->db->get()->result();
	}
}
?>

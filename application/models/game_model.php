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

	function staging_games()
	{
		$this->db->select('game.id, game.start_time, COUNT(*) cnt');
		$this->db->from('game');
		$this->db->where('game.end_time IS NULL');
		$this->db->group_by('game.id, game.start_time');

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

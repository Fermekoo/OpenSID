<?php

class Notif_model extends CI_Model {

	public function komentar_baru()
	{
		$num_rows = $this->db->where('id_artikel !=', LAPORAN_MANDIRI)
			->where('status', 2)
			->get('komentar')->num_rows();
		return $num_rows;
	}

	public function inbox_baru()
	{
		$num_rows = $this->db->where("id_artikel", LAPORAN_MANDIRI)
			->where('status', 2)
			->get('komentar')->num_rows();
		return $num_rows;
	}

}

?>
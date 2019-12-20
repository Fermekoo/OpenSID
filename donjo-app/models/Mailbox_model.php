<?php class Mailbox_model extends CI_Model {

	/**
	 * Gunakan model ini untuk memindahkan semua method terkait laporan layanan mandiri.
	 * Saat ini laporan layanan mandiri masih bercampur dengan komentar artikel, dan
	 * seharusnya dipisah.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('referensi_model');
		
	}

	public function insert($data)
	{
		$data = $data;
		$data['id_artikel'] = 775;
		$data['tgl_upload'] = date('Y-m-d H:i:s');
		$data['updated_at'] = date('Y-m-d H:i:s');
		$outp = $this->db->insert('komentar', $data);
		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
	}

	public function list_menu()
	{
		return $this->referensi_model->list_kode_array(KATEGORI_MAILBOX);
	}

	public function get_kat_nama($kat)
	{
		$sub_menu = $this->list_menu();	
		$data = $sub_menu[$kat];
		return $data;
	}


}
?>

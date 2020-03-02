<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {
	
	public function check_credential($username,$password){

		$query = $this->db->get_where('user', array('username' => $username,'password' => $password));
		return $query->result();
	}
	public function isi_evaluasi($data_pesan){
		//Quert insert into
		$this->db->insert('cc_program_feedback', $data_pesan);
	}

	public function program() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM cc_program order by status ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    function bobot(){
		return $this->db->get('bobot');
	}
    
    public function get_unit_spec($unit){
        $hasil = $this->db->query("SELECT * FROM unit WHERE kode_unit='$unit'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_evaluasi_count($status, $bulan, $lokasi){
        $hasil = $this->db->query("SELECT b.kode_lokasi, COUNT(a.input_id) as Jumlah FROM cc_program_eval a JOIN unit b ON a.input_user_c = b.kode_unit WHERE a.input_status = $status AND input_bulan = '$bulan' AND b.kode_lokasi = '$lokasi' GROUP BY b.kode_lokasi ORDER BY b.kode_lokasi ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_evaluasi_COC($status, $bulan){
        $hasil = $this->db->query("SELECT COUNT(a.input_id) as Jumlah FROM cc_program_eval a JOIN unit b ON a.input_user_c = b.kode_unit WHERE a.input_status = $status AND a.input_bulan = '$bulan'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function program_eval_viwe($bulan){

		$hasil = $this->db->query("select * from (cc_program_eval a JOIN cc_program_input b on a.input_user_c=b.input_user AND b.input_detail=a.input_detail_c) JOIN unit c on c.kode_unit = a.input_user_c  where input_status=5 AND input_bulan = '$bulan'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function program_eval_vive($bulan){

		$hasil = $this->db->query("select * from (cc_program_eval a JOIN cc_program_input b on a.input_user_c=b.input_user AND b.input_detail=a.input_detail_c) JOIN unit c on c.kode_unit = a.input_user_c  where input_status=1 AND input_bulan = '$bulan'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
     public function history_data($unit){

		$hasil = $this->db->query("select a.input_score, a.input_id, a.input_user_c, a.input_realisasi_, a.input_metodologi, a.input_reinforcement_positif, a.input_reinforcement_negatif, a.last_modified_c, a.input_detail_c, a.input_status, b.fb_content, b.last_modified, b.feedback_status from cc_program_eval a RIGHT JOIN cc_program_feedback b ON a.input_id=b.fb_id WHERE a.input_user_c = '$unit' ORDER BY a.last_modified_c DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function get_unit_score($unit){
        $hasil = $this->db->query("SELECT sum(input_score) as total_score FROM `cc_program_eval` WHERE input_user_c = '$unit' GROUP BY input_user_c");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress(){
        $hasil = $this->db->query("SELECT * FROM cc_program_overall");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_pembantu(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KCP'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_syariahh(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KCS' OR cc_lokasi='KCPS'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    public function get_progress_cabang(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KC' OR cc_lokasi='KCP' OR cc_lokasi='KK'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    
    public function get_progress_utama(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KC'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_syariah(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KCS'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_dir(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='Divisi'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_kk(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KK'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_kcps(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall WHERE cc_lokasi='KCPS'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_corporate(){
        $hasil = $this->db->query("SELECT AVG(progress) AS progress FROM cc_program_overall");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_direktorat(){
        $hasil = $this->db->query("SELECT cc_dir, AVG(progress) AS progress FROM cc_program_overall GROUP BY cc_dir");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_divisi(){
        $hasil = $this->db->query("SELECT a.unit_id, a.kode_unit, a.nama_unit, b.cc_lokasi, b.progress AS progress FROM `unit` a JOIN `cc_program_overall` b ON a.kode_unit = b.cc_unit WHERE b.cc_lokasi='Divisi' ORDER BY a.nama_unit ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_divisiOverall(){
        $hasil = $this->db->query("SELECT a.kode_dir, AVG(b.progress) AS progress FROM `unit` a JOIN `cc_program_overall` b ON a.kode_unit = b.cc_unit WHERE b.cc_lokasi='Divisi' GROUP BY a.kode_dir ORDER BY a.nama_unit ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_avgdivisi(){
        $hasil = $this->db->query("SELECT AVG (b.progress) AS progress FROM `unit` a JOIN `cc_program_overall` b ON a.kode_unit = b.cc_unit WHERE b.cc_lokasi='Divisi' ORDER BY a.nama_unit ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_($gol){
        $hasil = $this->db->query("SELECT a.unit_id, a.kode_unit, a.nama_unit, b.cc_lokasi, b.progress AS progress FROM `unit` a JOIN `cc_program_overall` b ON a.kode_unit = b.cc_unit WHERE b.cc_lokasi='$gol' ORDER BY a.nama_unit ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_progress_avg($gol){
        $hasil = $this->db->query("SELECT AVG (b.progress) AS progress FROM `unit` a JOIN `cc_program_overall` b ON a.kode_unit = b.cc_unit WHERE b.cc_lokasi='$gol' ORDER BY a.nama_unit ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_gol_($gol){
        $hasil = $this->db->query("SELECT `kode_dir` FROM `unit` WHERE `kode_lokasi`='$gol' GROUP BY `kode_dir` ORDER BY `kode_dir` ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    public function get_score_divisi(){
        $hasil = $this->db->query("SELECT kode_unit, nama_unit, total_score FROM total_score WHERE kode_dir='2'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
    }
    
    
    public function leaderAll(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit GROUP BY a.input_user_c ORDER BY total_score  DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function leaderbym($bulan){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where a.input_bulan = '$bulan' GROUP BY a.input_user_c ORDER BY total_score  DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function leaderKC(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KC' GROUP BY a.input_user_c ORDER BY total_score DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
     public function leaderKCP(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KCP' GROUP BY a.input_user_c ORDER BY total_score DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
     public function leaderKCS(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KCS' GROUP BY a.input_user_c ORDER BY total_score DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
     public function leaderKCPS(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KCPS' GROUP BY a.input_user_c ORDER BY total_score DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
     public function leaderKK(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KK' GROUP BY a.input_user_c ORDER BY total_score DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
     public function leaderDV(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'Divisi' GROUP BY a.input_user_c ORDER BY total_score DESC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
     public function botall(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function botKC(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KC' GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function botKCP(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KCP' GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function botKCS(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KCS' GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function botDV(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'Divisi' GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function botKCPS(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KCPS' GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function botKK(){
		$havewarrior = $this->db->query("SELECT b.kode_unit, b.nama_unit, SUM(a.input_score) as total_score FROM `cc_program_eval` a JOIN unit b ON a.input_user_c = b.kode_unit Where b.kode_lokasi = 'KK' GROUP BY a.input_user_c ORDER BY total_score ASC");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}

	public function update_evaluasi_eval($id,$data) {
		//Query update from ... where id = ...
		$this->db->where('input_id', $id)
				 ->update('cc_program_eval', $data);
	}
     public function update_bobot($id,$data_bobot) {
		//Query update from ... where id = ...
		$this->db->where('id', $id)
				 ->update('bobot', $data_bobot);
	}
        
    public function update_program($id,$data_penilaian2) {
		//Query update from ... where id = ...
		$this->db->where('cc_id', $id)
				 ->update('cc_program', $data_penilaian2);
	}

	public function delete_program($id) {
		//Query delete ... where id=...
		$this->db->where('cc_id', $id)
				 ->delete('cc_program');
	}
    
    public function delete_feedback($id) {
		//Query delete ... where id=...
		$this->db->where('fb_id', $id)
				 ->delete('cc_program_feedback');
	}

	public function listuser() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.iduser, a.username, a.password, b.kode_dir, b.nama_unit FROM `user` a JOIN `unit` b on a.iduser=b.unit_id WHERE a.role=1 GROUP BY a.iduser ORDER BY a.iduser ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function tambah_program2($data_penilaian2){
		//Quert insert into
		$this->db->insert('cc_program', $data_penilaian2);
	}
    
	public function tambah_user($table, $data_user){
		//Quert insert into
		$this->db->insert($table, $data_user);
	}
	public function update_user($id,$data_penilaian2){
		//Quert insert into
		
		//print_r($time);exit();
		$insertData = array($data_penilaian2['username'],$data_penilaian2['password']);
		//print_r($insertData);exit();
		$this->db->query("update user set username=?,password=? where iduser=$id", $insertData);
/*		$this->db->insert('tb_penilaian2', $data_penilaian2,"",$rata);*/
	}
	public function delete_user($id) {
		//Query delete ... where id=...
		$this->db->where('iduser', $id)
				 ->delete('user');
	}

	public function listjakarta1() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select * from (SELECT * FROM ca_performance_upload JOIN unit on ca_performance_upload.unit_name=unit.kode_unit where ca_performance_upload.kode='5')a LEFT JOIN cc_program_input b where a.kode_unit=b.input_user");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listjakarta() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM ca_performance_upload a LEFT JOIN unit b ON a.unit_name=b.kode_unit where kode=5");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}

	public function listkalimantan() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM ca_performance_upload a LEFT JOIN unit b ON a.unit_name=b.kode_unit where kode=4");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listho() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM ca_performance_upload a LEFT JOIN unit b ON a.unit_name=b.kode_unit where kode=1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listsumatra() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM ca_performance_upload a LEFT JOIN unit b ON a.unit_name=b.kode_unit where kode=2");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listjawa() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM ca_performance_upload a LEFT JOIN unit b ON a.unit_name=b.kode_unit where kode=3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	
    public function simpanwarrior($rowData){
            $data = array(
            	'nopeg' => $rowData['0'][0],
                'unit' => $rowData['0'][1],
                'direktorat' => $rowData['0'][2],
                'status_aktif' => $rowData['0'][3],
                'email' => $rowData['0'][4]
            );
		//Query insert into
		$this->db->replace('baru_warrior', $data);
	}

	public function simpantibwarrior($rowData){
            $data = array(
            	'nopeg' => $rowData['0'][0],
                'posisi' => $rowData['0'][1],
                'unit' => $rowData['0'][2],
                'direktorat' => $rowData['0'][3],
                'status_aktif' => $rowData['0'][4],
                'email' => $rowData['0'][5]
            );
		//Query insert into
		$this->db->replace('baru_tim_implementasi_budaya', $data);
	}
	public function warrior(){
		$hasil = $this->db->query("SELECT * FROM baru_warrior join unit on baru_warrior.unit = unit.kode_unit");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function booster(){
		$hasil = $this->db->query("SELECT * FROM baru_booster join unit on baru_booster.unit = unit.kode_unit");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function nilai($wil, $bulan){
		$hasil = $this->db->query("SELECT * FROM cc_program_eval JOIN cc_program_input on cc_program_eval.input_user_c=cc_program_input.input_user  and cc_program_input.input_detail=cc_program_eval.input_detail_c join unit on cc_program_eval.input_user_c = unit.kode_unit where cc_program_eval.input_status=5 AND unit.kode_lokasi ='$wil' AND cc_program_eval.input_bulan = '$bulan' ORDER BY cc_program_eval.last_modified_c DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function download($id){
		$hasil = $this->db->query("SELECT * FROM cc_program_eval JOIN cc_program_input on cc_program_eval.input_user_c=cc_program_input.input_user  and cc_program_input.input_detail=cc_program_eval.input_detail_c where cc_program_eval.input_id=".$id." ORDER BY cc_program_eval.last_modified_c DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function update_evaluasi($id, $data_program) {
		//Query update from ... where id = ...
		$this->db->where('input_id', $id)
				 ->update('cc_program_eval', $data_program);
	}

	public function tambah_warrior($data_warrior){
		//Quert insert into
		$this->db->insert('baru_warrior', $data_warrior);
	}
    
    public function tambah_booster($data_booster){
		//Quert insert into
		$this->db->insert('baru_booster', $data_booster);
	}

	public function update_warrior($id,$data_warrior){
		$insertData = array($data_warrior['nopeg'],$data_warrior['unit'],$data_warrior['direktorat'],$data_warrior['status_aktif'],$data_warrior['email']);
		$this->db->query("update baru_warrior set nopeg=?,unit=?,direktorat=?,status_aktif=?,email=? where nopeg=$id", $insertData);
	}

	public function delete_warrior($id) {
		//Query delete ... where id=...
		$this->db->where('nopeg', $id)
				 ->delete('baru_warrior');
	}
    
    public function update_booster($id,$data_booster){
		//Query update from ... where id = ...
		$this->db->where('nopeg', $nopeg)
				 ->update('baru_booster', $data_booster);
	}

	public function delete_booster($id) {
		//Query delete ... where id=...
		$this->db->where('nopeg', $id)
				 ->delete('baru_booster');
	}

	public function tib(){
		$hasil = $this->db->query("SELECT * FROM baru_tim_implementasi_budaya join unit on baru_tim_implementasi_budaya.unit = unit.kode_unit");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function tambah_tib($data_warrior){
		//Quert insert into
		$this->db->insert('baru_tim_implementasi_budaya', $data_warrior);
	}

	public function update_tib($id,$data_warrior){
		$insertData = array($data_warrior['nopeg'],$data_warrior['posisi'],$data_warrior['unit'],$data_warrior['direktorat'],$data_warrior['status_aktif'],$data_warrior['email']);
		$this->db->query("update baru_tim_implementasi_budaya set nopeg=?,posisi=?,unit=?,direktorat=?,status_aktif=?,email=? where nopeg=$id", $insertData);
	}

	public function delete_tib($id) {
		//Query delete ... where id=...
		$this->db->where('nopeg', $id)
				 ->delete('baru_tim_implementasi_budaya');
	}
    
    public function add_feedback($data_feedback) {
		//Quert insert into
		$this->db->insert('cc_program_feedback', $data_feedback);
	}
    
    public function hitungperbulan($table, $m){
		$hasil = $this->db->query("SELECT * FROM $table WHERE Month(`aktif_start`) = $m");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function hitungall($table){
		$hasil = $this->db->query("SELECT * FROM $table ");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function hitungwhere($table, $where, $what){
		$hasil = $this->db->query("SELECT * FROM $table where $where = '$what'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function lateeval(){
		$hasil = $this->db->query("SELECT * FROM cc_program_eval JOIN cc_program_input on cc_program_eval.input_user_c=cc_program_input.input_user and cc_program_input.input_detail=cc_program_eval.input_detail_c join unit on cc_program_eval.input_user_c = unit.kode_unit where cc_program_eval.input_tanggal > 26 ORDER BY cc_program_eval.last_modified_c DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    
    public function blbbt2($id){

		$hasil = $this->db->query("SELECT * FROM `cc_program_eval` WHERE `input_id` = '$id'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function jmlh_ngumpulin($bulan){
        $year = date("Y");
		$hasil = $this->db->query("SELECT categoryunit.id as id, categoryunit.nama as nama, categoryunit.jumlah_unit as jumlah_unit, COUNT(DISTINCT(unit.kode_unit)) as jumlah_ngumpulin FROM `categoryunit` JOIN unit on categoryunit.id = unit.kode_lokasi JOIN cc_program_eval ON cc_program_eval.input_user_c = unit.kode_unit JOIN cc_program_input on cc_program_eval.input_user_c=cc_program_input.input_user and cc_program_input.input_detail=cc_program_eval.input_detail_c where cc_program_eval.input_bulan = '$bulan' AND cc_program_eval.input_tahun = '$year' GROUP BY categoryunit.id");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function hitunglate($bulan){
        $year = date("Y");
		$hasil = $this->db->query("SELECT cc_program_eval.input_bulan, COUNT(cc_program_eval.input_id) AS jumlah FROM cc_program_eval where cc_program_eval.input_tanggal > 26  AND cc_program_eval.input_bulan = '$bulan' AND cc_program_eval.input_tahun = '$year' GROUP BY cc_program_eval.input_bulan");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
    
    public function catunitall(){
		$hasil = $this->db->query("SELECT * FROM `categoryunit`");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
}
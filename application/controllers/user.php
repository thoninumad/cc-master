<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if(!$this->session->userdata('username') || $this->session->userdata('role')!=1 ){
				$this->session->set_flashdata('error','Maaf anda belum log in');	
				redirect('login');			
			}
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->library('image_lib');
        $this->load->library('form_validation');
		$this->load->model('model_users');
		$this->load->model('model_users1');
		$this->load->model('model_admin');
		$this->load->model('model_chart');
	}
	public function index()
	{
        $unit = $this->session->userdata('username');
        $data['unit'] = $this->model_users->get_unit($this->session->userdata('username'));
		$data['program'] = $this->model_users->program($this->session->userdata('username'));
        $data['nilai'] = $this->model_users->program_nilai($this->session->userdata('username'));
//        update progress
        $progress['get_progress'] = $this->model_users->get_progress($this->session->userdata('username'));
		foreach ($progress['get_progress'] as $s) {
             $data_progress = array(
								'progress'			=> $s->rata
						);
			 $this->model_users->progressing($s->unit, $data_progress);
		}
//        update score
        $bobot['bobot'] = $this->model_admin->bobot()->result();
		foreach ($bobot['bobot'] as $b) {
            $b1 = $b->bobot1;
            $b2 = $b->bobot2;
            $b3 = $b->bobot3;
            $b4 = $b->bobot4;
            $b5 = $b->bobot5;
            $b6 = $b->bobot6;
            foreach ($data['nilai'] as $nb) {
                $nb1 = $nb->nilai_bobot1;
                $nb2 = $nb->nilai_bobot2;
                $nb3 = $nb->nilai_bobot3;
                $nb4 = $nb->nilai_bobot4;
                $nb5 = $nb->nilai_bobot5;
                $nb6 = $nb->nilai_bobot6;
                
                $n1 = round(($nb1*$b1)/100);
                $n2 = round(($nb2*$b2)/100);
                $n3 = round(($nb3*$b3)/100);
                $n4 = round(($nb4*$b4)/100);
                $n5 = round(($nb5*$b5)/100);
                $n6 = round(($nb6*$b6)/100);
                
                $totalscore = $n2+$n3+$n4+$n5+$n6;
                $data_nilai = array(
                    'total_score'		=> $totalscore 
                );
                $this->model_users->update_nlbobot($unit, $data_nilai);
            }
        }
        
		$this->load->view('user/index_user',$data);
	}
    
    public function anggota_view()
	{
        $data['program'] = $this->model_users->program($this->session->userdata('username'));
        $data['unit'] = $this->model_users->get_unit($this->session->userdata('username'));
		$data['anggota']=$this->model_users->timbudaya($this->session->userdata('username'));
        $data['booster']=$this->model_users->booster($this->session->userdata('username'));
        $data['warrior']=$this->model_users->warrior($this->session->userdata('username'));
        $data['nilai'] = $this->model_users->program_nilai($this->session->userdata('username'));
		$this->load->view('user/anggota_view',$data);
	}

	public function isi_data()
	{
		$username = $this->session->userdata('username');
        $data['unit'] = $this->model_users->get_unit($this->session->userdata('username'));
		$this->form_validation->set_rules('target');
		$data['program'] = $this->model_users->program($this->session->userdata('username'));
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/index_user',$data);
		}
		else {
			date_default_timezone_set("Asia/Jakarta");
			$mydate=getdate(date("U"));
			$jam = date('H:i:s a');
			$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
			$data_program = array(
								'input_user'			=> $this->session->userdata('username'),
								'input_detail'			=> $this->input->post('program'),
                                'input_program_id'		=> $this->input->post('program_id'),
								'input_target'			=> $this->input->post('target'),
								'input_satuan'			=> $this->input->post('satuan'),
								'last_modified'			=> $jam

						);
			//print_r($data_program);exit();
			$this->model_users->isi_data($data_program);
			redirect('user'); 
			}
	}

	public function evaluasi_data($id)
	{
		$username = $this->session->userdata('username');
        $data['unit'] = $this->model_users->get_unit($this->session->userdata('username'));
		$this->form_validation->set_rules('capaian');
		$data['programunit'] = $this->model_users->findprogram($this->session->userdata('username'),$id);
		$data['program'] = $this->model_users->program($this->session->userdata('username'));
		$data['daftarevaluasi'] = $this->model_users->daftarevaluasi($this->session->userdata('username'),$data['programunit']->cc_detail);
		$data['listevaluasi'] = $this->model_users->listevaluasi($this->session->userdata('username'),$data['programunit']->cc_detail);
        $data['nilai'] = $this->model_users->program_nilai($this->session->userdata('username'));
        $data['monitoring'] = $this->model_users->load_data_w('reinforcment', 'monitoring');
        $data['reinforcement_p'] = $this->model_users->load_data_w('reinforcment', 'positif');
        $data['reinforcement_n'] = $this->model_users->load_data_w('reinforcment', 'negatif');
		//print_r($data['listevaluasi']);exit();
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/evaluasi_view',$data);
		}
		else {
			date_default_timezone_set('Asia/Jakarta');
            $unit = $this->session->userdata('username');
			$mydate=getdate(date("U"));
			$jam = date('H:i:s a');
			$data = "$mydate[month] $mydate[mday], $mydate[year] $jam";
			$month = date('m');
            $day = date('d');
			$uploadOk = 1;
			$username = $_POST['user'];
			$program=$_POST['program'];
			$satuan=$_POST['satuan'];
			$id_input=$_POST['id_input'];
			$target=$_POST['target'];
			$capaian=$_POST['capaian'];
			$metodologi=$_POST['metodologi'];
			$r_positif=$_POST['r_positif'];
			$r_negatif=$_POST['r_negatif'];
            $status=$_POST['status'];
			$capaian_=round($capaian/$target*100);
			if ($capaian>=$target) {
				$gap=0;
			} elseif ($capaian<$target) {
				
				$gap=100-$capaian_;
			}

			if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = $unit."-".$mydate."-".$program."-".rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="uploads/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "rar" && $file_type != "zip" ) {

				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
				$data_program = array(
								'input_user_c'			=> $this->session->userdata('username'),
								'input_detail_c'		=> $this->input->post('program'),
								'input_realisasi'		=> $capaian,
								'input_realisasi_'		=> $capaian_,
								'input_metodologi'		=> $metodologi,
								'input_reinforcement_positif'		=> $r_positif,
								'input_reinforcement_negatif'		=> $r_negatif,
								'input_attach'			=> $final_file,
								'input_gap'				=> $gap,
								'input_tanggal'			=> $day,
								'input_bulan'			=> $month,
                                'input_status'			=> $status,
								'last_modified_c'		=> $data
						);
                $nlbobot2 = $this->input->post('bobot2');
                
                $data_target = array(
                                'input_satuan'		=> $satuan, 
								'input_target'		=> $target 
						);
                    $this->model_users->update_target($id_input,$unit, $program, $data_target);
                
                 
				//print_r($data_program);exit();
				$this->model_users->evaluasi_data($data_program);
				redirect('user/index');
			}
		}
			
			}
	}
    
    public function evaluasi_update( $idp)
	{
            date_default_timezone_set('Asia/Jakarta');
            $unit = $this->session->userdata('username');
			$mydate=getdate(date("U"));
			$jam = date('H:i:s a');
			$data = "$mydate[month] $mydate[mday], $mydate[year] $jam";
			$month = date('m');
            $day = date('d');
			$uploadOk = 1;
			$username = $_POST['user'];
			$program=$_POST['program'];
			$satuan=$_POST['satuan'];
			$target=$_POST['target'];
			$capaian=$_POST['capaian'];
			$metodologi=$_POST['metodologi'];
			$r_positif=$_POST['r_positif'];
			$r_negatif=$_POST['r_negatif'];
            $status=$_POST['status'];
			$capaian_=round($capaian/$target*100);
			if ($capaian>=$target) {
				$gap=0;
			} elseif ($capaian<$target) {
				
				$gap=100-$capaian_;
			}

			if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = $unit."-".$mydate."-".$program."-".rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 4194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="uploads/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "rar" && $file_type != "zip" ) {

				echo "Sorry, only rar and zip files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
				$data_program = array(
								'input_realisasi'		=> $capaian,
								'input_realisasi_'		=> $capaian_,
								'input_metodologi'		=> $metodologi,
								'input_reinforcement_positif'		=> $r_positif,
								'input_reinforcement_negatif'		=> $r_negatif,
								'input_attach'			=> $final_file,
								'input_gap'				=> $gap,
                                'input_status'			=> $status,
								'last_modified_c'		=> $data

						);
                $nlbobot2 = $this->input->post('bobot2');
                
				//print_r($data_program);exit();
				$this->model_users->evaluasi_update($idp, $data_program);
				redirect('user/history');
			}
		}
	}
	
	public function edit_program($id){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('desc');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/tambah_program');
		}
		else {
			$data_program = array(
								'cc_detail'			=> $this->input->post('program'),
								'cc_desc'			=> $this->input->post('deskripsi'),
								'start_month'		=> $this->input->post('waktu_pelaksanaan'),
								'end_month'			=> $this->input->post('batas_pelaksanaan'),
								'status'			=> $this->input->post('status')

						);
			//print_r($data_program);exit();
			$this->model_admin->update_program($id,$data_program);
			redirect('admin/program'); 
			}
	}
    
    public function ganti_bulan_history()
	{
        $bulan = substr($this->input->post('bulan'),0,2);
        $bulan2 = substr($this->input->post('bulan'),2);
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
        $data['monitoring'] = $this->model_users->load_data_w('reinforcment', 'monitoring');
        $data['reinforcement_p'] = $this->model_users->load_data_w('reinforcment', 'positif');
        $data['reinforcement_n'] = $this->model_users->load_data_w('reinforcment', 'negatif');
        $data["history"]=$this->model_users->history_data($bulan,$this->session->userdata('username'));
        $data['unit'] = $this->model_users->get_unit($this->session->userdata('username'));
        $data['program'] = $this->model_users->program_eval_viwe($bulan, $this->session->userdata('username'));
        
		$this->load->view('user/history_view',$data);
	}
	
	function history()
	{	
        $bulan = date("m");
        $bulan2 = date("M");
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
        $data['monitoring'] = $this->model_users->load_data_w('reinforcment', 'monitoring');
        $data['reinforcement_p'] = $this->model_users->load_data_w('reinforcment', 'positif');
        $data['reinforcement_n'] = $this->model_users->load_data_w('reinforcment', 'negatif');
        $data["history"]=$this->model_users->history_data($bulan,$this->session->userdata('username'));
        $data['unit'] = $this->model_users->get_unit($this->session->userdata('username'));
        $data['program'] = $this->model_users->program_eval_viwe($bulan, $this->session->userdata('username'));
        
		$this->load->view('user/history_view',$data);
	}
	function feedback($id)
	{	
		$month = date('m');
		$data["id_pesan"]=$id;
		//print_r($month);
		$user = $this->session->userdata('username');
		$data['jumlahprogram']	= $this->model_users->jumlah_program_jalan();
		$data['nilairealisasi']	= $this->model_users->realisasi_program_jalan($user,$month);
		$data['program'] = $this->model_users->program_unit($this->session->userdata('username'));
		$data['programdefault'] = $this->model_users->program_jalan();
		$data['max'] = $this->model_users->max_bulan();
		if(!$data['nilairealisasi']) { $data['rerata'] =0; } else {
		$data['rerata'] = $data['nilairealisasi'][0]->Total/$data['jumlahprogram']; }
		//print_r($data['program']);exit();


		$this->load->view('user/feedback',$data);
	}
	
	function assessment()
	{	
		$mine = $this->session->userdata('unit');
		$data['pertanyaan']	= $this->model_users->daftar($mine);
		$data['setting']	= $this->model_users->skala();
             /*foreach ($data['pertanyaan'] as $a) {
                 for($j=0;$j<10;$j++) {
                 	$a='$q'.$j;
                 print_r($a);
             }
             }
                  */
		$this->load->view('user/assessment_view',$data);
	}
    
    function addbooster()
	{
		$username = $this->session->userdata('username');
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/anggota_view');
		}
		else {
            $aktif_start = date("Y-m-d");
            $m = date("m"); 
            $d = date("d");
            $y = date("y") + 1;
            $aktif_end =  $y."-".$m."-".$d;
            $status = 1;
            $uploadOk = 1;
            
            if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 2194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="assets/photo_booster/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "jpg" && $file_type != "png" && $file_type != "JPG" && $file_type != "PNG" ) {

				echo "Sorry, only jpg and png files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
                    $data_booster = array(
                                        'nopeg'			=> $this->input->post('nopeg'),
                                        'nama_booster'	=> $this->input->post('nama_booster'),
                                        'no_hp'	        => $this->input->post('no_hp'),
                                        'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                                        'photo'	        => $final_file,
                                        'email'			=> $this->input->post('email'),
                                        'unit'			=> $this->session->userdata('unit'),
                                        'direktorat'	=> $this->session->userdata('direktorat'),
                                        'aktif_start'	=> $aktif_start,
                                        'aktif_end'	    => $aktif_end,
                                        'status_aktif'  => $status
                                );
                
                    $nlbobot1 = $this->input->post('bobot1');
                
                    $nilaibobot1 = $nlbobot1+100;
                    $data_nilai = array(
                                'nilai_bobot1'		=> $nilaibobot1, 
                        );
                    $this->model_users->update_nlbobot($username, $data_nilai);
              
                    //print_r($data_warrior);exit();
                    $this->model_users->isi_booster($data_booster);
                    redirect('user/anggota_view');
                }
			}
	   }
    }
    
    function editbooster()
	{
		$username = $this->session->userdata('username');
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/anggota_view');
		}
		else {
            $aktif_start = date("Y-m-d");
            $m = date("m"); 
            $d = date("d");
            $y = date("y") + 1;
            $aktif_end =  $y."-".$m."-".$d;
            $status = 1;
            $uploadOk = 1;
            
            if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 2194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="assets/photo_booster/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "jpg" && $file_type != "png" && $file_type != "JPG" && $file_type != "PNG" ) {

				echo "Sorry, only jpg and png files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
                $nopeg = $this->input->post('nopeg');
                    $data_booster = array(
                                        'nama_booster'	=> $this->input->post('nama_booster'),
                                        'no_hp'	        => $this->input->post('no_hp'),
                                        'photo'	        => $final_file,
                                        'email'			=> $this->input->post('email')
                                );
                    //print_r($data_warrior);exit();
                    $this->model_users->edit_booster($nopeg,$data_booster);
                    redirect('user/anggota_view');
                }
			}
	   }
    }

	function warrior()
	{
		$data['warrior']=$this->model_users->warrior($this->session->userdata('unit'));
		$this->load->view('user/warrior');
	}

	function addwarrior()
	{
		$username = $this->session->userdata('username');
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/anggota_view');
		}
		else {
            $aktif_start = date("Y-m-d");
            $m = date("m"); 
            $d = date("d");
            $y = date("y") + 1;
            $aktif_end =  $y."-".$m."-".$d;
            $status = 1;
            $uploadOk = 1;
            
            if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 2194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="assets/photo_warrior/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "jpg" && $file_type != "png" && $file_type != "JPG" && $file_type != "PNG" ) {

				echo "Sorry, only jpg and png files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
                    $data_warrior = array(
                                        'nopeg'			=> $this->input->post('nopeg'),
                                        'nama_warrior'	=> $this->input->post('nama_warrior'),
                                        'no_hp'	        => $this->input->post('no_hp'),
                                        'photo'	        => $final_file,
                                        'email'			=> $this->input->post('email'),
                                        'unit'			=> $this->session->userdata('unit'),
                                        'direktorat'	=> $this->session->userdata('direktorat'),
                                        'aktif_start'	=> $aktif_start,
                                        'aktif_end'	    => $aktif_end,
                                        'status_aktif'  => $status
                                );
                
                    $nlbobot1 = $this->input->post('bobot1');
                
                    $nilaibobot1 = $nlbobot1+100;
                    $data_nilai = array(
                                'nilai_bobot1'		=> $nilaibobot1, 
                        );
                    $this->model_users->update_nlbobot($username, $data_nilai);
                
                    //print_r($data_warrior);exit();
                    $this->model_users->isi_warrior($data_warrior);
                
                    redirect('user/anggota_view');
                }
			}
	   }
    }
    
    function editwarrior()
	{
		$username = $this->session->userdata('username');
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/anggota_view');
		}
		else {
            $aktif_start = date("Y-m-d");
            $m = date("m"); 
            $d = date("d");
            $y = date("y") + 1;
            $aktif_end =  $y."-".$m."-".$d;
            $status = 1;
            $uploadOk = 1;
            
            if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 2194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="assets/photo_warrior/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "jpg" && $file_type != "png" && $file_type != "JPG" && $file_type != "PNG" ) {

				echo "Sorry, only jpg and png files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
                $nopeg = $this->input->post('nopeg');
                    $data_warrior = array(
                                        'nama_warrior'	=> $this->input->post('nama_warrior'),
                                        'no_hp'	        => $this->input->post('no_hp'),
                                        'photo'	        => $final_file,
                                        'email'			=> $this->input->post('email')
                                );
                    //print_r($data_warrior);exit();
                    $this->model_users->edit_warrior($nopeg,$data_warrior);
                    redirect('user/anggota_view');
                }
			}
	   }
    }

	function timbudaya()
	{
		$data['warrior']=$this->model_users->timbudaya($this->session->userdata('unit'));
		if ($data['warrior']) $data['status']=1;
		else $data['status']=0;
		//print_r($data);exit();
		$this->load->view('user/implementasi_budaya',$data);
	}

	function add_timbudaya()
	{
		$username = $this->session->userdata('username');
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/anggota_view');
		}
		else {
            $aktif_start = date("Y-m-d");
            $m = date("m"); 
            $d = date("d");
            $y = date("y") + 1;
            $aktif_end =  $y."-".$m."-".$d;
            $status = 1;
            $uploadOk = 1;
            
            if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 2194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="assets/photo_tib/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "jpg" && $file_type != "png" && $file_type != "JPG" && $file_type != "PNG" ) {

				echo "Sorry, only jpg and png files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
                    $data_budaya = array(
                                        'nopeg'			=> $this->input->post('nopeg'),
                                        'nama'	        => $this->input->post('nama'),
                                        'no_hp'	        => $this->input->post('no_hp'),
                                        'posisi'    	=> $this->input->post('posisi'),
                                        'photo'	        => $final_file,
                                        'email'			=> $this->input->post('email'),
                                        'unit'			=> $this->session->userdata('unit'),
                                        'direktorat'	=> $this->session->userdata('direktorat'),
                                        'aktif_start'	=> $aktif_start,
                                        'aktif_end'	    => $aktif_end,
                                        'status_aktif'  => $status
                                );
                
                    $nlbobot1 = $this->input->post('bobot1');
                
                    $data['tim_budaya']=$this->model_users->timbudaya($this->session->userdata('unit'));
                    
                    if(count($data['tim_budaya']) < 1){
                        $nilaibobot1 = $nlbobot1+100;
                        $data_nilai = array(
                                    'nilai_bobot1'		=> $nilaibobot1, 
                            );
                        $this->model_users->update_nlbobot($username, $data_nilai);
                    }
                
                    //print_r($data_warrior);exit();
                    $this->model_users->isi_timbudaya($data_budaya);
                    redirect('user/anggota_view');
                }
			}
	   }
    }

    function editbudaya()
	{
		$username = $this->session->userdata('username');
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/anggota_view');
		}
		else {
            $aktif_start = date("Y-m-d");
            $m = date("m"); 
            $d = date("d");
            $y = date("y") + 1;
            $aktif_end =  $y."-".$m."-".$d;
            $status = 1;
            $uploadOk = 1;
            
            if (isset($_FILES['file']['name'])&&!empty($_FILES['file']['name'])) {
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
				// Check file size
			if ($file_size > 2194304) {
				echo "Sorry, your file is too large.";
				$_SESSION['error2']=1;
				$uploadOk = 0;
			}
			$folder="assets/photo_tib/";
				// new file size in KB
			$new_size = $file_size/1024;  
				// new file size in KB

				// make file name in lower case
			$new_file_name = strtolower($file);
				// make file name in lower case

			$final_file=str_replace(' ','-',$new_file_name);
				// Allow certain file formats

			$target_file = $folder . basename($_FILES["file"]["name"]);
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);;
				// Allow certain file formats
			if($file_type != "jpg" && $file_type != "png" && $file_type != "JPG" && $file_type != "PNG" ) {

				echo "Sorry, only jpg and png files are allowed.";
				$_SESSION['error']=1;
				$_SESSION['tipe']=$file_type;

				$uploadOk = 0;
			}
			if ($uploadOk == 0) {

				// if everything is ok, try to upload file
			} else {
				move_uploaded_file($file_loc,$folder.$final_file);
                $nopeg = $this->input->post('nopeg');
                    $data_budaya = array(
                                        'nama'	        => $this->input->post('nama'),
                                        'no_hp'	        => $this->input->post('no_hp'),
                                        'posisi'	    => $this->input->post('posisi'),
                                        'photo'	        => $final_file,
                                        'email'			=> $this->input->post('email')
                                );
                    //print_r($data_warrior);exit();
                    $this->model_users->edit_timbudaya($nopeg,$data_budaya);
                    redirect('user/anggota_view');
                }
			}
	   }
    }
    
    public function editprofilepwd(){
        $passworda = $this->input->post('passworda');
        $passwordb = $this->input->post('passwordb');
        $unit = $this->session->userdata('username');
        
        if($passworda != $passwordb){
			echo "<script>
			alert('Password tidak valid');
			window.location.href='".base_url('user')."';
			</script>";
			} else {
                $data = array(
                    'password'	        => $passworda
                );
                $this->model_users->edit_profile($unit,$data);
                redirect('user');
            }
    }
    
	public function deletettib(){
        $nopeg = $this->input->post('nopeg');
        $unit = $this->session->userdata('username');
        $nlbobot1 = $this->input->post('bobot1');
        
        $data['tim_budaya']=$this->model_users->timbudaya($this->session->userdata('unit'));
                    
        if(count($data['tim_budaya']) <= 1){
            $nilaibobot1 = $nlbobot1-100;
            $data_nilai = array(
                        'nilai_bobot1'		=> $nilaibobot1, 
                );
            $this->model_users->update_nlbobot($unit, $data_nilai);
        }
        
		$this->model_users->delete_timbudaya($nopeg);
		redirect('user/anggota_view');
	}	
    
    public function deleteW(){
        $nopeg = $this->input->post('nopeg');
        $unit = $this->session->userdata('username');
        $nlbobot1 = $this->input->post('bobot1');
                
                    $nilaibobot1 = $nlbobot1-100;
                    $data_nilai = array(
                                'nilai_bobot1'		=> $nilaibobot1, 
                        );
                    $this->model_users->update_nlbobot($unit, $data_nilai);
        
		$this->model_users->delete_W($nopeg);
		redirect('user/anggota_view');
	}	
    
    public function deleteB(){
        $nopeg = $this->input->post('nopeg');
        $unit = $this->session->userdata('username');
        $nlbobot1 = $this->input->post('bobot1');
                
                    $nilaibobot1 = $nlbobot1-100;
                    $data_nilai = array(
                                'nilai_bobot1'		=> $nilaibobot1, 
                        );
                    $this->model_users->update_nlbobot($unit, $data_nilai);
        
		$this->model_users->delete_B($nopeg);
		redirect('user/anggota_view');
	}
    
	function logout(){
        
		$this->session->sess_destroy();
		redirect('login');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
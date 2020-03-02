<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username')!="Admin-bj" || $this->session->userdata('role')!=-1 ){
			$this->session->set_flashdata('error','Maaf anda belum log in sebagain admin');	
				redirect('login');			
			}
		$this->load->model('model_users');
		$this->load->model('model_admin');
        $this->load->model('model_new');
        $this->load->model('model_radar');
		$this->load->model('demografi_model');
		$this->load->helper('text');
        $this->load->helper('form');
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->helper('url');
        $this->load->helper('download');
	}
    
    //kalibrasi_nilai
    
	public function index()
	{
        $data['direktorat'] = $this->model_new->dir_data();
        
        $data['progrescorp'] = $this->model_admin->get_progress_corporate();
        $data['progresdir'] = $this->model_admin->get_progress_dir();
		$data['progreskc'] = $this->model_admin->get_progress_utama();
		$data['progreskcp'] = $this->model_admin->get_progress_pembantu();
		$data['progreskcs'] = $this->model_admin->get_progress_syariah();
		$data['progreskk'] = $this->model_admin->get_progress_kk();
        $data['progreskcps'] = $this->model_admin->get_progress_kcps();
        
        $data['progressyariah'] = $this->model_admin->get_progress_syariahh();
        $data['progrescabang'] = $this->model_admin->get_progress_cabang();
        
        $data['botall'] = $this->model_admin->botall();
        $data['leaderall'] = $this->model_admin->leaderAll();
		
		$this->load->view('admin/dashboard_view',$data);
	}
    
    public function rekap_bulan_impl()
	{
        $bulan = substr($this->input->post('bulan'),0,2);
		redirect('admin/rekap_implementasi/'.$bulan); 
	}
    
    public function rekap_bulan_evl()
	{
        $bulan = substr($this->input->post('bulan'),0,2);
		redirect('admin/rekap_evaluasinilai/'.$bulan); 
	}
    
    public function rekap_bulan_scr()
	{
        $bulan = substr($this->input->post('bulan'),0,2);
		redirect('admin/rekap_score/'.$bulan); 
	}
    
    public function rekap_bulan_trlmb()
	{
        $bulan = substr($this->input->post('bulan'),0,2);
		redirect('admin/rekap_terlambatlaporan/'.$bulan); 
	}
    
    public function dashboard_indexP($bulan)
	{
        
        $data['all'] = $this->model_admin->hitungall('unit');
        $data['alldir'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'Divisi');
        $data['allkc'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KC');
        $data['allkcp'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KCP');
        $data['allkk'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KK');
        $data['allkcs'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KCS');
        $data['allkcps'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KCPS');
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/dashboard_statistic',$data);
	}
    
    public function rekap_terlambatlaporan($bulan)
	{
        switch ($bulan) {
            case "01":
                $bulan2 = 'Jan';
                break;
            case "02":
                $bulan2 = 'Feb';
                break;
            case "03":
                $bulan2 = 'Mar';
                break;
            case "04":
                $bulan2 = 'Apr';
                break;
            case "05":
                $bulan2 = 'May';
                break;
            case "06":
                $bulan2 = 'Jun';
                break;
            case "07":
                $bulan2 = 'Jul';
                break;
            case "08":
                $bulan2 = 'Aug';
                break;
            case "09":
                $bulan2 = 'Sep';
                break;
            case "10":
                $bulan2 = 'Oct';
                break;
            case "11":
                $bulan2 = 'Nov';
                break;
            case "12":
                $bulan2 = 'Dec';
                break;
            default:
                $bulan2 = date("M");
        }
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
        
        $data['janb'] = $this->model_admin->hitunglate('01');
        $data['febb'] = $this->model_admin->hitunglate('02');
        $data['marb'] = $this->model_admin->hitunglate('03');
        $data['aprb'] = $this->model_admin->hitunglate('04');
        $data['meib'] = $this->model_admin->hitunglate('05');
        $data['junb'] = $this->model_admin->hitunglate('06');
        $data['julb'] = $this->model_admin->hitunglate('07');
        $data['agub'] = $this->model_admin->hitunglate('08');
        $data['sepb'] = $this->model_admin->hitunglate('09');
        $data['oktb'] = $this->model_admin->hitunglate('10');
        $data['novb'] = $this->model_admin->hitunglate('11');
        $data['desb'] = $this->model_admin->hitunglate('12');
        
        $data['lateeval'] = $this->model_admin->lateeval();
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/rekap_terlambatlaporan',$data);
	}
    
    public function rekap_implementasi($bulan)
	{
        switch ($bulan) {
            case "01":
                $bulan2 = 'Jan';
                break;
            case "02":
                $bulan2 = 'Feb';
                break;
            case "03":
                $bulan2 = 'Mar';
                break;
            case "04":
                $bulan2 = 'Apr';
                break;
            case "05":
                $bulan2 = 'May';
                break;
            case "06":
                $bulan2 = 'Jun';
                break;
            case "07":
                $bulan2 = 'Jul';
                break;
            case "08":
                $bulan2 = 'Aug';
                break;
            case "09":
                $bulan2 = 'Sep';
                break;
            case "10":
                $bulan2 = 'Oct';
                break;
            case "11":
                $bulan2 = 'Nov';
                break;
            case "12":
                $bulan2 = 'Dec';
                break;
            default:
                $bulan2 = date("M");
        }
        
        $data['all'] = $this->model_admin->hitungall('unit');
        
        $data['catunit'] = $this->model_admin->jmlh_ngumpulin($bulan);
        $data['catunitall'] = $this->model_admin->catunitall();
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
        
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/rekap_implementasi',$data);
	}
    
     public function rekap_evaluasinilai($bulan)
	{
        switch ($bulan) {
            case "01":
                $bulan2 = 'Jan';
                break;
            case "02":
                $bulan2 = 'Feb';
                break;
            case "03":
                $bulan2 = 'Mar';
                break;
            case "04":
                $bulan2 = 'Apr';
                break;
            case "05":
                $bulan2 = 'May';
                break;
            case "06":
                $bulan2 = 'Jun';
                break;
            case "07":
                $bulan2 = 'Jul';
                break;
            case "08":
                $bulan2 = 'Aug';
                break;
            case "09":
                $bulan2 = 'Sep';
                break;
            case "10":
                $bulan2 = 'Oct';
                break;
            case "11":
                $bulan2 = 'Nov';
                break;
            case "12":
                $bulan2 = 'Dec';
                break;
            default:
                $bulan2 = date("M");
        }
        
        $data['program'] = $this->model_admin->program_eval_viwe($bulan);
        $data['programSudah'] = $this->model_admin->program_eval_vive($bulan);
        
      
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
         
        $data['evalsudahd'] = $this->model_admin->get_evaluasi_count('1', $bulan, 'Divisi');
        $data['evalbelumd'] = $this->model_admin->get_evaluasi_count('5', $bulan, 'Divisi');
        $data['evalsudahkc'] = $this->model_admin->get_evaluasi_count('1', $bulan, 'KC');
        $data['evalbelumkc'] = $this->model_admin->get_evaluasi_count('5', $bulan, 'KC');
        $data['evalsudahkcp'] = $this->model_admin->get_evaluasi_count('1', $bulan, 'KCP');
        $data['evalbelumkcp'] = $this->model_admin->get_evaluasi_count('5', $bulan, 'KCP');
        $data['evalsudahkk'] = $this->model_admin->get_evaluasi_count('1', $bulan, 'KK');
        $data['evalbelumkk'] = $this->model_admin->get_evaluasi_count('5', $bulan, 'KK');
        $data['evalsudahkcs'] = $this->model_admin->get_evaluasi_count('1', $bulan, 'KCS');
        $data['evalbelumkcs'] = $this->model_admin->get_evaluasi_count('5', $bulan, 'KCS');
        $data['evalsudahkcps'] = $this->model_admin->get_evaluasi_count('1', $bulan, 'KCPS');
        $data['evalbelumkcps'] = $this->model_admin->get_evaluasi_count('5', $bulan, 'KCPS');
        
        $data['evlsdh'] = $this->model_admin->get_evaluasi_COC('1', $bulan);
        $data['evlblm'] = $this->model_admin->get_evaluasi_COC('5', $bulan);
        
        
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/rekap_evaluasinilai',$data);
	}
    
     public function rekap_score($bulan)
	{
        switch ($bulan) {
            case "01":
                $bulan2 = 'Jan';
                break;
            case "02":
                $bulan2 = 'Feb';
                break;
            case "03":
                $bulan2 = 'Mar';
                break;
            case "04":
                $bulan2 = 'Apr';
                break;
            case "05":
                $bulan2 = 'May';
                break;
            case "06":
                $bulan2 = 'Jun';
                break;
            case "07":
                $bulan2 = 'Jul';
                break;
            case "08":
                $bulan2 = 'Aug';
                break;
            case "09":
                $bulan2 = 'Sep';
                break;
            case "10":
                $bulan2 = 'Oct';
                break;
            case "11":
                $bulan2 = 'Nov';
                break;
            case "12":
                $bulan2 = 'Dec';
                break;
            default:
                $bulan2 = date("M");
        }
        
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
        
        $data['leaderall'] = $this->model_admin->leaderAll();
        $data['leaderbym'] = $this->model_admin->leaderbym($bulan);
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/rekap_score',$data);
	}
    
    
    public function printrekap($bulan)
	{
        $data['all'] = $this->model_admin->hitungall('unit');
        $data['alldir'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'Divisi');
        $data['allkc'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KC');
        $data['allkcp'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KCP');
        $data['allkk'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KK');
        $data['allkcs'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KCS');
        $data['allkcps'] = $this->model_admin->hitungwhere('unit','kode_lokasi', 'KCPS');
        
        $data['catunit'] = $this->model_admin->jmlh_ngumpulin($bulan);
        $data['catunitall'] = $this->model_admin->catunitall();
        $data['bulan'] = $bulan;
        
        $data['janb'] = $this->model_admin->hitunglate('01');
        $data['febb'] = $this->model_admin->hitunglate('02');
        $data['marb'] = $this->model_admin->hitunglate('03');
        $data['aprb'] = $this->model_admin->hitunglate('04');
        $data['meib'] = $this->model_admin->hitunglate('05');
        $data['junb'] = $this->model_admin->hitunglate('06');
        $data['julb'] = $this->model_admin->hitunglate('07');
        $data['agub'] = $this->model_admin->hitunglate('08');
        $data['sepb'] = $this->model_admin->hitunglate('09');
        $data['oktb'] = $this->model_admin->hitunglate('10');
        $data['novb'] = $this->model_admin->hitunglate('11');
        $data['desb'] = $this->model_admin->hitunglate('12');
        
        $data['lateeval'] = $this->model_admin->lateeval();
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/printrekap',$data);
	}
    
    public function dashboard_topEx()
	{ 
        $data['leaderKC'] = $this->model_admin->leaderKC();
        $data['leaderKCP'] = $this->model_admin->leaderKCP();
        $data['leaderKCS'] = $this->model_admin->leaderKCS();
        $data['leaderKCPS'] = $this->model_admin->leaderKCPS();
        $data['leaderKK'] = $this->model_admin->leaderKK();
        $data['leaderDV'] = $this->model_admin->leaderDV();
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/dashboard_topEx',$data);
	}
    
    public function dashboard_botEx()
	{
        $data['botKC'] = $this->model_admin->botKC();
        $data['botKCP'] = $this->model_admin->botKCP();
        $data['botKCS'] = $this->model_admin->botKCS();
        $data['botKCPS'] = $this->model_admin->botKCPS();
        $data['botKK'] = $this->model_admin->botKK();
        $data['botDV'] = $this->model_admin->botDV();
        
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/dashboard_botEx',$data);
	}
    

	public function dashboard_warrior()
	{
        $data['direktorat'] = $this->model_new->dir_data();
		$data['jawa'] = $this->model_admin->listjawa();	
		$data['jakarta'] = $this->model_admin->listjakarta();	
		$data['kalimantan'] = $this->model_admin->listkalimantan();	
		$data['sumatera'] = $this->model_admin->listsumatra();	
		$data['HO'] = $this->model_admin->listho();	
		
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/dashboard_warrior',$data);
	}
    
    public function dashboard_dir()
    {
        $data['avgdivisi'] = $this->model_admin->get_progress_avgdivisi();
        $data['progresdivisi'] = $this->model_admin->get_progress_divisi();
        $data['progresdivisiOverall'] = $this->model_admin->get_progress_divisiOverall();
		
		$this->load->view('admin/dashboard_dir',$data);
    }
    
     public function dashboard_cb_utama()
    {
        $data['avgutama'] = $this->model_admin->get_progress_avg('KC');
        $data['progresdutama'] = $this->model_admin->get_progress_('KC');
		
		$this->load->view('admin/dashboard_cb_utama',$data);
    }
    
     public function dashboard_cb_syariah()
    {
        $data['avgsyariah'] = $this->model_admin->get_progress_avg('KCS');
        $data['progresdsyariah'] = $this->model_admin->get_progress_('KCS');
		
		$this->load->view('admin/dashboard_cb_syariah',$data);
    }
    
    public function dashboard_cb_pembantusy()
    {
        $data['avgpsyariah'] = $this->model_admin->get_progress_avg('KCPS');
        $data['progresdpsyariah'] = $this->model_admin->get_progress_('KCPS');
		
		$this->load->view('admin/dashboard_cb_pembantusy',$data);
    }
    
    public function dashboard_k_kas()
    {
        $data['avgkk'] = $this->model_admin->get_progress_avg('KK');
        $data['progresdkk'] = $this->model_admin->get_progress_('KK');
        $data['golkk'] = $this->model_admin->get_gol_('KK');
    
		$this->load->view('admin/dashboard_k_kas',$data);
    }
    
    public function printbar($dir)
    {
        if($dir == 1){
            $data['avgdivisi'] = $this->model_admin->get_progress_avgdivisi();
            $data['progresdivisi'] = $this->model_admin->get_progress_divisi();
            $data['progresdivisiOverall'] = $this->model_admin->get_progress_divisiOverall();
            $data['ket'] = array(1,2,3,4);
        } else{
            $data['avgdivisi'] = $this->model_admin->get_progress_avg($dir);
            $data['progresdivisiOverall'] = $this->model_admin->get_progress_($dir);   
            $data['ket'] = array(1);
        }
    
		$this->load->view('admin/printchartsbar',$data);
    }
    
    public function printradar($dir)
    {
        if($dir == 1){
            $data['avgdivisi'] = $this->model_admin->get_progress_avgdivisi();
            $data['progresdivisi'] = $this->model_admin->get_progress_divisi();
            $data['progresdivisiOverall'] = $this->model_admin->get_progress_divisiOverall();
            $data['ket'] = array(1,2,3,4);
        } else{
            $data['avgdivisi'] = $this->model_admin->get_progress_avg($dir);
            $data['progresdivisiOverall'] = $this->model_admin->get_progress_($dir);
            $data['ket'] = array(1);
        }
    
		$this->load->view('admin/printchartsradar',$data);
    }
    
    public function printradar2($dir)
    {
        if($dir == 1){
            $data['avgkk'] = $this->model_admin->get_progress_avg('KK');
            $data['progresdkk'] = $this->model_admin->get_progress_('KK');
            $data['golkk'] = $this->model_admin->get_gol_('KK');
            $this->load->view('admin/printchartsradar2',$data);
        } else{
            $data['avgkcp'] = $this->model_admin->get_progress_avg('KCP');
            $data['progresdkcp'] = $this->model_admin->get_progress_('KCP');
            $data['golkcp'] = $this->model_admin->get_gol_('KCP');
            $data['direktorat'] = $this->model_new->dir_data();
            $data['CBUSBY'] = $this->model_radar->CBUSBY();
            $data['BANYUWANGI'] = $this->model_radar->BANYUWANGI();
            $data['JEMBER'] = $this->model_radar->JEMBER();
            $data['MALANG'] = $this->model_radar->MALANG();
            $data['MADIUN'] = $this->model_radar->MADIUN();
            $data['KEDIRI'] = $this->model_radar->KEDIRI();
            $data['PAMEKASAN'] = $this->model_radar->PAMEKASAN();
            $data['BOJONEGORO'] = $this->model_radar->BOJONEGORO();
            $data['LUMAJANG'] = $this->model_radar->LUMAJANG();
            $data['NGAWI'] = $this->model_radar->NGAWI();
            $data['JOMBANG'] = $this->model_radar->JOMBANG();
            $data['KRAKSAAN'] = $this->model_radar->KRAKSAAN();
            $data['PROBOLINGGO'] = $this->model_radar->PROBOLINGGO();
            $data['BLITAR'] = $this->model_radar->BLITAR();
            $data['TULUNGAGUNG'] = $this->model_radar->TULUNGAGUNG();
            $data['TUBAN'] = $this->model_radar->TUBAN();
            $data['MOJOKERTO'] = $this->model_radar->MOJOKERTO();
            $data['SUMENEP'] = $this->model_radar->SUMENEP();
            $data['SAMPANG'] = $this->model_radar->SAMPANG();
            $data['BANGKALAN'] = $this->model_radar->BANGKALAN();
            $data['PASURUAN'] = $this->model_radar->PASURUAN();
            $data['NGANJUK'] = $this->model_radar->NGANJUK();
            $data['TRENGGALEK'] = $this->model_radar->TRENGGALEK();
            $data['PONOROGO'] = $this->model_radar->PONOROGO();
            $data['PACITAN'] = $this->model_radar->PACITAN();
            $data['GRESIK'] = $this->model_radar->GRESIK();
            $data['SIDOARJO'] = $this->model_radar->SIDOARJO();
            $data['LAMONGAN'] = $this->model_radar->LAMONGAN();
            $data['SITUBONDO'] = $this->model_radar->SITUBONDO();
            $data['BONDOWOSO'] = $this->model_radar->BONDOWOSO();
            $data['MAGETAN'] = $this->model_radar->MAGETAN();
            $data['SOETOMO'] = $this->model_radar->SOETOMO();
            $data['PERAK'] = $this->model_radar->PERAK();
            $data['KANGEAN'] = $this->model_radar->KANGEAN();
            $data['JAKARTA'] = $this->model_radar->JAKARTA();
            $data['BATU'] = $this->model_radar->BATU();
            $data['BAWEAN'] = $this->model_radar->BAWEAN();
            $data['PARE'] = $this->model_radar->PARE();
            $data['KEPANJEN'] = $this->model_radar->KEPANJEN();
            $data['BATAM'] = $this->model_radar->BATAM();
            $data['SYARIAH'] = $this->model_radar->SYARIAH();
            $data['ket'] = array(1);
            $this->load->view('admin/printchartsradar3',$data);
        }
    }
    
    public function team_overall()
    {
        $data['warrior'] = $this->model_admin->warrior();
        $data['booster'] = $this->model_admin->booster();
        $data['budaya'] = $this->model_admin->tib();
        $data['janb'] = $this->model_admin->hitungperbulan('baru_booster','1');
        $data['febb'] = $this->model_admin->hitungperbulan('baru_booster','2');
        $data['marb'] = $this->model_admin->hitungperbulan('baru_booster','3');
        $data['aprb'] = $this->model_admin->hitungperbulan('baru_booster','4');
        $data['meib'] = $this->model_admin->hitungperbulan('baru_booster','5');
        $data['junb'] = $this->model_admin->hitungperbulan('baru_booster','6');
        $data['julb'] = $this->model_admin->hitungperbulan('baru_booster','7');
        $data['agub'] = $this->model_admin->hitungperbulan('baru_booster','8');
        $data['sepb'] = $this->model_admin->hitungperbulan('baru_booster','9');
        $data['oktb'] = $this->model_admin->hitungperbulan('baru_booster','10');
        $data['novb'] = $this->model_admin->hitungperbulan('baru_booster','11');
        $data['desb'] = $this->model_admin->hitungperbulan('baru_booster','12');
        
        $data['janw'] = $this->model_admin->hitungperbulan('baru_warrior','1');
        $data['febw'] = $this->model_admin->hitungperbulan('baru_warrior','2');
        $data['marw'] = $this->model_admin->hitungperbulan('baru_warrior','3');
        $data['aprw'] = $this->model_admin->hitungperbulan('baru_warrior','4');
        $data['meiw'] = $this->model_admin->hitungperbulan('baru_warrior','5');
        $data['junw'] = $this->model_admin->hitungperbulan('baru_warrior','6');
        $data['julw'] = $this->model_admin->hitungperbulan('baru_warrior','7');
        $data['aguw'] = $this->model_admin->hitungperbulan('baru_warrior','8');
        $data['sepw'] = $this->model_admin->hitungperbulan('baru_warrior','9');
        $data['oktw'] = $this->model_admin->hitungperbulan('baru_warrior','10');
        $data['novw'] = $this->model_admin->hitungperbulan('baru_warrior','11');
        $data['desw'] = $this->model_admin->hitungperbulan('baru_warrior','12');
        
        $data['jant'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','1');
        $data['febt'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','2');
        $data['mart'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','3');
        $data['aprt'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','4');
        $data['meit'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','5');
        $data['junt'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','6');
        $data['jult'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','7');
        $data['agut'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','8');
        $data['sept'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','9');
        $data['oktt'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','10');
        $data['novt'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','11');
        $data['dest'] = $this->model_admin->hitungperbulan('baru_tim_implementasi_budaya','12');
        
        $data['wall'] = $this->model_admin->hitungall('baru_warrior');
        $data['ball'] = $this->model_admin->hitungall('baru_booster');
        $data['tall'] = $this->model_admin->hitungall('baru_tim_implementasi_budaya');
		
		$this->load->view('admin/team_overall',$data);
    }
    
    public function dashboard_cb_pembantu()
    {
        $data['avgkcp'] = $this->model_admin->get_progress_avg('KCP');
        $data['progresdkcp'] = $this->model_admin->get_progress_('KCP');
        $data['golkcp'] = $this->model_admin->get_gol_('KCP');
        $data['direktorat'] = $this->model_new->dir_data();
        $data['CBUSBY'] = $this->model_radar->CBUSBY();
        $data['BANYUWANGI'] = $this->model_radar->BANYUWANGI();
        $data['JEMBER'] = $this->model_radar->JEMBER();
        $data['MALANG'] = $this->model_radar->MALANG();
        $data['MADIUN'] = $this->model_radar->MADIUN();
        $data['KEDIRI'] = $this->model_radar->KEDIRI();
        $data['PAMEKASAN'] = $this->model_radar->PAMEKASAN();
        $data['BOJONEGORO'] = $this->model_radar->BOJONEGORO();
        $data['LUMAJANG'] = $this->model_radar->LUMAJANG();
        $data['NGAWI'] = $this->model_radar->NGAWI();
        $data['JOMBANG'] = $this->model_radar->JOMBANG();
        $data['KRAKSAAN'] = $this->model_radar->KRAKSAAN();
        $data['PROBOLINGGO'] = $this->model_radar->PROBOLINGGO();
        $data['BLITAR'] = $this->model_radar->BLITAR();
        $data['TULUNGAGUNG'] = $this->model_radar->TULUNGAGUNG();
        $data['TUBAN'] = $this->model_radar->TUBAN();
        $data['MOJOKERTO'] = $this->model_radar->MOJOKERTO();
        $data['SUMENEP'] = $this->model_radar->SUMENEP();
        $data['SAMPANG'] = $this->model_radar->SAMPANG();
        $data['BANGKALAN'] = $this->model_radar->BANGKALAN();
        $data['PASURUAN'] = $this->model_radar->PASURUAN();
        $data['NGANJUK'] = $this->model_radar->NGANJUK();
        $data['TRENGGALEK'] = $this->model_radar->TRENGGALEK();
        $data['PONOROGO'] = $this->model_radar->PONOROGO();
        $data['PACITAN'] = $this->model_radar->PACITAN();
        $data['GRESIK'] = $this->model_radar->GRESIK();
        $data['SIDOARJO'] = $this->model_radar->SIDOARJO();
        $data['LAMONGAN'] = $this->model_radar->LAMONGAN();
        $data['SITUBONDO'] = $this->model_radar->SITUBONDO();
        $data['BONDOWOSO'] = $this->model_radar->BONDOWOSO();
        $data['MAGETAN'] = $this->model_radar->MAGETAN();
        $data['SOETOMO'] = $this->model_radar->SOETOMO();
        $data['PERAK'] = $this->model_radar->PERAK();
        $data['KANGEAN'] = $this->model_radar->KANGEAN();
        $data['JAKARTA'] = $this->model_radar->JAKARTA();
        $data['BATU'] = $this->model_radar->BATU();
        $data['BAWEAN'] = $this->model_radar->BAWEAN();
        $data['PARE'] = $this->model_radar->PARE();
        $data['KEPANJEN'] = $this->model_radar->KEPANJEN();
        $data['BATAM'] = $this->model_radar->BATAM();
        $data['SYARIAH'] = $this->model_radar->SYARIAH();
        
		$this->load->view('admin/dashboard_cb_pembantu',$data);
    }
    
    public function dashboard_booster()
	{
         $data['direktorat'] = $this->model_new->dir_data();
		$data['jawa'] = $this->model_admin->listjawa();	
		$data['jakarta'] = $this->model_admin->listjakarta();	
		$data['kalimantan'] = $this->model_admin->listkalimantan();	
		$data['sumatera'] = $this->model_admin->listsumatra();	
		$data['HO'] = $this->model_admin->listho();	
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/dashboard_booster',$data);
	}
    
	public function dashboard_implementasi_budaya()
	{
         $data['direktorat'] = $this->model_new->dir_data();
		$data['jawa'] = $this->model_admin->listjawa();	
		$data['jakarta'] = $this->model_admin->listjakarta();	
		$data['kalimantan'] = $this->model_admin->listkalimantan();	
		$data['sumatera'] = $this->model_admin->listsumatra();	
		$data['HO'] = $this->model_admin->listho();	
		//print_r($data['progres']);exit(); 
		$this->load->view('admin/dashboard_implementasi_budaya',$data);
	}

	public function program()
	{
		$data['program'] = $this->model_admin->program();	
		//print_r($data); 
		$this->load->view('admin/list_program',$data);
	}
    
    public function ganti_bulan_evaluasinilai()
	{
        $bulan = substr($this->input->post('bulan'),0,2);
        $bulan2 = substr($this->input->post('bulan'),2);
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
		$data['nilaidir'] = $this->model_admin->nilai('Divisi', $bulan);
        $data['nilaikc'] = $this->model_admin->nilai('KC', $bulan);
        $data['nilaikcp'] = $this->model_admin->nilai('KCP', $bulan);
        $data['nilaikk'] = $this->model_admin->nilai('KK', $bulan);
        $data['nilaikcs'] = $this->model_admin->nilai('KCS', $bulan);
        $data['nilaikcps'] = $this->model_admin->nilai('KCPS', $bulan);
        
		$this->load->view('admin/evaluasi_nilai',$data);
	}
    
    public function evaluasi_nilai()
	{
        $bulan = date("m");
        $bulan2 = date("M");
        $data['bulan'] = $bulan;
        $data['bulan2'] = $bulan2;
		$data['nilaidir'] = $this->model_admin->nilai('Divisi', $bulan);
        $data['nilaikc'] = $this->model_admin->nilai('KC', $bulan);
        $data['nilaikcp'] = $this->model_admin->nilai('KCP', $bulan);
        $data['nilaikk'] = $this->model_admin->nilai('KK', $bulan);
        $data['nilaikcs'] = $this->model_admin->nilai('KCS', $bulan);
        $data['nilaikcps'] = $this->model_admin->nilai('KCPS', $bulan);
		//print_r($data); 
		$this->load->view('admin/evaluasi_nilai',$data);
	}
    
	public function tambah_program(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('desc');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/tambah_program');
		}
		else {
            $awal = strtotime($this->input->post('waktu_pelaksanaan'));
		    $akhir = strtotime($this->input->post('batas_pelaksanaan'));
		    $time=round(($akhir-$awal)/3600/30/24);
			$data_program = array(
								'cc_detail'			=> $this->input->post('program'),
                                'cc_tujuan'			=> $this->input->post('tujuan'),
								'cc_desc'			=> $this->input->post('deskripsi'),
								'start_month'		=> $this->input->post('waktu_pelaksanaan'),
								'end_month'			=> $this->input->post('batas_pelaksanaan'),
                                'cc_time'			=> $time,
								'status'			=> $this->input->post('status')

						);
			//print_r($data_program);exit();
			$this->model_admin->tambah_program2($data_program);
			redirect('admin/program'); 
			}
	}
    
	public function edit_program($id){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('desc');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/tambah_program');
		}
		else {
            $awal = strtotime($this->input->post('waktu_pelaksanaan'));
		    $akhir = strtotime($this->input->post('batas_pelaksanaan'));
		    $time=round(($akhir-$awal)/3600/30/24);
			$data_program = array(
								'cc_detail'			=> $this->input->post('program'),
                                'cc_tujuan'			=> $this->input->post('tujuan'),
								'cc_desc'			=> $this->input->post('deskripsi'),
								'start_month'		=> $this->input->post('waktu_pelaksanaan'),
								'end_month'			=> $this->input->post('batas_pelaksanaan'),
                                'cc_time'			=> $time,
								'status'			=> $this->input->post('status')

						);
			//print_r($data_program);exit();
			$this->model_admin->update_program($id,$data_program);
			redirect('admin/program'); 
			}
	}
    
    public function lakukan_download($id){
        $data = $this->model_users->download($id);
        foreach($data as $p);
		force_download('./uploads/'.$p->input_attach,NULL);
	}
    
    public function evaluate_scoring(){
        $id = $this->input->post('id');
        $unit = $this->input->post('unit');
        $score = $this->input->post('score');
        $program = $this->input->post('program');
        $sender = $this->session->userdata('username');
        $feedback = $this->input->post('feedback');
        $target = $this->input->post('target');
        $bobot3 = $this->input->post('bobot3');
        $bobot4 = $this->input->post('bobot4');
        $bobot5 = $this->input->post('bobot5');
        $bobot6 = $this->input->post('bobot6');
        $tgl = $this->input->post('tgl');
        $bln = $this->input->post('bln');
        $thn = $this->input->post('thn');
        $nlbobot4 = $this->input->post('nlbobot4');
        $nlbobot5 = $this->input->post('nlbobot5');
        $nlbobot6 = $this->input->post('nlbobot6');
        $capaian = round($score/$target*100);
        $gap = 100 - $capaian;
        
        $data_program = array(
								'input_realisasi'			=> $this->input->post('score'),
                                'input_realisasi_'			=> $capaian,
								'input_status'			    => '1',
								'input_gap'			    => $gap
						);
        
        if($tgl > 26){
            if($bln == '08' && $thn == '2019'){
              $nlbobot2 = 0;  
            } else {
              $nlbobot2 = -100;  
            }
        } else {
            $nlbobot2 = 100;
        }
        
        if($capaian <= 25){
            $nilaibobot3 = 20;
        } else if(25 < $capaian && $capaian <= 50 ){
            $nilaibobot3 = 40;
        } else if(50 < $capaian && $capaian <= 75 ){
            $nilaibobot3 = 60;
        } else if(75 < $capaian && $capaian < 100 ){
            $nilaibobot3 = 80;
        } else{
            $nilaibobot3 = 100;
        }
    
//      update score
        $nilai['nilai'] = $this->model_users->program_nilai($unit);
        $bobot['bobot'] = $this->model_admin->bobot()->result();
		foreach ($bobot['bobot'] as $b) {
            $b1 = $b->bobot1;
            $b2 = $b->bobot2;
            $b3 = $b->bobot3;
            $b4 = $b->bobot4;
            $b5 = $b->bobot5;
            $b6 = $b->bobot6;
            foreach ($nilai['nilai'] as $nb) {
                $score_lama = $nb->total_score;
                
                $n2 = round(($nlbobot2*$b2)/100);
                $n3 = round(($nilaibobot3*$b3)/100);
                $n4 = round(($nlbobot4*$b4)/100);
                $n5 = round(($nlbobot5*$b5)/100);
                $n6 = round(($nlbobot6*$b6)/100);
                
                $totalscore = $n2+$n3+$n4+$n5+$n6;
                $scoreakhir = $totalscore + $score_lama;
                $data_nilai = array(
                    'total_score'		=> $scoreakhir 
                );
                $this->model_users->update_nlbobot($unit, $data_nilai);
                $data_score = array(
								'input_score'		=> $totalscore, 
						);
                $this->model_users->update_score($id, $data_score);
            }
        }
        
//      feedback
        $data_feedback = array(
                            'fb_id'		        => $id,
                            'fb_sender'		    => $sender,
                            'fb_recipient'		=> $unit,
                            'fb_content'		=> $feedback,
                            'fb_program'		=> $program,
                            'feedback_status'	=> 1
                        );
        
        $this->model_admin->add_feedback($data_feedback);
        $this->model_admin->update_evaluasi($id,$data_program);
        redirect('admin/evaluasi_nilai'); 
	}

	public function delete_program($id){
		$this->model_admin->delete_program($id);
		redirect('admin/program');
	}	

	public function daftar_user()
	{
		$data['unit'] = $this->model_admin->listuser();	
		//print_r($data); 
		$this->load->view('admin/list_unit',$data);
	}

	public function tambah_user(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('username');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/tambah_unit');
		}
		else {
            
             
         $bobot['Divisi']   = $this->model_admin->last_unit('Divisi');
         $bobot['KC']       = $this->model_admin->last_unit('KC');
         $bobot['KCP']      = $this->model_admin->last_unit('KCP');
         $bobot['KK']       = $this->model_admin->last_unit('KK');
         $bobot['KCS']      = $this->model_admin->last_unit('KCS');
         $bobot['KCPS']     = $this->model_admin->last_unit('KCPS');
        $kodelok = $this->input->post('kode_lokasi');
        if( $kodelok == 'Divisi'){
            $last_unit = $bobot['Divisi'][0]->kode_unit;
            $num_unit = (int)substr($last_unit,4) + 1;
            if(strlen($num_unit)==2){
                $kode_unit = 'DV-00'.$num_unit;
            } else if(strlen($num_unit)==3){
                $kode_unit = 'DV-0'.$num_unit;
            } else {
                $kode_unit = 'DV-'.$num_unit;
            }
        } else if($kodelok == 'KC') {
            $last_unit = $bobot['KC'][0]->kode_unit;
            $num_unit = (int)substr($last_unit,4) + 1;
            if(strlen($num_unit)==2){
                $kode_unit = 'KC-00'.$num_unit;
            } else if(strlen($num_unit)==3){
                $kode_unit = 'KC-0'.$num_unit;
            } else {
                $kode_unit = 'KC-'.$num_unit;
            }
        } else if($kodelok == 'KCP') {
            $last_unit = $bobot['KCP'][0]->kode_unit;
            $num_unit = (int)substr($last_unit,5) + 1;
            if(strlen($num_unit)==2){
                $kode_unit = 'KCP-00'.$num_unit;
            } else if(strlen($num_unit)==3){
                $kode_unit = 'KCP-0'.$num_unit;
            } else {
                $kode_unit = 'KCP-'.$num_unit;
            }
        } else if($kodelok == 'KK') {
            $last_unit = $bobot['KK'][0]->kode_unit;
            $num_unit = (int)substr($last_unit,4) + 1;
            if(strlen($num_unit)==2){
                $kode_unit = 'KK-00'.$num_unit;
            } else if(strlen($num_unit)==3){
                $kode_unit = 'KK-0'.$num_unit;
            } else {
                $kode_unit = 'KK-'.$num_unit;
            }
        } else if($kodelok == 'KCS') {
            $last_unit = $bobot['KCS'][0]->kode_unit;
            $num_unit = (int)substr($last_unit,5) + 1;
            if(strlen($num_unit)==2){
                $kode_unit = 'KCS-00'.$num_unit;
            } else if(strlen($num_unit)==3){
                $kode_unit = 'KCS-0'.$num_unit;
            } else {
                $kode_unit = 'KCS-'.$num_unit;
            }
        } else if($kodelok == 'KCPS') {
            $last_unit = $bobot['KCPS'][0]->kode_unit;
            $num_unit = (int)substr($last_unit,6) + 1;
            if(strlen($num_unit)==2){
                $kode_unit = 'KCPS-00'.$num_unit;
            } else if(strlen($num_unit)==3){
                $kode_unit = 'KCPS-0'.$num_unit;
            } else {
                $kode_unit = 'KCPS-'.$num_unit;
            }
        } else {
            echo "<script>
			alert('Data Jenis Kantor Tidak Dapat Diproses');
			window.location.href='".base_url('admin/tambah_unit')."';
			</script>";
        }
            
			$data_user_user = array(
								'username'			=> $kode_unit,
								'password'			=> $kode_unit,
								'role'				=> 1

						);
            
            $data_user_unit = array(
								'kode_unit'			=> $kode_unit,
                                'nama_unit'			=> $this->input->post('nama_unit'),
                                'kode_dir'			=> $this->input->post('nama_dir'),
                                'kode_lokasi'		=> $this->input->post('kode_lokasi')
						);
            
            $data_user_score = array(
								'kode_unit'			=> $kode_unit,
                                'nama_unit'			=> $this->input->post('nama_unit'),
                                'nama_dir'			=> $this->input->post('nama_dir')
						);
            
            $data_user_progress = array(
								'cc_unit'			=> $kode_unit,
                                'cc_lokasi'			=> $this->input->post('kode_lokasi'),
                                'cc_dir'			=> $this->input->post('nama_dir')
						);
            
            $data_user_performance = array(
								'id_ca'			    => 1,
                                'unit_name'			=> $kode_unit,
                                'kode'			    => $this->input->post('kode_lokasi')
						);
            
			$this->model_admin->tambah_user('user', $data_user_user);
            $this->model_admin->tambah_user('unit', $data_user_unit);
            $this->model_admin->tambah_user('total_score', $data_user_score);
            $this->model_admin->tambah_user('ca_performance_upload', $data_user_performance);
            $this->model_admin->tambah_user('cc_program_overall', $data_user_progress);
			redirect('admin/daftar_user'); 
			}
	}
	
	public function edit_user($id){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('username');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/tambah_user');
		}
		else {
			$data_user = array(
								'username'			=> $this->input->post('username'),
								'password'			=> $this->input->post('password')

						);
			//print_r($data_user);exit();
			$this->model_admin->update_user($id,$data_user);
			redirect('admin/daftar_user'); 
			}
	}
	public function delete_user($id){
		$this->model_admin->delete_user($id);
		redirect('admin/daftar_user');
	}	

	function progress_program($unit)
	{	
		$month = 7;
		//print_r($month);
		$data["unit"]=$unit;
		$user = $unit;
        $data['get_unit']	= $this->model_admin->get_unit_spec($unit);
        $data['get_score']	= $this->model_admin->get_unit_score($unit);
        $data['history']=$this->model_admin->history_data($unit);
		$data['jumlahprogram']	= $this->model_users->jumlah_program_jalan();
		$data['nilairealisasi']	= $this->model_users->program_unit($unit);
		$data['program'] = $this->model_users->program_unit($unit);
		$data['programdefault'] = $this->model_users->program_jalan();
		$data['max'] = $this->model_users->max_bulan();
		/*if(!$data['nilairealisasi']) { $data['rerata'] =0; } else {
		$data['rerata'] = $data['nilairealisasi'][0]->Total/$data['jumlahprogram']; }*/
		//print_r($data['program']);exit();

		$this->load->view('admin/progress_program',$data);
	}
	function progress_evaluasi()
	{	
		$mydate=getdate(date("U"));
		$jam = date('H:i:s a');
		$date = "$mydate[month] $mydate[mday], $mydate[year] $jam";
		
		$data_pesan = array(
								'fb_sender'			=> $this->input->post('dari'),
								'fb_recipient'			=> $this->input->post('untuk'),	
								'fb_subject'			=> $this->input->post('subjek'),
								'fb_detail'			=> $this->input->post('pesan'),
								'last_modified'			=> $date,
								'status'			=> 'unread'


						);
		//print_r($data_pesan['fb_recipient']);exit();
		$this->model_admin->isi_evaluasi($data_pesan);
		
		$url=base_url()."admin/progress_program/".$data_pesan['fb_recipient'];
		//print_r($url);
		$message = "Pesan telah terkirim";
		echo "<script>
			alert('Pesan telah terkirim');
			window.location.href='".$url."';
			</script>";
		//redirect('admin/progress_program/'.$data_pesan['fb_recipient']);
	}
	

    function json(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('tb_pegawai');
        return print_r($this->datatables->generate());
    }

	public function add($unit) {
		$this->load->helper('form');
		$data['unit'] = $this->model_admin->find($unit);
		$this->load->view('admin/tambah_pertanyaan',$data);
		//print_r($data);
	}

	function daftar_warrior()
	{
		$data['warrior']=$this->model_admin->warrior();
		//print_r($data);exit();
		$this->load->view('admin/list_warrior',$data);
	}
    
    

	public function tambah_warrior(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$data['warrior']=$this->model_admin->warrior();
			$this->load->view('admin/list_warrior',$data);
		}
		else {
			$daftar_warrior = array(
								'nopeg'			=> $this->input->post('nopeg'),
								'unit'			=> $this->input->post('unit'),
								'direktorat'	=> $this->input->post('direktorat'),
								'status_aktif'	=> $this->input->post('status_aktif'),
								'email'			=> $this->input->post('email')

						);
			//print_r($daftar_warrior);exit();
			$this->model_admin->tambah_warrior($daftar_warrior);
			redirect('admin/daftar_warrior'); 
			}
	}
	public function edit_warrior($id){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$data['warrior']=$this->model_admin->warrior();
			$this->load->view('admin/list_warrior',$data);
		}
		else {
			$daftar_warrior = array(
								'nopeg'			=> $this->input->post('nopeg'),
								'unit'			=> $this->input->post('unit'),
								'direktorat'	=> $this->input->post('direktorat'),
								'status_aktif'	=> $this->input->post('status_aktif'),
								'email'			=> $this->input->post('email')

						);
			//print_r($daftar_warrior);exit();
			$this->model_admin->update_warrior($id,$daftar_warrior);
			redirect('admin/daftar_warrior'); 
			}
	}

	public function delete_warrior($id){
		$this->model_admin->delete_warrior($id);
		redirect('admin/daftar_warrior');
	}
    
    public function delete_evaluasi(){
        $id = $this->input->post('id');
        $bulan = $this->input->post('bulan');
        
        $data = array(
								'input_status'	=> 5,
								'input_score'	=> 0

						);
        
        $this->model_admin->update_evaluasi_eval($id,$data);
		$this->model_admin->delete_feedback($id);
		redirect('admin/dashboard_indexP/'.$bulan);
	}
    
    function daftar_booster()
	{
		$data['booster']=$this->model_admin->booster();
		//print_r($data);exit();
		$this->load->view('admin/list_booster',$data);
	}
    
    public function tambah_booster(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$data['booster']=$this->model_admin->booster();
			$this->load->view('admin/list_booster',$data);
		}
		else {
			$daftar_booster = array(
								'nopeg'			=> $this->input->post('nopeg'),
								'unit'			=> $this->input->post('unit'),
								'direktorat'	=> $this->input->post('direktorat'),
								'status_aktif'	=> $this->input->post('status_aktif'),
								'email'			=> $this->input->post('email')

						);
			//print_r($daftar_warrior);exit();
			$this->model_admin->tambah_booster($daftar_booster);
			redirect('admin/daftar_booster'); 
			}
	}
	public function edit_booster($id){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$data['booster']=$this->model_admin->warrior();
			$this->load->view('admin/list_booster',$data);
		}
		else {
			$daftar_booster = array(
								'nopeg'			=> $this->input->post('nopeg'),
								'unit'			=> $this->input->post('unit'),
								'direktorat'	=> $this->input->post('direktorat'),
								'email'			=> $this->input->post('email'),
                                'nama_booster'	=> $this->input->post('nama_booster'),
                                'no_hp'	        => $this->input->post('no_hp')
						);
			//print_r($daftar_warrior);exit();
			$this->model_admin->update_booster($id,$daftar_booster);
			redirect('admin/daftar_booster'); 
			}
	}

	public function delete_booster($id){
		$this->model_admin->delete_booster($id);
		redirect('admin/daftar_booster');
	}

	function daftar_tib()
	{
		$data['tib']=$this->model_admin->tib();
		//print_r($data);exit();
		$this->load->view('admin/list_tib',$data);
	}

	public function tambah_tib(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$data['tib']=$this->model_admin->tib();
			$this->load->view('admin/list_tib',$data);
		}
		else {
			$daftar_warrior= array(
								'nopeg'			=> $this->input->post('nopeg'),
								'posisi'		=> $this->input->post('posisi'),
								'unit'			=> $this->input->post('unit'),
								'direktorat'	=> $this->input->post('direktorat'),
								'status_aktif'	=> $this->input->post('status_aktif'),
								'email'			=> $this->input->post('email')

						);
			//print_r($daftar_warrior);exit();
			$this->model_admin->tambah_tib($daftar_warrior);
			redirect('admin/daftar_tib'); 
			}
	}

	public function edit_tib($id){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('nopeg');
		
		if ($this->form_validation->run() == FALSE){
			$data['tib']=$this->model_admin->tib();
			$this->load->view('admin/list_tib',$data);
		}
		else {
			$daftar_warrior= array(
								'nopeg'			=> $this->input->post('nopeg'),
								'posisi'			=> $this->input->post('posisi'),
								'unit'			=> $this->input->post('unit'),
								'direktorat'	=> $this->input->post('direktorat'),
								'status_aktif'	=> $this->input->post('status_aktif'),
								'email'			=> $this->input->post('email')

						);
			//print_r($daftar_warrior);exit();
			$this->model_admin->update_tib($id,$daftar_warrior);
			redirect('admin/daftar_tib'); 
			}
	}

	public function delete_tib($id){
		$this->model_admin->delete_tib($id);
		redirect('admin/daftar_tib');
	}

	public function upload_warrior(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		$data['warrior']=$this->model_admin->warrior();
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/list_warrior',$data);
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/warrior/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/daftar_warrior")."';</script>";
					}
					else {
						// jika berhasil upload ambil data dan masukkan ke database
		                $upload_data = $this->upload->data();

			            //  Include PHPExcel_IOFactory
						include 'PHPExcel/IOFactory.php';

						$inputFileName = $upload_data['full_path'];

						//  Read your Excel workbook
						try {
						    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						    $objPHPExcel = $objReader->load($inputFileName);
						} catch(Exception $e) {
						    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
						}

						//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0); 
						$highestRow = $sheet->getHighestRow(); 
						$highestColumn = $sheet->getHighestColumn();

						//  Loop through each row of the worksheet in turn
						for ($row = 2; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    $this->model_admin->simpanwarrior($rowData);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/warrior/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/daftar_warrior")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}

	public function upload_tib(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		$data['tib']=$this->model_admin->tib();
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/list_tib',$data);
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/tibwarrior/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/daftar_tib")."';</script>";
					}
					else {
						// jika berhasil upload ambil data dan masukkan ke database
		                $upload_data = $this->upload->data();

			            //  Include PHPExcel_IOFactory
						include 'PHPExcel/IOFactory.php';

						$inputFileName = $upload_data['full_path'];

						//  Read your Excel workbook
						try {
						    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						    $objPHPExcel = $objReader->load($inputFileName);
						} catch(Exception $e) {
						    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
						}

						//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0); 
						$highestRow = $sheet->getHighestRow(); 
						$highestColumn = $sheet->getHighestColumn();

						//  Loop through each row of the worksheet in turn
						for ($row = 2; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    $this->model_admin->simpantibwarrior($rowData);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/tibwarrior/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/daftar_tib")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}
    
    public function dashboard_bobot()
		  {
		    $this->form_validation->set_rules('bobot1');
		    $this->form_validation->set_rules('bobot2');
		    $this->form_validation->set_rules('bobot3');
		    $this->form_validation->set_rules('bobot4');
		    $this->form_validation->set_rules('bobot5');
		    $this->form_validation->set_rules('bobot6');
		    
		    $id_bobot=0;

		    if ($this->form_validation->run() == FALSE){
		      $data['bobot'] = $this->model_users->bobot_abc($id_bobot);      
		      $this->load->view('admin/dashboard_bobot', $data);
		    }
		    else {
		        $data_bobot = array(
		            'bobot1'        => set_value('bobot1'),
		            'bobot2'        => set_value('bobot2'),
		            'bobot3'        => set_value('bobot3'),
		            'bobot4'        => set_value('bobot4'),
		            'bobot5'        => set_value('bobot5'),
		            'bobot6'        => set_value('bobot6')
		          );
		        $bobot_total = $data_bobot['bobot2']+$data_bobot['bobot3']+$data_bobot['bobot4']+$data_bobot['bobot5']+$data_bobot['bobot6'];
		        if($bobot_total == 100){
		              $this->model_admin->update_bobot($id_bobot, $data_bobot);
		          $data['bobot'] = $this->model_users->bobot_abc($id_bobot);
		          $this->load->view('admin/dashboard_bobot', $data);
		          $message = "Nilai bobot berhasil disimpan";
		          echo "<script type='text/javascript'>alert('$message');</script>";
		          }
		          else{
		              $data['bobot'] = $this->model_users->bobot_abc($id_bobot);
		          $this->load->view('admin/dashboard_bobot', $data);

		              $message = "Nilai bobot harus sama dengan 100%";
		          echo "<script type='text/javascript'>alert('$message');</script>";
		          }
		        
		      }
			}

	function logout()
	{
        
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function darurat()
	{
	    $data['dataplus'] = $this->model_users->data_plus();
	    foreach($data['dataplus'] as $dp){
        
        if($dp->persen <= 25){
            $nilaibobot3 = 20;
        } else if(25 < $dp->persen && $dp->persen <= 50 ){
            $nilaibobot3 = 40;
        } else if(50 < $dp->persen && $dp->persen <= 75 ){
            $nilaibobot3 = 60;
        } else if(75 < $dp->persen && $dp->persen < 100 ){
            $nilaibobot3 = 80;
        } else{
            $nilaibobot3 = 100;
        }
    
//      update score
        $nb3 = ($nilaibobot3*35)/100;
        $nilaia = 45 + $nb3;
        
        
         $data_program = array(
		            'input_realisasi'   =>  $dp->capaian,
		            'input_realisasi_'        =>  $dp->persen,
		            'input_gap'        =>  $dp->gap,
		            'input_score'        =>  $nilaia,
		            'input_status'        =>  1
		          );
        $this->model_admin->update_sesuatu($dp->kode_unit, $dp->program, $data_program);
        
        $data_input = array(
		            'input_target'   =>  $dp->target
		          );
		$this->model_admin->update_sesuatu22($dp->kode_unit, $dp->program, $data_input);
        
        $data['peval'] = $this->model_admin->selectpeval($dp->kode_unit, $dp->program);
        
        //      feedback
        $data_feedback = array(
                            'fb_id'		        => $data['peval'][0]->input_id,
                            'fb_sender'		    => 'Admin-bj',
                            'fb_recipient'		=> $dp->kode_unit,
                            'fb_content'		=> $dp->evaluasi,
                            'fb_program'		=> $dp->program,
                            'feedback_status'	=> 1
                        );
        
        $this->model_admin->add_feedback22($data_feedback);
	       
		  
	    }
	}
	
	function darurat2()
	{
	    $data['evalinput'] = $this->model_admin->evalinputbutuh();
	    foreach($data['evalinput'] as $de){
	        $realisasi_ =  ($de->input_realisasi/$de->input_target)*100;
	        if(100 - $realisasi_ < 0 ){
	            $gap = 0;
	        } else {
	            $gap = 100 - $realisasi_;
	        }
	        
	        $data_program = array(
                            'input_realisasi_'	=> $realisasi_,
                            'input_gap'		    => $gap
                        );
            $this->model_admin->update_evaluasi($de->input_id,$data_program);
	    }
	    
	}
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
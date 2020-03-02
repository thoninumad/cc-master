<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_radar extends CI_Model {

public function CBUSBY(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG UTAMA SURABAYA'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}

public function BANYUWANGI(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BANYUWANGI'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function JEMBER(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG JEMBER'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function MALANG(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG MALANG'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function MADIUN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG MADIUN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function KEDIRI(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG KEDIRI'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PAMEKASAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PAMEKASAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BOJONEGORO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BOJONEGORO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function LUMAJANG(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG LUMAJANG'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function NGAWI(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG NGAWI'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function JOMBANG(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG JOMBANG'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function KRAKSAAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG KRAKSAAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PROBOLINGGO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PROBOLINGGO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BLITAR(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BLITAR'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function TULUNGAGUNG(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG TULUNGAGUNG'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function TUBAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG TUBAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function MOJOKERTO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG MOJOKERTO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function SUMENEP(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG SUMENEP'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function SAMPANG(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG SAMPANG'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BANGKALAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BANGKALAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PASURUAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PASURUAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function NGANJUK(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG NGANJUK'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function TRENGGALEK(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG TRENGGALEK'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PONOROGO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PONOROGO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PACITAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PACITAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function GRESIK(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG GRESIK'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function SIDOARJO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG SIDOARJO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function LAMONGAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG LAMONGAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function SITUBONDO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG SITUBONDO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BONDOWOSO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BONDOWOSO'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function MAGETAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG MAGETAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function SOETOMO(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG DR. SOETOMO SURABAYA'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PERAK(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PERAK SURABAYA'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function KANGEAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG KANGEAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function JAKARTA(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG JAKARTA'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BATU(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BATU'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BAWEAN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BAWEAN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function PARE(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG PARE'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function KEPANJEN(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG KEPANJEN'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function BATAM(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG BATAM'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}
    
    public function SYARIAH(){
		$havewarrior = $this->db->query("SELECT a.cc_unit, b.nama_unit, a.progress FROM cc_program_overall a JOIN unit b ON a.cc_unit = b.kode_unit WHERE `cc_dir`='CABANG SYARIAH'");
		if($havewarrior->num_rows() > 0){
			return $havewarrior->result();
		}
		else {
			return array();
		}
	}

}
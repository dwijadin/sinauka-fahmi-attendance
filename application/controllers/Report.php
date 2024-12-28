<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Public_model');
    $this->load->model('Admin_model');
  }
  public function index()
  {
    $d['title'] = 'Report';
    $d['account'] = $this->Admin_model->getAdmin($this->session->userdata['username']);
    $d['department'] = $this->db->get('department')->result_array();
    $d['start'] = $this->input->get('start');
    $d['end'] = $this->input->get('end');
    $d['dept_code'] = $this->input->get('dept');
    $d['attendance'] = $this->_attendanceDetails($d['start'], $d['end'], $d['dept_code']);

    $this->load->view('templates/table_header', $d);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('report/index', $d);
    $this->load->view('templates/table_footer');
  }
  private function _attendanceDetails($start, $end, $dept)
  {
    if ($start == '' || $end == '') {
      return false;
    } else {
      return $this->Public_model->get_attendance($start, $end, $dept);
    }
  }
  public function print($start, $end, $dept)
  {
    $d['start'] = $start;
    $d['end'] = $end;
    $d['attendance'] = $this->Public_model->get_attendance($start, $end, $dept);
    $d['dept'] = $dept;

    $this->load->view('report/print', $d);
  }


  public function task() {

    $d['title'] = 'Report';
    $d['department'] = $this->db->get('department')->result_array();
    $d['account'] = $this->Admin_model->getAdmin($this->session->userdata['username']);
    
    // request 
    $time = $this->input->get('waktu');
    $dept = $this->input->get('dept');
    $dt_pegawai_akumulasi = [];
    if ( !empty( $time ) && !empty( $dept ) ) {

      $split_time = explode('-', $time);
      $year = $split_time[0];
      $month = $split_time[1];
      
      $this->db->select('employee.id, name, employee_department.department_id'); // Specify the columns to select
      $this->db->from('employee'); // Main table
      $this->db->join('employee_department', 'employee_department.employee_id = employee.id'); // Join condition
      $this->db->where('department_id', $dept); // Filter by department ID

      $query = $this->db->get(); // Execute the query
      $dt_pegawai = $query->result();

      foreach ( $dt_pegawai AS $row ) {
        $this->db->select('task')->from("attendance");
        $this->db->where("MONTH(FROM_UNIXTIME(in_time)) =", $month, false); // Filter by month
        $this->db->where("YEAR(FROM_UNIXTIME(in_time)) =", $year, false); // Filter by year
        $this->db->where("employee_id", $row->id);
        $query = $this->db->get(); // Execute the query
        $result = $query->result();

        $total = 0;
        foreach ( $result AS $res ) {

          if ( $res->task ) {
            $div = explode(',', $res->task);
            $total += count($div);
          }
        }

        $row->total_task = $total;
        array_push( $dt_pegawai_akumulasi, $row );
      } 
    } 



    $d['attendance'] = $dt_pegawai_akumulasi;
    $d['dept'] = $dept;
    $d['waktu'] = $time;
    

    $this->load->view('templates/table_header', $d);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('report/task', $d);
    $this->load->view('templates/table_footer');
 
  }


  public function report_task() {

    $d['title'] = 'Report';
    $d['account'] = $this->Admin_model->getAdmin($this->session->userdata['username']);
    
    // request 
    $time = $this->input->get('waktu');
    $dept = $this->input->get('dept');

    $dt_pegawai_akumulasi = [];
    if ( !empty( $time ) && !empty( $dept ) ) {

      $split_time = explode('-', $time);
      $year = $split_time[0];
      $month = $split_time[1];
      
      $this->db->select('employee.id, name, employee_department.department_id'); // Specify the columns to select
      $this->db->from('employee'); // Main table
      $this->db->join('employee_department', 'employee_department.employee_id = employee.id'); // Join condition
      $this->db->where('department_id', $dept); // Filter by department ID

      $query = $this->db->get(); // Execute the query
      $dt_pegawai = $query->result();

      foreach ( $dt_pegawai AS $row ) {
        $this->db->select('task')->from("attendance");
        $this->db->where("MONTH(FROM_UNIXTIME(in_time)) =", $month, false); // Filter by month
        $this->db->where("YEAR(FROM_UNIXTIME(in_time)) =", $year, false); // Filter by year
        $this->db->where("employee_id", $row->id);
        $query = $this->db->get(); // Execute the query
        $result = $query->result();

        $total = 0;
        foreach ( $result AS $res ) {

          if ( $res->task ) {
            $div = explode(',', $res->task);
            $total += count($div);
          }
        }

        $row->total_task = $total;
        
        array_push( $dt_pegawai_akumulasi, $row );
      } 
    } 


    $d['dept'] = $dept;
    $d['attendance'] = $dt_pegawai_akumulasi;
  
    $this->load->view('report/print_task', $d);
  }
}

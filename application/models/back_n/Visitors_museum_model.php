<?php
class Visitors_museum_model extends CI_Model{
 
    function visitor_list(){
        $hasil=$this->db->query("SELECT visit_museum_id, DATE_FORMAT(visit_month_year,'%Y-%m') as visit_month_year,visit_dinas,visit_umum,visit_pelajar,visit_asing, visit_dinas + visit_umum + visit_pelajar + visit_asing as Total FROM tbl_visitors_museum");
        return $hasil->result_array();
    }
 
    function save_visitor($visit_id,$bulan_tahun,$dinas,$umum,$pelajar,$asing,$keterangan){
        $hasil=$this->db->query("INSERT INTO tbl_visitors_museum (visit_museum_id,visit_month_year,visit_dinas,visit_umum,visit_pelajar,visit_asing,visit_note)VALUES('$visit_id','$bulan_tahun','$dinas','$umum','$pelajar','$asing','$keterangan')");
        return $hasil;
    }
 
    function get_visitor_by_id($visit_id){
        $hsl=$this->db->query("SELECT * FROM tbl_visitors_museum WHERE visit_museum_id='$visit_id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'visit_museum_id' => $data->visit_museum_id,
                    'visit_month_year' => $data->visit_month_year,
                    'visit_dinas' => $data->visit_dinas,
                    'visit_umum' => $data->visit_umum,
                    'visit_pelajar' => $data->visit_pelajar,
                    'visit_asing' => $data->visit_asing,
                    'visit_note' => $data->visit_note,
                    );
            }
        }
        return $hasil;
    }
    
    function get_pdf_by_id($visit_id){
        $hsl=$this->db->query("SELECT visit_museum_id,visit_month_year,visit_dinas,visit_umum,visit_pelajar,visit_asing, visit_dinas + visit_umum + visit_pelajar + visit_asing as Total FROM tbl_visitors_museum  WHERE visit_museum_id='$visit_id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'visit_museum_id' => $data->visit_museum_id,
                    'visit_month_year' => $data->visit_month_year,
                    'visit_dinas' => $data->visit_dinas,
                    'visit_umum' => $data->visit_umum,
                    'visit_pelajar' => $data->visit_pelajar,
                    'visit_asing' => $data->visit_asing,
                    'Total' => $data->Total,
                    );
            }
        }
        return $hasil;
    }

    function update_visitor($visit_id,$bulan_tahun,$dinas,$umum,$pelajar,$asing,$keterangan){
        $hasil=$this->db->query("UPDATE tbl_visitors_museum SET visit_month_year='$bulan_tahun',visit_dinas='$dinas',visit_umum='$umum',visit_pelajar='$pelajar',visit_asing='$asing',visit_note='$keterangan' WHERE visit_museum_id='$visit_id'");
        return $hasil;
    }
 
    function delete_visitor($visit_id){
        $hasil=$this->db->query("DELETE FROM tbl_visitors_museum WHERE visit_museum_id='$visit_id'");
        return $hasil;
    }
     
    function count_visitor_museum(){
        $query = $this->db->query("SELECT SUM(visit_dinas) as dinas, SUM(visit_umum) as umum, SUM(visit_pelajar) as pelajar, SUM(visit_asing) as asing FROM tbl_visitors_museum");
        return $query;  
    }

}
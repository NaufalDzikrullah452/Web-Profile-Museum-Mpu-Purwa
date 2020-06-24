<?php
class Visitors_museum_model extends CI_Model{
 
    function visitor_list(){
        $hasil=$this->db->query("SELECT visit_museum_id,month_name,visit_year,visit_dinas,visit_umum,visit_pelajar,visit_asing FROM tbl_visitors_museum JOIN tbl_month ON visit_month_id=month_id");
        return $hasil->result();
    }
 
    function save_visitor($visit_id,$bulan,$tahun,$dinas,$umum,$pelajar,$asing,$keterangan){
        $hasil=$this->db->query("INSERT INTO tbl_visitors_museum (visit_museum_id,visit_month_id,visit_year,visit_dinas,visit_umum,visit_pelajar,visit_asing,visit_note)VALUES('$visit_id','$bulan','$tahun','$dinas','$umum','$pelajar','$asing','$keterangan')");
        return $hasil;
    }
 
    function get_visitor_by_id($visit_id){
        $hsl=$this->db->query("SELECT * FROM tbl_visitors_museum WHERE visit_museum_id='$visit_id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'visit_museum_id' => $data->visit_museum_id,
                    'visit_month_id' => $data->visit_month_id,
                    'visit_year' => $data->visit_year,
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
 
    function update_visitor($visit_id,$bulan,$tahun,$dinas,$umum,$pelajar,$asing,$keterangan){
        $hasil=$this->db->query("UPDATE tbl_visitors_museum SET visit_month_id='$bulan',visit_year='$tahun',visit_dinas='$dinas',visit_umum='$umum',visit_pelajar='$pelajar',visit_asing='$asing',visit_note='$keterangan' WHERE visit_museum_id='$visit_id'");
        return $hasil;
    }

    function count_visitor()
    {
        $hasil=$this->db->query("SELECT SUM(visit_dinas) + SUM(visit_umum) + SUM(visit_pelajar) + SUM(visit_asing) AS total FROM tbl_visitors_museum");
        return $hasil->total;
    }
 
    function delete_visitor($visit_id){
        $hasil=$this->db->query("DELETE FROM tbl_visitors_museum WHERE visit_museum_id='$visit_id'");
        return $hasil;
    }
     
    function get_month(){
        $query = $this->db->get('tbl_month');
        return $query;  
    }
}
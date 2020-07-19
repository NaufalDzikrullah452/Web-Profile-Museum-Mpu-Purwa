<?php
class Visitors_museum extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
        $this->load->model('back_n/Visitors_museum_model','visitors_museum_model');
        $this->load->helper('text');
    }

    function index(){
        $x['title']= "Data Pengunjung";
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_visitors_museum');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_visitors_museum');
	}
    
    function data_visitor(){
        $data=$this->visitors_museum_model->visitor_list();
        echo json_encode($data);
    }
 
    function get_visitor(){
        $visit_id=$this->input->get('id');
        $data=$this->visitors_museum_model->get_visitor_by_id($visit_id);
        echo json_encode($data);
    }

    function get_visitor2(){
        $visit_id=$this->input->get('id');
        $data=$this->visitors_museum_model->get_pdf_by_id($visit_id);
        echo json_encode($data);
    }
 
    function save_visitor(){
        $visit_id=$this->input->post('visit_id');
        $bulan_tahun=$this->input->post('bulan_tahun');
        $dinas=$this->input->post('dinas');
        $umum=$this->input->post('umum');
        $pelajar=$this->input->post('pelajar');
        $asing=$this->input->post('asing');
        $keterangan=$this->input->post('keterangan');
        $data=$this->visitors_museum_model->save_visitor($visit_id,$bulan_tahun,$dinas,$umum,$pelajar,$asing,$keterangan);
        echo json_encode($data);
    }
 
    function update_visitor(){
        $visit_id=$this->input->post('visit_id');
        $bulan_tahun=$this->input->post('bulan_tahun');
        $dinas=$this->input->post('dinas');
        $umum=$this->input->post('umum');
        $pelajar=$this->input->post('pelajar');
        $asing=$this->input->post('asing');
        $keterangan=$this->input->post('keterangan');
        $data=$this->visitors_museum_model->update_visitor($visit_id,$bulan_tahun,$dinas,$umum,$pelajar,$asing,$keterangan);
        echo json_encode($data);
    }
 
    public function pdf_output()
	{
        
        $visit_id=$this->input->post('visit_id');
        $bulan_tahun=$this->input->post('bulan_tahun');
        $nama_cb=$this->input->post('nama_cb');
        $desa=$this->input->post('desa');
        $dusun=$this->input->post('dusun');
        $kecamatan=$this->input->post('kecamatan');
        $kabupaten=$this->input->post('kabupaten');
        $no1=$this->input->post('no_1');
        $no2=$this->input->post('no_2');
        $no3=$this->input->post('no_3');
        $no4=$this->input->post('no_4');
        $no5=$this->input->post('no_5');
        $no6=$this->input->post('no_6');
        $no7=$this->input->post('no_7');
        $no8=$this->input->post('no_8');
        $no9=$this->input->post('no_9');
        $kondisi=$this->input->post('kondisi');
        $tgl=$this->input->post('tgl');
        $permasalahan=$this->input->post('permasalahan');
        $dinas=$this->input->post('dinas');
        $umum=$this->input->post('umum');
        $pelajar=$this->input->post('pelajar');
        $asing=$this->input->post('asing');
        $total=$this->input->post('total');

        $this->load->library('pdf');
		
        $html_content = '<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Pengunjung Bulanan</title>
</head>
<style>
    .jarak {
  padding: 2px;
}
</style>
<body>
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    LAPORAN BULANAN
                    <br>JURU PELIHARA CAGAR BUDAYA
                    <br><u>DINAS KEBUDAYAAN DAN PARIWISATA JAWA TIMUR</u>
                </span>
            </td>
        </tr>
    </table>
    <br><br>';
    

      $html_content .= '
    <table width="100%">
        <tr>
            <td width="100px" class="jarak">Bulan</td>
            <td width="10px" class="jarak" >:</td>
            <td class="jarak">'.date('F',strtotime($bulan_tahun)).'</td>';
    
        $html_content.='
            <td width="100px" class="jarak" ></td>
            <td width="100px" class="jarak" >Tahun</td>
            <td width="10px" class="jarak">:</td>
            <td>'.date('Y',strtotime($bulan_tahun)).'</td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Nama Cagar Budaya</td>
            <td width="10px" class="jarak">:</td>
            <td>'.$nama_cb.'</td>
            <td width="100px" class="jarak"></td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Lokasi</td>
            <td width="10px" class="jarak">:</td>
            <td></td>
            <td width="100px" class="jarak"></td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Desa</td>
            <td width="10px" class="jarak">:</td>
            <td> '.$desa.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">Dusun</td>
            <td width="10px" class="jarak">:</td>
            <td>'.$dusun.'</td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Kecamatan</td>
            <td width="10px" class="jarak">:</td>
            <td>'.$kecamatan.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">Kabupaten</td>
            <td width="10px" class="jarak">:</td>
            <td>'.$kabupaten.'</td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Cagar Budaya yang dikelola</td>
            <td width="10px" class="jarak">:1.</td>
            <td>'.$no1.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">2.&nbsp;&nbsp;'.$no2.'</td>
            <td></td>
        </tr>

        <tr>
            <td width="100px" class="jarak"></td>
            <td width="10px" class="jarak">:3.</td>
            <td>'.$no3.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">4.&nbsp;&nbsp;'.$no4.'</td>
            <td></td>
tr>

        <tr>
            <td width="100px" class="jarak"></td>
            <td width="10px" class="jarak">:5.</td>
            <td>'.$no5.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">6.&nbsp;&nbsp;'.$no6.'</td>
            <td></td>
        </tr>

        <tr>
            <td width="100px" class="jarak"></td>
            <td width="10px" class="jarak">:7.</td>
            <td>'.$no7.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">8.&nbsp;&nbsp;'.$no8.'</td>
            <td></td>
        </tr>

        <tr>
            <td width="100px" class="jarak"></td>
            <td width="10px" class="jarak">:9.</td>
            <td>'.$no9.'</td>
            <td width="100px" class="jarak"></td>
            <td width="100px" class="jarak">10. dsb</td>
            <td></td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Kondisi Sarana Prasarana</td>
            <td width="10px" class="jarak">:</td>
            <td>'.$kondisi.'</td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Permasalahan di Situs/BCB</td>
            <td width="10px" class="jarak">:</td>
            <td>'.$permasalahan.'</td>
        </tr>

        <tr>
            <td width="100px" class="jarak">Jumlah Pengunjung</td>
            <td width="10px" class="jarak">:</td>
            <td></td>
        </tr>

        <tr>
            <td width="100px" style="text-align: right; padding-right: 70px;">-&nbsp; Dinas</td>
            <td width="10px" >:</td>
            <td>'.$dinas.'</td>
        </tr>

        <tr>
            <td width="100px" style="text-align: right; padding-right: 60px;">-&nbsp; Umum</td>
            <td width="10px">:</td>
            <td>'.$umum.'</td>
        </tr>

        <tr>
            <td width="100px" style="text-align: right; padding-right: 60px;">-&nbsp; Pelajar</td>
            <td width="10px" >:</td>
            <td>'.$pelajar.'</td>
        </tr>

        <tr>
            <td width="100px" style="text-align: right; padding-right: 70px;">-&nbsp; Asing</td>
            <td width="10px" >:</td>
            <td>'.$asing.'</td>
        </tr>

        <tr>
            <td width="100px" style="text-align: right; padding-right: 25px;">-&nbsp; Jumlah Total</td>
            <td width="10px">:</td>
            <td>'.$total.'</td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <tr>
            <td width="100px" style="text-align: right; padding-right: 100px;">Malang, '.tanggal('d F Y ',strtotime($tgl)).'</td>
        </tr>
    </table>
    <br><br>


    <table width="100%">
        <tr>
            <td style="padding-left: 40px;">
                Mengetahui,
            </td>
        </tr>
        <tr>
            <td>
                <center>KASI JARAHITNA DAN PERMUSEUMAN</center>
            </td>
        </tr>
        <tr>
            <td>
                <center>DISBUDPAR KOTA MALANG</center>
            </td>
            <td>
                <center>JURU PELIHARA/PELAPOR</center>
            </td>
        </tr>

    </table>
    <br><br><br><br>
    <table width="100%">
        <tr>
            <td>
                <center><u>Dra. WIWIK WR. M.Si</u></center>
            </td>
            <td>
                <center><u>MIMIN YUNI MARITA</u></center>
            </td>
        </tr>
        <tr>
            <td>
                <center><b>NIP. 196308151998032002</b></center>
            </td>
            <td>

            </td>

        </tr>
    </table>
    <br><br>

</body>

</html>';

        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream("Cetak Laporan Bulanan Pengunjung Museum Mpu Purwa ".date('F Y',strtotime($bulan_tahun)).".pdf", array("Attachment"=>0));
    }

    function delete_visitor(){
        $visit_id=$this->input->post('id');
        $data=$this->visitors_museum_model->delete_visitor($visit_id);
        echo json_encode($data);
    }
 
}
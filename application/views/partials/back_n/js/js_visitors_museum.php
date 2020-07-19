<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_visitor();   //pemanggilan fungsi tampil Visitor.
         
        $('#1').dataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "searchable": false,
        "searching":false,
        
        
 
    });

    
        //fungsi tampil Visitor
        function tampil_data_visitor(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>index.php/back_n/visitors_museum/data_visitor',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    $no=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+ $no++ +'</td>'+
                                '<td>'+data[i].visit_month_year+'</td>'+
                                '<td>'+data[i].visit_dinas+'</td>'+
                                '<td>'+data[i].visit_umum+'</td>'+
                                '<td>'+data[i].visit_pelajar+'</td>'+
                                '<td>'+data[i].visit_asing+'</td>'+
                                '<td>'+data[i].Total+'</td>'+
                                '<td style="vertical-align: middle;">'+
                                '<div class="btn-group">'+''+
                                    '<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>'+''+
                                    '<div class="dropdown-menu dropdown-menu-right" role="menu">'+''+
                                        '<a class="dropdown-item pdf" href="javascript:void(0);" data="'+data[i].visit_museum_id+'"><i class="fa fa-file-pdf-o"></i> Laporan</a>'+''+
                                        '<a class="dropdown-item item_edit" href="javascript:void(0);" data="'+data[i].visit_museum_id+'"><i class="fa fa-edit"></i> Edit</a>'+''+
                                        '<a class="dropdown-item item_delete" href="javascript:void(0);" data="'+data[i].visit_museum_id+'"><i class="fa fa-trash"></i> Hapus</a>'+''+
                                    '</div>'+''+
                                                '</div>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/back_n/visitors_museum/get_visitor')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(visit_museum_id, visit_month_year, visit_dinas, visit_umum, visit_pelajar, visit_asing, visit_note){
                        $('#EditModal').modal('show');
                        $('[name="visit_id_edit"]').val(data.visit_museum_id);
                        $('[name="bulan_tahun_edit"]').val(data.visit_month_year);
                        $('[name="tahun_edit"]').val(data.visit_year);
                        $('[name="dinas_edit"]').val(data.visit_dinas);
                        $('[name="umum_edit"]').val(data.visit_umum);
                        $('[name="pelajar_edit"]').val(data.visit_pelajar);
                        $('[name="asing_edit"]').val(data.visit_asing);
                        $('[name="keterangan_edit"]').val(data.visit_note);
                    });
                }
            });
            return false;
        });

         //GET Visitor data
        $('#show_data').on('click','.pdf',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/back_n/visitors_museum/get_visitor2')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(visit_museum_id, visit_month_year, visit_dinas, visit_umum, visit_pelajar, visit_asing, Total){
                        $('#LaporanModal').modal('show');
                        $('[name="visit_id"]').val(data.visit_museum_id);
                        $('[name="bulan_tahun"]').val(data.visit_month_year);
                        $('[name="tahun"]').val(data.visit_year);
                        $('[name="dinas"]').val(data.visit_dinas);
                        $('[name="umum"]').val(data.visit_umum);
                        $('[name="pelajar"]').val(data.visit_pelajar);
                        $('[name="asing"]').val(data.visit_asing);
                        $('[name="total"]').val(data.Total);
                    });
                }
            });
            return false;
        });
        
        $('#buttonpdf').submit(function(e) {
    e.preventDefault();
    // Coding
    $('#LaporanModal').modal('hide'); //or  $('#IDModal').modal('hide');
    return false;
    });
 
        //GET HAPUS
        $('#show_data').on('click','.item_delete',function(){
            var id=$(this).attr('data');
            $('#DeleteModal').modal('show');
            $('[name="id"]').val(id);
        });
 
        //Simpan Visitor
        $('#btn_save').on('click',function(){
            var visit_id=$('#visit_museum_id').val();
            var bulan_tahun=$('#visit_month_year').val();
            var tahun=$('#visit_year').val();
            var dinas=$('#visit_dinas').val();
            var umum=$('#visit_umum').val();
            var pelajar=$('#visit_pelajar').val();
            var asing=$('#visit_asing').val();
            var keterangan=$('#visit_note').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/back_n/visitors_museum/save_visitor')?>",
                dataType : "JSON",
                data : {visit_id:visit_id , bulan_tahun:bulan_tahun, dinas:dinas, umum:umum, pelajar:pelajar, asing:asing, keterangan:keterangan},
                success: function(data){
                    $('[name="visit_id"]').val("");
                    $('[name="bulan_tahun"]').val("");
                    $('[name="dinas"]').val("");
                    $('[name="umum"]').val("");
                    $('[name="pelajar"]').val("");
                    $('[name="asing"]').val("");
                    $('[name="keterangan"]').val("");
                    $('#AddModal').modal('hide');
                    tampil_data_visitor();
                }
            });
            return false;
        });
 
        //Update Visitor
        $('#btn_update').on('click',function(){
            var visit_id=$('#visit_museum_id2').val();
            var bulan_tahun=$('#visit_month_year2').val();
            var dinas=$('#visit_dinas2').val();
            var umum=$('#visit_umum2').val();
            var pelajar=$('#visit_pelajar2').val();
            var asing=$('#visit_asing2').val();
            var keterangan=$('#visit_note2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/back_n/visitors_museum/update_visitor')?>",
                dataType : "JSON",
                data : {visit_id:visit_id , bulan_tahun:bulan_tahun, dinas:dinas, umum:umum, pelajar:pelajar, asing:asing, keterangan:keterangan},
                success: function(data){
                    $('[name="visit_id_edit"]').val("");
                    $('[name="bulan_tahun_edit"]').val("");
                    $('[name="dinas_edit"]').val("");
                    $('[name="umum_edit"]').val("");
                    $('[name="pelajar_edit"]').val("");
                    $('[name="asing_edit"]').val("");
                    $('[name="keterangan_edit"]').val("");
                    $('#EditModal').modal('hide');
                    tampil_data_visitor();
                }
            });
            return false;
        });
        //Hapus Visitor
        $('#btn_delete').on('click',function(){
            var id=$('#textid').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/back_n/visitors_museum/delete_visitor')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){
                            $('#DeleteModal').modal('hide');
                            tampil_data_visitor();
                    }
                });
                return false;
            });
 
    });
 
</script>
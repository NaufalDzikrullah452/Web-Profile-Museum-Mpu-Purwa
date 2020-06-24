        <script>
            $(document).ready(function(){
                $('#data-table').dataTable();

                //Edit Record
                $('.btn-edit').on('click',function(){
                    var id=$(this).data('id');
                    var name=$(this).data('tag');
                    $('[name="kode"]').val(id);
                    $('[name="tag2"]').val(name);
                    $('#EditModal').modal('show');
                });

                //Edit Record
                $('.btn-delete').on('click',function(){
                    var id=$(this).data('id');
                    $('[name="id"]').val(id);
                    $('#DeleteModal').modal('show');
                });

            });
        </script>

        <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Tag Saved!",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Info',
                        text: "Tag Updated!",
                        showHideTransition: 'slide',
                        icon: 'info',
                        position: 'bottom-right',
                        bgColor: '#00C9E6',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success-delete'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Tag Deleted!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php else:?>

        <?php endif;?>
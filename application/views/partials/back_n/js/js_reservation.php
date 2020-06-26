        <script type="text/javascript">
            $(document).ready(function(){
                $('#mytable').DataTable();

                $('.delete').on('click',function(){
                    var reserv_id=$(this).data('reserv_id');
                    $('#ModalDelete').modal('show');
                    $('[name="kode"]').val(reserv_id);
                });

                $('.validation').on('click',function(){
                    var reserv_id=$(this).data('reserv_id');
                    $('#ModalValidation').modal('show');
                    $('[name="reserv_id2"]').val(reserv_id);
                });
               
            });
        </script>
        <!--Toast Message-->
            <?php if($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Info',
                        text: "Data Status Change",
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
                        text: "Data Deleted!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
            <?php elseif($this->session->flashdata('msg')=='success-edit'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Data Updated!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
            <?php elseif($this->session->flashdata('msg')=='success-sent'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Email sent.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
            <?php elseif($this->session->flashdata('msg')=='error-sent'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Failed',
                        text: "Message could not be sent.",
                        showHideTransition: 'slide',
                        icon: 'danger',
                        position: 'bottom-right',
                        bgColor: '#e74c3c',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
            <?php elseif($this->session->flashdata('msg')=='success-download'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "File Downloaded",
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
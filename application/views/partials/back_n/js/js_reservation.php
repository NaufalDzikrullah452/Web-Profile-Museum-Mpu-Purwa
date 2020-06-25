        <script type="text/javascript">
            $(document).ready(function(){
                $('#mytable').DataTable();

                $('.btn-reply').on('click',function(){
                    var comm_id=$(this).data('comment_id');
                    var post_id=$(this).data('post_id');
                    $('#ReplyModal').modal('show');
                    $('[name="comment_id"]').val(comm_id);
                    $('[name="post_id"]').val(post_id);
                });

                $('.btn-edit').on('click',function(){
                    var comm_id=$(this).data('comment_id');
                    var msg =$(this).data('comment_msg');
                    $('#EditModal').modal('show');
                    $('[name="comment_id2"]').val(comm_id);
                    $('.comment').val(msg);
                    $('.comment').code(msg);
                });

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
            <?php if($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Order Confirmed",
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
                        text: "Order Status Change",
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
                        text: "Order Deleted!.",
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
                        text: "Comment Updated!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
            <?php elseif($this->session->flashdata('msg')=='success-validation'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Data Validated!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
            <?php elseif($this->session->flashdata('msg')=='success-change'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Image Changed!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
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
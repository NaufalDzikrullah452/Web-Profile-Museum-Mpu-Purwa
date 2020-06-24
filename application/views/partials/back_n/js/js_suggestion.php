<script type="text/javascript">
            $(document).ready(function(){
                $('.table-responsive table tr td').not(":first-child").on('click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    var suggestion_id=$(this).data('suggestion_id');

                    window.location = "<?php echo site_url('index.php/back_n/suggestion/read/');?>"+suggestion_id;
                });

                $('.btn-delete').on('click',function(){
                    var suggestion_id=$(this).data('suggestion_id');
                    $('#DeleteModal').modal('show');
                    $('[name="id"]').val(suggestion_id);
                });
            });
        </script>
         <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Message Deleted.",
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
                        text: "Not Found",
                        showHideTransition: 'slide',
                        icon: 'info',
                        position: 'bottom-right',
                        bgColor: '#00C9E6',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php else:?>

        <?php endif;?>
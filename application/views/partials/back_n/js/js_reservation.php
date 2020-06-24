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

                $('.btn-delete').on('click',function(){
                    var comm_id=$(this).data('comment_id');
                    $('#DeleteModal').modal('show');
                    $('[name="comment_id3"]').val(comm_id);
                });

                $('.btn-publish').on('click',function(){
                    var comm_id=$(this).data('comment_id');
                    $('#PublishModal').modal('show');
                    $('[name="comment_id4"]').val(comm_id);
                });

                $('.btn-image').on('click',function(){
                    var comm_id=$(this).data('comment_id');
                    var name=$(this).data('name');
                    var email=$(this).data('email');
                    $('#ImageModal').modal('show');
                    $('[name="comment_id5"]').val(comm_id);
                    $('[name="name"]').val(name);
                    $('[name="email"]').val(email);
                });
                
                
                $('.summernote').summernote({
                  height: 200,
                  toolbar: [    
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],       
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ["fullscreen", "codeview", "help"]],
                      ],

                    onImageUpload: function(files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    } 
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
        <?php elseif($this->session->flashdata('msg')=='success-publish'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Comment Published!.",
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
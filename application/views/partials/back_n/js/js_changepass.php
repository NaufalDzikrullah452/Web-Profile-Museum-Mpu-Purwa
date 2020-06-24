 <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Password Changed.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        bgColor: '#7EC857',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-notmatch'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password and Confirm Password doesn't match.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'bottom-right',
                        bgColor: '#FF4859',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-notfound'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password was not found.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'bottom-right',
                        bgColor: '#FF4859',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "User ID was not found.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'bottom-right',
                        bgColor: '#FF4859',
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000"
                    });
            </script>
        <?php else:?>

        <?php endif;?>
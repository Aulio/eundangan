
 <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="<?php echo base_url(); ?>assets/akun/images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="contact-form bottom">
                        <h2>Kontak Kami</h2>
                    <section id="map-section">
                    <div class="container">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d247.88366611489855!2d106.8310985!3d-6.2454517!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2b8faa717d2c90bf!2sMadrasah+Alawiyah+Al-Khairiyah!5e0!3m2!1sen!2sid!4v1480844286852" width="64%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen ></iframe>

                        <div class="contact-info">
                           
                            <address><hr>
                                Jl. Mampang Prapatan IV No.74, RT.10/RW.2, Tegal Parang,  <br>
                                Mampang Prapatan., <br>
                                Kota Jakarta Selatan, <br>
                                Daerah Khusus Ibukota Jakarta 12790. <br><hr>
                                E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br>
                                Phone: (021) 7985489 <br>
                                Fax: (021) 7985489 <br><hr>
                                
                                
                            </address>
                        </div>
                    </div>
                </section>
            </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-info bottom">
                        <h2>Tentang Kami</h2><br>
                        <address>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
                        Sed sit amet porta leo, gravida euismod massa. Vivamus efficitur id dui sed pulvinar. <br>
                        Vestibulum in justo eu eros mollis vehicula. Ut augue risus, rhoncus non lorem vel, viverra pulvinar nisi. <br>
                        </address>

                        <h2>Bantuan</h2>
                        <address>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> 
                        Sed sit amet porta leo, gravida euismod massa. Vivamus efficitur id dui sed pulvinar. <br>
                        Vestibulum in justo eu eros mollis vehicula. Ut augue risus, rhoncus non lorem vel, viverra pulvinar nisi. <br>
                        Nam molestie est quam, a molestie odio dapibus quis. Fusce fermentum rhoncus erat, eu suscipit lacus sodales in. 
                        </address>
                    </div>
                </div>
              
                <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>2016 &copy; Madrasah Alawiyah Al-Khairiyah. All rights reserved.<br> <a href="#">Privacy Policy</a> | <a href="#">Terms Of Service</a>
                    <br>
                Designed by <a href="http://niscalindo.com" target="_blank">Niscalindo</a></p>
            </div>
        </div>
            </div>
        </div>
            <a href="" class="go-top" data-lilili="tooltip" data-original-title="Kembali ke atas"><span class="fa fa-chevron-up"></span></a>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/akun/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/akun/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/akun/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/akun/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/akun/js/main.js"></script>
    <script type="text/javascript">
      $(document).ready( function(){
        var link_base = "<?php echo base_url();?>";

        $('[data-lilili="tooltip"]').tooltip();

       $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $('.go-top').fadeIn(200);
                } else {
                    $('.go-top').fadeOut(200);
                }
            });
            
            // Animate the scroll to top
            $('.go-top').click(function(event) {
                event.preventDefault();
                
                $('html, body').animate({scrollTop: 0}, 300);
            })
        
      });

    </script>
    <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    script: '<?php echo base_url(); ?>assets/admin/assets/filetree/jqueryFileTree.php',
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
        </script> 
   <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url(); ?>assets/admin/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url(); ?>assets/admin/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <!-- // <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery/jquery-ui.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->  
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/filetree/jqueryFileTree.js"></script>

                 <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/bootstrap/bootstrap-file-input.js"></script>
              <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/fileinput/fileinput1.min.js"></script>

        <!--<script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/plugins/icheck/icheck.min.js'></script> -->       
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
       <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/morris/morris.min.js"></script>   -->    
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/rickshaw/rickshaw.min.js"></script>
        <!--<script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>             
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/admin/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                  
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/owl/owl.carousel.min.js"></script> -->                 
        
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/daterangepicker/daterangepicker.js"></script>-->
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/actions.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/demo_dashboard.js"></script>
</body>
</html>
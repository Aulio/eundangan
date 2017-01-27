  <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                                <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
 <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <footer id="footer">
                <div class="container">
                    <div class="col-md-8">
                        <p class="copyright">Copyright: <span>2015</span> . Design and Developed by <a href="http://www.Themefisher.com">Themefisher</a></p>
                    </div>
                    <div class="col-md-4">
                        <!-- Social Media -->
                        <ul class="social">
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Linkedin">
                                    <i class="ion-social-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <a href="" class="go-top" data-lilili="tooltip" data-original-title="Kembali ke atas"><span class="fa fa-chevron-up"></span></a>
            </footer> <!-- /#footer -->



               <!-- Template Javascript Files
        ================================================== -->
        <!-- modernizr js -->
        <script src="<?php echo base_url(); ?>assets/timer/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- jquery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- owl carouserl js -->
        <script src="<?php echo base_url(); ?>assets/timer/js/owl.carousel.min.js"></script>
        <!-- bootstrap js -->

        <script src="<?php echo base_url(); ?>assets/timer/js/bootstrap.min.js"></script>
        <!-- wow js -->
        <script src="<?php echo base_url(); ?>assets/timer/js/wow.min.js"></script>
        <!-- slider js -->
        <script src="<?php echo base_url(); ?>assets/timer/js/slider.js"></script>
        <script src="<?php echo base_url(); ?>assets/timer/js/jquery.fancybox.js"></script>
        <!-- template main js -->
        <script src="<?php echo base_url(); ?>assets/timer/js/main.js"></script>
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

        
        </body>
    </html>
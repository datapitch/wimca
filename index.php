<?php
    include('server.php');

        if (($_POST['firstName'] === $firstName) && ($_POST['email'] === $email))  {
                  echo '
                        <script type="text/javascript">
                        alert("Already registered!");
                         </script>
                        ';
        }
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <!-- FontAwesome Min CSS -->
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <!-- Style Min CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets/css/responsive.css">

        <title>Women in Marketing Communications Award (WIMCA) 2021</title>
        <link rel="icon" href="https://wimca.ng/wp-content/uploads/2021/09/favicon.png">
        <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />        <style>
                       
            
            </style>
    </head>

    <body>

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
        <!-- End Preloader -->
        
        <!-- Start Coming Soon Area -->
        <div class="coming-soon-area">
            <!-- <video loop muted autoplay poster="#" class="video-background">
				<source src="assets/video/world.mp4" type="video/mp4">
            </video>> -->

           

            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="coming-soon-content">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo.png" alt="image" ></a>
                            </div>
                            
                            <div id="timer">
                                <div id="days"></div>
                                <div id="hours"></div>
                                <div id="minutes"></div>
                                <div id="seconds"></div>
                            </div>

                           <!-- <div class="heading-contain"> 
                            <h1>Are you ready to have a <span class="slice-margical">slice</span> of the pie!</h1>
                           </div> 
                            <p>Many marriages are struggling to work, burdened with several issues on the table, but often more than the abilities couples to handle.

                            <b>FOREVER YOURS</b> is a Free-to-Attend, event for couples to unwind, discuss and learn through experience sharing, some credible strategies that can help fix these issues.
                                
                            </p> -->

                            <div class="btn-box">
                                <button class="btn btn-primary notify-btn">Get Notified</button>
                                <button class="btn btn-primary get-more-info-btn">Register!</button>
                            </div>
                            <div class="link-below-button">
                                <a href="http://wimca.ng" target="_blank" rel="noopener noreferrer"> Go to event page</a>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>

            <div id="particles-js"></div>

            <footer class="footer-area">
                <div class="container">
                    
                </div>
            </footer>
        </div>
        <!-- End Coming Soon Area -->

        <!-- Sidebar Modal -->
        <div class="sidebar-modal">
            <div class="sidebar-modal-inner">
    
                <div class="contact-area"> 
                    <form id="contactForm" method = "post" action = "index.php">
                        <div class="form-group">
                            <div class="form_wrapper">
                                <div class="form_container">
                                   <div class="title_container">
                                        <h2>Register for WIMCA 2021</h2>
                                    </div>
                                    
                                    <div class="help-block with-errors">
                                        
                                    </div>
                                    <div class="row clearfix">
                                        <div class="">
                    
                                        <div class="row clearfix">
                                            <div class="col_half">
                                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                <input type="text" name="firstName" id="firstName" placeholder="First Name" required data-error="Please enter your first name" />
                                                
                                                </div>
                                            </div>
                                            <div class="col_half">
                                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                <input type="text" name="lastName" id="lastName" placeholder="Last Name" required data-error="Please enter your last name" />
                                             
                                                </div>
                                            </div>
                                            </div> 
                                            <div class="row clearfix">
                                                <div class="col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-briefcase"></i></span>
                                                        <input type="text" name="organisation" id="organisation"placeholder="Organisation" required data-error="Please enter your Organisation" />
                                                     
                                                    </div>
                                                </div>
                                                <div class="col_half">
                                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                        <input type="text" name="designation" id="designation" placeholder="Designation" required data-error="Please enter your Designation" />
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                            <input type="email" name="email" id="email" placeholder="Email" required data-error="Please enter your email" />
                                   
                                            </div>
                                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                                                <input type="text" name="mobileNumber" id="mobileNumber" placeholder="Mobile Number:  e.g. 2348023456789 " required data-error="Please enter your mobile number"/>
                                            
                                            </div>
                                            
                                                <div class="input_field select_option">
                                                <label>How did you hear about the Event?</label>
                                                <select name="source" id="source">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Instagram">Instagram </option>
                                                    <option value="Website">Website</option>
                                                    <option value="Billboards">Billboards</option>
                                                    <option value="Word of Mout">Word of Mouth</option>
                                                    <option value="TV">TV</option>
                                                    <option value="Radio">Radio</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Linkedin">Linkedin</option>
                                                </select>
                                                <div class="select_arrow"></div>
                                                </div>
                                            <input class="button" type="submit" value="Register" id='submitBtn' name="submitBtn" />
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <span class="close-btn sidebar-modal-close-btn"><i class="fas fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Sidebar Modal -->

        <!-- Subscribe Modal -->
        <div class="subscribe-modal">
            <div class="subscribe-modal-inner">
                <div class="subscribe-modal-content">
                    <div class="newsletter-header">
                        <div class="animation-icons">
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                            <span class="animate-icon"><i class="far fa-envelope"></i></span>
                        </div>
    
                        <img src="assets/img/logo.png" alt="image" width="60%">
                    </div>
    
                    <h2>WIMCA Contact List</h2>
                    <p>Kindly input your email address to join the WIMCA mailing list. All updates will be pushed to your inbox!</p>
    
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="input-newsletter" placeholder="Enter email address" name="EMAIL" required autocomplete="off">
    
                        <button type="submit">JOIN</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
    
                    <span class="close-btn subscribe-modal-close-btn"><i class="fas fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Subscribe Modal -->
        
        <!-- jQuery Min JS -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Popper Min JS -->
        <script src="assets/js/popper.min.js"></script>
        <!-- Bootstrap Min JS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Particles Min JS -->
        <script src="assets/js/particles.min.js"></script>
        <!-- WOW Min JS -->
        <script src="assets/js/wow.min.js"></script>
        <!-- Main JS -->
        <script src="assets/js/main.js"></script>
        <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
    </body>
</html>
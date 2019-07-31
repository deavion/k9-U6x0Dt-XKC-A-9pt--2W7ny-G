<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stack Multipurpose HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
<?=link_tag('Stack 2.0.6/css/bootstrap.css')?>
<?=link_tag('Stack 2.0.6/css/stack-interface.css')?>
<?=link_tag('Stack 2.0.6/css/socicon.css')?>
<?=link_tag('Stack 2.0.6/css/lightbox.min.css')?>
<?=link_tag('Stack 2.0.6/css/flickity.css')?>
<?=link_tag('Stack 2.0.6/css/iconsmind.css')?>
<?=link_tag('Stack 2.0.6/css/jquery.steps.css')?>
<?=link_tag('Stack 2.0.6/css/theme.css')?>
<?=link_tag('Stack 2.0.6/css/custom.css')?>
<?=link_tag('https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i')?>
<?=link_tag('https://fonts.googleapis.com/icon?family=Material+Icons')?>
    </head>
    <body class=" ">
        <a id="start"></a>
        <div class="nav-container ">
            <nav class="bar bar-4 bar--transparent bar--absolute" data-fixed-at="200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 col-md-offset-0 col-4">
                            <div class="bar__module">
                                <a href="index.html">
                                    <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                                    <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>
        <div class="main-container">
            <section class="imageblock switchable feature-large height-100">
                <div class="imageblock__content col-lg-6 col-md-4 pos-right">
                    <div class="background-image-holder">
                        <img alt="image" src="<?=base_url()?>Stack 2.0.6/img/inner-7.jpg" />
                    </div>
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                    	<div class="col-lg-5 col-md-7">
                            <h2>Login to continue</h2>
                            <p class="lead">
                                Welcome back, sign in with your existing Stack account credentials
                            </p>
                            <?=form_open()?>
                            <?=$this->session->flashdata('message')?>
                            <?=form_error('nusername')?>
                            <?=form_error('npassword')?>
                                <div class="row">
                                    <div class="col-md-12">
                                    	<?=form_input(array('name'=>'nusername','placeholder'=>'Username',))?>
                                    </div>
                                    <div class="col-md-12">
                                    	<?=form_password(array('name'=>'npassword','placeholder'=>'Password',))?>
                                    </div>
                                    <div class="col-md-12">
                                    	<?=form_submit(array('class'=>'btn btn--primary type--uppercase','name'=>'submit','value'=>'Login',))?>
                                    </div>
                                </div>
                                <!--end of row-->
                            <?=form_close()?>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        </div>
        <!--<div class="loader"></div>-->
        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
<script src="<?=base_url()?>Stack 2.0.6/js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/flickity.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/easypiechart.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/parallax.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/typed.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/datepicker.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/isotope.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/ytplayer.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/lightbox.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/granim.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/jquery.steps.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/countdown.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/twitterfetcher.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/spectragram.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/smooth-scroll.min.js"></script>
<script src="<?=base_url()?>Stack 2.0.6/js/scripts.js"></script>
    </body>
</html>
<script type='text/javascript'>
$(function() {
    $('a.reply').click(function() {
        var id = $(this).attr('id');
        $('#idparent').attr('value', id);
        $('#nname').focus();
    });
});
</script>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <?=$bararticle=(isset($bararticle))?$bararticle:'$bararticle'?>
                <!--end item-->
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="boxed boxed--lg bg--dark subscribe-form-1">
                    <h3>Get our latest content in your inbox</h3>
                    <h5>Join over 20,000 satisfied customers</h5>
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-left">
                            <form>
                                <input type="text" name="name" placeholder="Your Name" />
                                <input type="email" name="email" placeholder="Email Address" />
                                <div class="input-checkbox">
                                    <input type="checkbox" name="agree" />
                                    <label></label>
                                </div>
                                <span>I have read and agree to the 
                                    <a href="#">terms and conditions</a>
                                </span>
                                <button type="submit" class="btn btn--primary type--uppercase">Subscribe To Newsletter</button>
                            </form>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="comments">
                        <h3>
                            <?=$numcomment=(isset($numcomment))?$numcomment:'$numcomment'?> Comments
                        </h3>
                        <ul class="comments__list">
                            <?=$barcomment=(isset($barcomment))?$barcomment:'$barcomment'?>
                        </ul>
                    </div>
                    <!--end comments-->
                    <div class="comments-form">
                        <h4>Leave a comment</h4>
                        <?=form_open('index/read/'.$row->idarticle.'',array('class'=>'row','id'=>'comment_form123',))?>
                        <div class="col-md-6">
                            <?=form_label('Your Name:')?>
                            <?=form_input(array('name'=>'nname','placeholder'=>'Type name here','required'=>'',))?>
                        </div>
                        <div class="col-md-6">
                            <?=form_label('Email Address:')?>
                            <?=form_input(array('name'=>'nemail','placeholder'=>'you@mailprovider.com','required'=>'','type'=>'email'))?>
                        </div>
                        <div class="col-md-12">
                            <?=form_label('Comment:')?>
                            <?=form_textarea(array('name'=>'ncomment','placeholder'=>'Message','required'=>'',))?>
                        </div>
                        <div class="col-md-3">
                            <?=form_submit(array('class'=>'btn btn--primary','name'=>'submit','value'=>'Submit Comment',))?>
                        </div>
                        <?=form_hidden('ncommentarticle',$row->idarticle)?>
                        <?=form_input(array('id'=>'idparent','name'=>'nidparent','value'=>0,'type'=>'hidden'))?>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="bg--secondary">
        <div class="container">
            <div class="row text-block">
                <div class="col-md-12">
                    <h3>More recent stories</h3>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-md-4">
                    <article class="feature feature-1">
                        <a href="#" class="block">
                            <img alt="Image" src="img/blog-2.jpg" />
                        </a>
                        <div class="feature__body boxed boxed--border">
                            <span>May 25th 2016</span>
                            <h5>A day in the life of a professional fitness blogger</h5>
                            <a href="#"> Read More </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="feature feature-1">
                        <a href="#" class="block">
                            <img alt="Image" src="img/blog-3.jpg" />
                        </a>
                        <div class="feature__body boxed boxed--border">
                            <span>May 25th 2016</span>
                            <h5>Small businesses that expertly leverage their online followings</h5>
                            <a href="#"> Read More </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="feature feature-1">
                        <a href="#" class="block">
                            <img alt="Image" src="img/blog-4.jpg" />
                        </a>
                        <div class="feature__body boxed boxed--border">
                            <span>May 25th 2016</span>
                            <h5>Designing efficiently in the age of distraction</h5>
                            <a href="#"> Read More </a>
                        </div>
                    </article>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
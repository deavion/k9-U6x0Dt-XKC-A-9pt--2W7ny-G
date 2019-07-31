<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="masonry">
                    <div class="masonry__container row">
                        <div class="masonry__item col-md-6"></div>
                        <?=$bararticle=(isset($bararticle))?$bararticle:'$bararticle'?>
                        <!--end item-->
                    </div>
                    <!--end of masonry container-->
                    <?=$pagination=(isset($pagination))?$pagination:'$pagination'?>
                </div>
                <!--end masonry-->
            </div>
            <div class="col-lg-4 hidden-sm">
                <div class="boxed boxed--border boxed--lg bg--secondary">
                    <div class="sidebar__widget">
                        <h5>Search site</h5>
                        <?=form_open('index/blog',array('method'=>'get',))?>
                        <?=form_input(array('name'=>'search','placeholder'=>'Type search here',))?>
                        <?=form_close()?>
                    </div>
                    <!--end widget-->
                    <div class="sidebar__widget">
                        <h5>Categories</h5>
                        <ul>
                            <?=$barcategory=(isset($barcategory))?$barcategory:'$barcategory'?>
                        </ul>
                    </div>
                    <!--end widget-->
                    <div class="sidebar__widget">
                        <h5>Archives</h5>
                        <ul>
                            <?=$bardate=(isset($bardate))?$bardate:'$bardate'?>
                        </ul>
                    </div>
                    <!--end widget-->
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link href="/css/course.css" rel="stylesheet">


<div class="course">
    <div class="container">
        <div class="row" style="width: 90%; padding-left: 10%">
            <div class="col-12 col-md-7">
                <section class="section-video">
                    <img style="width: 100%" src="<?=$course->preview?>">
                    <!-- ======= ПОСЛЕ ПОКУПКИ ======== -->
<!--                    <button class="fon-grey btn btn-modul mt-3" href="" >Все модули</button>-->

                </section>

                <section>
                    <ul class="description-lessons">
                        <li><h4 class="w8">Описание</h4></li>
                        <li><?=$course->description?></li>
                    </ul>
                </section>

            </div>

            <div class="d-none d-md-block col-md-5">

                <div class="mt-4">
                    <ul class="list-courses fon-border">
                        <li>
                            <div class="course-name">
                                <h5 class="w6"><?=$module->title?></h5>
                                <div id="open" style="display: flex;">
                                    <img src="./img/list-plus.svg" alt="">
                                </div>
                                <div id="closeBloc" style="display: none;">
                                    <h5 class="w6 mr-5">1/15</h5>
                                    <img id="closeItem" src="./img/close.svg" alt="">
                                </div>
                            </div>
                            <ol class="course-item">
                                <hr>
                                <? foreach ($lessons as $lesson): ?>
                                <li><a href="<?="/cabinet/course/watch-lessons?c=" . $course->id . "&l=" .$lesson->id?>"><h6><?=$lesson->title?></h6></a></li>
                                <? endforeach;?>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>

    var isOpen = false;
    var isOpenListItem = false

    $('.click-close-modal-cuorses').on('click', function() {
        $(".all-page").css("display", "block");
        $(".modal-list-courses").css("display", "none");
    })
    $('.btn-modul').on('click', function() {
        $(".all-page").css("display", "none");
        $(".modal-list-courses").css("display", "block");
    })
    $('#header-close').on('click',function() {
        $('#header-close').css({
            display : 'none'
        })
        $('body').css({
            overflow: 'scroll'
        })
        $('.navbar-toggler-icon').css({
            display : 'block'
        })
        $('.menu-colaps').css({
            right : -99999,
            display: 'none'
        })
    })
    $('#header-open').on('click',function() {
        $('body').css({
            overflow: 'hidden'
        })
        $('.menu-colaps').css({
            right : 0 ,
            display : 'block'
        })
        $('#header-close').css({
            display : 'block'
        })
        $('.navbar-toggler-icon').css({
            display : 'none'
        })
    })
    $('.course-name').on('click',function() {
        if(!isOpenListItem){
            isOpenListItem = true;
            $(this).closest('li').find('.course-item').css({
                'display' : 'block'
            });
            console.log('ertyuio')
        }else{
            isOpenListItem = false
            $(this).closest('li').find('.course-item').css({
                'display' : 'none'
            });
        }
        if(isOpenListItem){
            $(this).closest('li').find('#closeBloc').css({
                'display' : 'flex'
            })
            $(this).closest('li').find('#open').css({
                'display' : 'none'
            })
        }else{
            $(this).closest('li').find('#closeBloc').css({
                'display' : 'none'
            })
            $(this).closest('li').find('#open').css({
                'display' : 'flex'
            })
        }
    });
    $('#closeItem').on('click',function() {
        $(this).closest('li').find('.course-item').css({
            'display' : 'none'
        })
    })
    $('.header-img').on('click', function() {
        if(!isOpen){
            isOpen = true
            $('.list-click').css({
                'display' : 'block'
            })
        }else{
            isOpen = false
            $('.list-click').css({
                'display' : 'none'
            })
        }
    })


</script>
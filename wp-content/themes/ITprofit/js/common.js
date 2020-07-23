$(function () {

    $(document).ready(() => {
        $('h1, .p, .hidden_btn').addClass('show');
        $('.design').css('opacity', '1');
        //определяем язык
        var isCyrillic = function (text) {
            return /[а-я]/i.test(text);
        }
        var txt = $('.categories__wrapper a');
        let lang = $('.active__btn').text();
        //проверяем язык и заменяеми русские слова
        if (lang == 'En') {
            $(".h2:contains('Блог')").html('Blog');
            $(".categories__wrapper a:contains('Все')").html('All');
            $(" a:contains('Проекты')").html('Projects');
            $(" a:contains('Советы')").html('Advantages');
            $('.categories__wrapper a').each(function (index, value) {
                eng_lang = isCyrillic($(this).text());
                if (eng_lang) {
                    $(this).css('display', 'none');
                }
            });
        } else {
            $('.categories__wrapper a').each(function (index, value) {

                ru_lang = isCyrillic($(this).text());
                if (!ru_lang && $(this).text() !== 'SEO') {
                    $(this).css('display', 'none');
                    console.log($(this).text());
                }
            });
        }

    });

    /*Всплывающее окно */

    $('body').on('scroll', function (e) {
        //Изменяем фон хедера в зависимости от фона
        let header = $('header').height();
        let wrapper = $('header').offset().top;
        let headBg = $('.head__bg').height();
        let height = header + wrapper;
        if (headBg) {
            height += headBg;
        }
        if (height < 0) {
            $('.header__wrapper, .mobile__header').css('background', '#fff');
        } else {
            $('.header__wrapper, .mobile__header').css('background', 'rgba(255, 255, 255, 0)');
        }

        let animateScrollStart = 20;
        let animateScrollBottom = $(window).scrollTop() + $(window).height();
        let animateScrollBottomStart = animateScrollBottom - animateScrollStart;

        $('.fade-up, .fade-right').each(function () {
            var offSetTopAnimateBlock = $(this).offset().top;
            if (animateScrollBottomStart > offSetTopAnimateBlock) {
                $(this).addClass('animate');
            } else {
                $(this).removeClass('animate');
            }
        })
    });
    /* Конец */

    $('.hamburger').click(function () {
        const header = $('header').height();
        const wrapper = $('header').offset().top;
        const height = header + wrapper;
        const headBg = $('.head__bg').height();

        if ($(this).hasClass('is-active')) {
            $(this).removeClass('is-active');
            $('body').removeClass('compensate-for-scrollbar');
            $('.mobile__menu, .mobile__menu .container').css('height', '0px');

            if (height > -headBg) {
                $('.header__wrapper, .mobile__header').css('background', 'rgba(255, 255, 255, 0)');
            }
        } else {
            $(this).addClass('is-active');
            $('body').addClass('compensate-for-scrollbar');
            $('.mobile__menu').css('height', '640px');
            $('.mobile__menu .container').css('height', '100%');
            $('.mobile__header').css('background', '#fff');
        }
    });

    $('.mail_box').on({
        mouseenter: () => {
            $(this).find('.mail').css('opacity', '0');
            $(this).find('.mail__white').css('opacity', '1');
        },
        mouseleave: () => {
            $(this).find('.mail').css('opacity', '1');
            $(this).find('.mail__white').css('opacity', '0');
        }
    });

    $('.scroll_top').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id'),
            href = $(this).attr('href'),
            top = $(href).offset().top;
        $('body,html').animate({ scrollTop: top }, 1000);
        setTimeout(() => {
            $('.about-tabs__btn a[data-id="' + id + '"]').trigger('click');
        }, 900)
    })

    // $('.link__about').click(function (e) {
    //     e.preventDefault();
    //     const link = $(this).attr('href');
    //     $('.parent__txt').children().fadeOut('fast');
    //     $(link).fadeIn();



    //     $(this).attr('href')
    //     if (!$(this).hasClass('active')) {
    //         $('.link__about').removeClass('active');
    //         $(this).addClass('active');
    //     }
    // });

    //Модальные окна с информацией
    $('.tech__icon').click(
        function (e) {
            e.stopPropagation();
            $('.tech__hidden').css('display', 'none');
            $(this).parent().find('.tech__hidden').css('display', 'block');
        }
    )


    $('.tech__hidden__close').click(
        function () {
            $('.tech__hidden').css('display', 'none');
        }
    );

    $('.tech__hidden').on('click', function (e) {
        e.stopPropagation();
    });


    $('body').on('click', function () {
        $('.tech__hidden').css('display', 'none');
    })

    $('.modal__close').click(
        function () {
            $(this).parent().css('display', 'none');
        }
    )

    $('.modal__close').click(
        function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().find('.tech__inner').css('display', 'block');
            $(this).parent().css('display', 'none');
        }
    )

    $('.popup__container').click(
        function () {
            $('.popup__container, .modal__map')
                .fadeIn(200,
                    function () {
                        $('.popup__container, .modal__map').css({ 'display': 'none' })
                    })
                .css('opacity', '0')
        }
    )
    //Portfolio inner
    $('[data-fancybox="gallery"]').fancybox({
        baseClass: 'myFancyBox',
        thumbs: {
            autoStart: true,
            axis: 'x'
        }
    })
    fancyImg();

    if ($('.portfolio__slider')) {
        const slider = $('.portfolio__slider .portfolio__wrapper');
        $(slider).slick({
            infinite: false,
            arrows: true,
            fade: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            appendArrows: $('.arrows__block'),
            prevArrow: '<div class="btn_slider btn_prev transition"><img src="' + ajax_object.templateurl + '/assets/images/Arrow_btn.svg" alt="">' + ajax_object.prevarrow + '</div>',
            nextArrow: '<div class="btn_slider btn_next transition">' + ajax_object.nextarrow + '<img src="' + ajax_object.templateurl + '/assets/images/Arrow_btn.svg" alt=""></div>',
        });
    }


});

function fancyImg() {
    $(".fancy_img").fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        margin: 0,
        padding: 0,
    });
}

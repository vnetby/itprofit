$(function () {

    const loader = "<div class='lds-dual-ring'></div>";

    //modal map
    $('.btn__modal').click(
        function (e) {
            e.preventDefault();
            let frame = $('#modal_map iframe');

            if (!frame.length) {
                $.ajax({
                    type: 'POST',
                    url: ajax_object.ajaxurl,
                    data: {
                        'action': 'ajaxmap', //calls wp_ajax_nopriv_{'action'}
                        'frame': 'yes',
                    },
                    success: function (data) {
                        $('.popup__container, .modal__map').fadeIn(300,
                            () => {
                                $('#modal_map').html(data);
                                $('.popup__container, .modal__map').css({ 'display': 'block', 'opacity': '1' });
                            });
                    }
                });
            } else {
                $('.popup__container, .modal__map').fadeIn(300,
                    () => {
                        $('.popup__container, .modal__map').css({ 'display': 'block', 'opacity': '1' });
                    });
            }
        }
    )

    $('.categories__wrapper__blog a').on('click',
        function (e) {
            e.preventDefault();
            $(this).parent().find('a').removeClass('active');
            $(this).addClass('active');
            let container = $('.ajax_container');
            let id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: ajax_object.ajaxurl,
                data: {
                    'action': 'ajaxblog', //calls wp_ajax_nopriv_{'action'}
                    'id': id,
                },
                beforeSend: () => {
                    $(container).html(loader);
                },
                success: (html) => {
                    $(container).html(html);
                }
            });
        }
    );

    //Переключение блоков на странице about
    $('.about-tabs__btn a').click(
        function (e) {
            e.preventDefault();
            $(this).parent().find('a').removeClass('active');
            $(this).addClass('active');

            let id = $(this).data('id');
            let name = $(this).data('name');
            let container = $('.about__tabs__item[data-id="' + id + '"]');

            if (!$(container).find('.container').length) {
                $.ajax({
                    type: 'GET',
                    url: ajax_object.ajaxurl,
                    data: {
                        'action': 'ajaxabout', //calls wp_ajax_nopriv_{'action'}
                        'id': id,
                        'name': name,
                    },
                    beforeSend: () => {
                        $(container).html('<div class="container flex">' + loader + '</div>');
                        $('.about__tabs__inner').children().fadeOut();
                        $(container).fadeIn('slowly');
                    },
                    success: (data) => {
                        data = data.substring(0, data.length - 1);
                        $(container).html(data);
                    }
                });
            } else {
                let linkAbout = $(this).attr('href');
                $('.about__tabs__inner').children().fadeOut();
                $(linkAbout).fadeIn('slowly')
            }
        });

    // window.addEventListener('popstate', function (e) {
    //     if (!e.state || !e.state.html) return;
    //     console.log(e.state);
    //     $('.portfolio__wrapper').html(e.state.html);
    // });


    $('.categories__wrapper.posts a').click(
        function (e) {
            e.preventDefault();

            if ($(this).data('type') == 'all') {
                $(this).parent().find('a').removeClass('active');
                $(this).addClass('active');
            } else {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                } else {
                    $(this).addClass('active');
                }
            }

            let container = $('.portfolio__wrapper');
            let all = $('.categories__wrapper.posts a[data-type="all"].active').data('all');
            let catId = [];
            let tagId = [];
            $('.categories__wrapper.posts a.active').each(function () {
                if ($(this).data('type') == 'cat') {
                    catId.push($(this).data('id'));
                } else if ($(this).data('type') == 'tag') {
                    tagId.push($(this).data('id'));
                }
            });



            $.ajax({
                type: 'POST',
                url: ajax_object.ajaxurl,
                data: {
                    'action': 'ajaxportfolio', //calls wp_ajax_nopriv_{'action'}
                    'all': all,
                    'tag': tagId,
                    'cat': catId
                },
                beforeSend: () => {
                    $(container).html(loader);
                },
                success: (html) => {
                    $(container).html(html);
                    historyPush(html, catId, tagId, all);
                }
            });
        }
    );





    function historyPush(html, catId, tagId, all) {
        let resObj = build_query_object({ cat: catId, tag: tagId, all: all === 'n' ? all : false });
        let res = build_query_string(resObj);
        // let url = res ? window.location.href + res : window.location.href;
        // window.history.pushState({ html: html, url: res }, document.title, res);
        window.history.replaceState(null, document.title, res ? res : window.location.pathname);
    }





    function build_query_object(obj) {
        let res = {};
        for (let key in obj) {
            if (obj[key] && obj[key].length) {
                res[key] = obj[key];
            }
        }
        return res;
    }




    function build_query_string(res) {
        let str = false;
        for (let key in res) {
            if (!str) {
                str = '?'
            } else {
                str += '&';
            }
            str += key + '=';
            if (typeof res[key] === 'string') {
                str += res[key];
            } else {
                str += res[key].join(',');
            }
        }
        return str;
    }


});

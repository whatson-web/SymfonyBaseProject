var fixePaddingBody = function () {
    $('body').css('padding-top', $('header').height() + 'px');
};

var equilibre = function (selecteur) {

    var hauteurMinimum = 0;

    $(this).css('min-height', '0px');


    $(selecteur).each(function () {

        var hauteur = $(this).height() + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));

        if (hauteur > hauteurMinimum) {
            hauteurMinimum = hauteur;
        }

    });


    $(selecteur).each(function () {

        $(this).css('min-height', hauteurMinimum + 'px');
    });

};

var equilibrePlus = function (selecteur, selecteurParent) {

    if (typeof selecteurParent !== 'undefined') {

        $(selecteurParent).each(function () {

            var hauteurMinimum = 0;

            var children = $(this).find(selecteur);

            children.each(function () {

                if ($(window).width() > 767) {

                    var hauteur = $(this).height() + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));

                    if (hauteur > hauteurMinimum) {
                        hauteurMinimum = hauteur;
                    }

                }

            });

            children.css('min-height', hauteurMinimum + 'px');

        });

    } else {

        $(selecteur).each(function () {
            var hauteurMinimum = 0;


            if ($(window).width() > 767) {

                var hauteur = $(this).height() + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));

                if (hauteur > hauteurMinimum) {
                    hauteurMinimum = hauteur;
                }

                $(this).css('min-height', hauteurMinimum + 'px');

            }

        });

    }

};


var equilibreLineHeight = function (selecteur) {

    var hauteurMinimum = 0;

    $(selecteur).each(function () {

        var hauteur = $(this).height() + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));

        if (hauteur > hauteurMinimum) {
            hauteurMinimum = hauteur;
        }

    });

    $(selecteur).each(function () {

        $(this).css('line-height', hauteurMinimum + 'px');

    });

};

var writeDataHeight = function (selecteur) {

    $(selecteur).each(function () {

        var originalHeight = $(this).css('height');

        $(this).css('height', 'auto');
        $(this).attr('data-height', $(this).height());

        $(this).css('height', originalHeight);

    });

};

var writeLineHeightFromParent = function (selecteur, selecteurParent) {

    $(selecteur).each(function () {

        $(this).css('line-height', 0);

        var closestParent = $(this).closest(selecteurParent);

        var hauteur = closestParent.height();

        $(this).css('line-height', hauteur + 'px');


    });

};

var initDatepicker = function(){

    if ($('.datepicker').attr('data-format')) {
        var dateformat = $('.datepicker').attr('data-format');
    }

    if ($('.datepicker').attr('data-language')) {
        var dateLanguage = $('.datepicker').attr('data-language');
    }

    if ($('.datepicker').attr('data-start')) {
        var dateStart = $('.datepicker').attr('data-start');
    }

    if ($('.datepicker').attr('data-end')) {
        var dateEnd = $('.datepicker').attr('data-end');
    }

    $('.datepicker').datepicker({
        autoclose: true,
        format : dateformat,
        language: dateLanguage,
        startDate: dateStart,
        endDate: dateEnd

    });

};

$('a[data-anchor]').click(function () {

    $('html,body').animate({scrollTop: $('#' + $(this).data('anchor')).offset().top}, 'slow');

    return false;
});


$(window).ready(function () {
    fixePaddingBody();
    initDatepicker();
});

$(window).load(function () {
    fixePaddingBody();
});

$(window).resize(function () {
    fixePaddingBody();
});
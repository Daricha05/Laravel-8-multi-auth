$('document').ready(function(){
    $('a#addForm').on('click',function(){
        var form = '<div class="form-row p-2 border border-info mt-2">'+
                        '<div class="col-sm-12">'+
                            '<a onclick="$(this).parent().parent().remove();" style="font-size:20px;color:white;" class="float-right btn-sm btn btn-inverse m-0 mb-2">X</a>'+
                        '</div>'+
                        '<div class="form-group col-sm-6">'+
                            '<input type="tex" class="form-control" placeholder="Noms" name="Noms[]" required>'+
                        '</div>'+
                        '<div class="form-group col-sm-6">'+
                            '<input type="tex" class="form-control" placeholder="Prénoms" name="Prenoms[]">'+
                        '</div>'+
                        '<div class="form-group col-sm-4">'+
                            '<select name="Sexe[]" id="" class="form-control" required>'+
                                '<option value="" selected>Sexe</option>'+
                                '<option value="homme">Homme</option>'+
                                '<option value="femme">Femme</option>'+
                            '</select>'+
                        '</div>'+
                        '<div class="form-group col-sm-4">'+
                            '<input type="date" class="form-control form-control-normal" placeholder="Date de naissance" name="DateN[]" required>'+
                        '</div>'+
                        '<div class="form-group col-sm-4">'+
                            '<select name="Type[]" id="" class="form-control" required>'+
                                '<option value="" selected>Lien familiale</option>'+
                                '<option value="marie">Marie</option>'+
                                '<option value="femme">Femme</option>'+
                                '<option value="enfant">Enfant</option>'+
                                '<option value="autre">Autres</option>'+
                            '</select>'+
                        '</div>'+
                    '</div>';
            $('div#container_form').append(form);
        
        })

   
});




/*var width = $(window).width(), height = $(window).height();
alert('width : ' +width + 'height : ' + height);*/
"use strict";
$(document).ready(function() {
    var $window = $(window);
    //add id to main menu for mobile menu start
    var getBody = $("body");
    var bodyClass = getBody[0].className;
    $(".main-menu").attr('id', bodyClass);
    //add id to main menu for mobile menu end

    // card js start
    $(".card-header-right .close-card").on('click', function() {
        var $this = $(this);
        $this.parents('.card').animate({
            'opacity': '0',
            '-webkit-transform': 'scale3d(.3, .3, .3)',
            'transform': 'scale3d(.3, .3, .3)'
        });

        setTimeout(function() {
            $this.parents('.card').remove();
        }, 800);
    });
    $(".card-header-right .reload-card").on('click', function() {
        var $this = $(this);

        $this.parents('.card').addClass("card-load");
        $this.parents('.card').append('<div class="card-loader"><i class="icofont icofont-refresh rotate-refresh"></div>');
        setTimeout(function() {
            $this.parents('.card').children(".card-loader").remove();
            $this.parents('.card').removeClass("card-load");
        }, 3000);
    });
    $(".card-header-right .card-option .icofont-simple-left").on('click', function() {
        var $this = $(this);
        if ($this.hasClass('icofont-simple-right')) {
            $this.parents('.card-option').animate({
                'width': '35px',
            });
        } else {
            $this.parents('.card-option').animate({
                'width': '180px',
            });
        }
        $(this).toggleClass("icofont-simple-right").fadeIn('slow');
        // $this.children("li .icofont-simple-left").toggleClass("");
    });

    $(".card-header-right .minimize-card").on('click', function() {
        var $this = $(this);
        var port = $($this.parents('.card'));
        var card = $(port).children('.card-block').slideToggle();
        $(this).toggleClass("icofont-plus").fadeIn('slow');
    });
    $(".card-header-right .full-card").on('click', function() {
        var $this = $(this);
        var port = $($this.parents('.card'));
        port.toggleClass("full-card");
        $(this).toggleClass("icofont-resize");
    });

    $(".card-header-right .icofont-spinner-alt-5").on('mouseenter mouseleave', function() {
        $(this).toggleClass("rotate-refresh").fadeIn('slow');
    });
    $("#more-details").on('click', function() {
        $(".more-details").slideToggle(500);
    });
    $(".mobile-options").on('click', function() {
        $(".navbar-container .nav-right").slideToggle('slow');
    });
    $(".main-search").on('click', function() {
        $("#morphsearch").addClass('open');
    });
    $(".morphsearch-close").on('click', function() {
        $("#morphsearch").removeClass('open');
    });
    // card js end
    $.mCustomScrollbar.defaults.axis = "yx";
    $("#styleSelector .style-cont").mCustomScrollbar({
        setTop: "10px",
        setHeight: "calc(100% - 200px)",
    });
    $(".main-menu").mCustomScrollbar({
        setTop: "10px",
        setHeight: "calc(100% - 80px)",
    });
});
$(document).ready(function() {
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('.theme-loader').fadeOut('slow', function() {
        $(this).remove();
    });
});

// toggle full screen
function toggleFullScreen() {
    var a = $(window).height() - 10;

    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

//light box
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});


// Upgrade Button
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
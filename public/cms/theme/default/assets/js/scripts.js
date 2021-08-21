(function($) {
    "use strict";
    jQuery(document).ready(function() {


        /* ============== DETECT MOBILE DEVICES ============== */
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };
		
		
		/* ============== PRELOADER ============== */
		jQuery(window).load(function() {
			jQuery('#preloader').fadeOut(300);
		});
		
		
		/* ============== FEATURED ============== */
		var top_news = jQuery('#featured');
		
		
		top_news.owlCarousel({
			items : 4,
			pagination : false
		});
		
		jQuery("#next-owl").click(function(){
			top_news.trigger('owl.next');
		});
		
		jQuery("#prev-owl").click(function(){
			top_news.trigger('owl.prev');
		});


		
		/* ============== SLIDESHOW IMAGES ============== */
		if(jQuery('.house-slideshow').length) {
			jQuery('.house-slideshow').each(function() {
				jQuery('ul', this).responsiveSlides({
					auto: true,             // Boolean: Animate automatically, true or false
					pager: false,           // Boolean: Show pager, true or false
					nav: true,             // Boolean: Show navigation, true or false
					prevText: "<i class='fa fa-chevron-left'></i>",   // String: Text for the "previous" button
					nextText: "<i class='fa fa-chevron-right'></i>",       // String: Text for the "next" button
				});
			});
		}
		
		
		
		/* ============== VIDEO SCALE ============== */
		jQuery('.fit').fitVids();
		
		
		
		/* ============== MASONRY ============== */
		var masonry_2col = jQuery('#masonry-1');
			masonry_2col.isotope({
			itemSelector: '.post'
		});
		
		var masonry_3col = jQuery('#masonry-2');
			masonry_3col.isotope({
			itemSelector: '.post'
		});
		
		jQuery(window).load(function() {
			masonry_2col.isotope('layout');
			masonry_3col.isotope('layout');
		});
		
		
		
		/* ============== MENU ============== */
		jQuery('.sticky').sticky({topSpacing:0});
		jQuery('#menu-container nav > ul > li').each(function() {
			if(jQuery('.ubermenu-submenu' , this).length > 0) jQuery(this).css('position', 'static');
		});
		
		jQuery('.ubermenu-tabs-group > li').hover(function() {
			var parent_ubermenu = jQuery(this).parent();
			jQuery('> li', parent_ubermenu).each(function() {
				jQuery(this).removeClass('ubermenu-active');
			});
			jQuery(this).addClass('ubermenu-active');
		});
		
		jQuery('#menu-container li').hover(function() {
			if(jQuery(window).width() > 991) jQuery('> .sub-menu, > .ubermenu-submenu', this).stop().fadeIn(300);
		}, function() {
			if(jQuery(window).width() > 991) jQuery('> .sub-menu, > .ubermenu-submenu', this).stop().fadeOut(300);
		});
		

        // Mobile menu
        jQuery('#mobile-button').click(function() {
            if (jQuery('#menu-container').css('display') == 'none')
                jQuery('#menu-container').css('display', 'block');
            else
                jQuery('#menu-container').css('display', 'none');
        });
		
		jQuery('#menu-container li').each(function() {
			if(jQuery('.sub-menu, .ubermenu-submenu, .ubermenu-tab-content-panel', this).length > 0) jQuery('> a', this).addClass('arrow');
		});
		
		jQuery('#menu-container a').click(function() {
			if(jQuery(window).width() < 991) {
				var list = jQuery(this).parent();
				if(jQuery('.sub-menu, .ubermenu-tab-content-panel', list).length > 0) {
					if(!list.hasClass('menu-open')) jQuery(list).addClass('menu-open');
					else jQuery(list).removeClass('menu-open');
					return false;
				}
				if(jQuery('.ubermenu-submenu', list).length > 0) {
					if(!list.hasClass('menu-open')) jQuery(list).addClass('menu-open');
					else jQuery(list).removeClass('menu-open');
					return false;
				}
			}
		});
		
		



        /* ============== FORM VALIDATE ============== */
        var personal = jQuery('input[name="personal"]');
        var email = jQuery('input[name="email"]');
        var message = jQuery('textarea[name="message"]');
        var errors;
		jQuery('#contactform button[type="submit"], #contactform input').removeAttr('disabled');

        function validateEmail(sEmail) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(sEmail))
                return true;
            else
                return false;
        }

        if (jQuery('form#contactform').length > 0)
            jQuery('form#contactform')[0].reset();

        jQuery('form#contactform').submit(function() {
            errors = 0;
            var formInput = jQuery(this).serialize();
            if (personal.val() == '') {
                personal.addClass('error');
                errors++;
            }
            else {
                personal.removeClass('error');
            }


            if (email.val() == '' || !validateEmail(email.val())) {
                email.addClass('error');
                errors++;
            }
            else {
                email.removeClass('error');
            }

            if (message.val() == '') {
                message.addClass('error');
                errors++;
            }
            else {
                message.removeClass('error');
            }

            // Success validate
            if (errors == 0) {
                jQuery('#contactform button[type="submit"], #contactform input').attr('disabled', 'disabled');
				
				jQuery('#contactform .loading').slideDown(300);
                $.ajax({
                    type: "POST",
                    url: 'assets/php/sendEmail.php',
                    data: formInput,
                    success: function(response) {
                        if (response == "success")
                        {
							jQuery('#contactform .loading').slideUp(300);
                            jQuery("#success-message").slideDown(500);

                        }
                        else {
							jQuery('#contactform .loading').slideUp(300);
                            jQuery("#error-message").slideDown(500);
                        }
                    }
                });
            }
            return false;
        });
		
		
		
		
		/* ============== STYLE SWITCHER ============== */
		
		
		jQuery('#style-switcher span').click(function() {
			var styleswitcher = jQuery(this).parent().css('left');
			if(parseInt(styleswitcher, 10) < 0) jQuery(this).parent().addClass('open');
			else jQuery(this).parent().removeClass('open');
		});
		
		var top_news_owl = top_news.data('owlCarousel');
		
		if($.cookie('layout') == 'boxed') {
			jQuery('html').addClass('boxed');
			top_news_owl.reinit();
			jQuery('#style-switcher select option:contains("Boxed")').prop('selected', true);
		}
		else {
			jQuery('#style-switcher select option:contains("Wide")').prop('selected', true);
			top_news_owl.reinit();
			jQuery('html').removeClass('boxed');
		}
		if($.cookie('bg') != '' && $.cookie('bg') != null && $.cookie('layout') != 'wide') {
			var bg = $.cookie('bg');
			jQuery('body').addClass(bg);
			jQuery('html').addClass('boxed');
			jQuery('#style-switcher select option:contains("Boxed")').prop('selected', true);
			top_news_owl.reinit();
		}
		
		
		jQuery('#style-switcher img').click(function() {
			var body_class = jQuery(this).attr('data-background');
			jQuery('body').removeAttr('class');
			jQuery('body').addClass(body_class);
			$.cookie('bg', body_class, { expires: 1 });
			jQuery('html').addClass('boxed');
			$.cookie('layout', 'boxed', { expires: 1 });
			jQuery('#style-switcher select option:contains("Boxed")').prop('selected', true);
			top_news_owl.reinit();
		});
		
		
		jQuery('#style-switcher select').on('change', function() {
			if(this.value == 'Boxed') {
				jQuery('html').addClass('boxed');
				top_news_owl.reinit();
				$.cookie('layout', 'boxed', { expires: 1 });
				var bg = $.cookie('bg');
				jQuery('body').addClass(bg);
			}
			else {
				jQuery('html').removeClass('boxed');
				top_news_owl.reinit();
				$.cookie('layout', 'wide', { expires: 1 });
			}
		});
		

    });
})(jQuery);
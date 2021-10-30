/* ===================================================================
    
    Author          : MaanTheme
    Template Name   : MaanSoft It Solution HTML Template
    Version         : 1.0
    
* ================================================================= */
(function($) {
	"use strict";
	
	$(document).ready(function () {
    /* ==================================================
		Preloader Init
	===============================================*/
    setTimeout(function () {
      $("#ctn-preloader").addClass("loaded");
      // Una vez haya terminado el preloader aparezca el scroll
      $("body").removeClass("no-scroll-y");

      if ($("#ctn-preloader").hasClass("loaded")) {
        // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
        $("#preloader")
          .delay(1000)
          .queue(function () {
            $(this).remove();
          });
      }
    }, 3000);

    /* ==================================================
		# Fun Factor Init
	===============================================*/
    $(".timer").countTo();

    $(".fun-fact").appear(
      function () {
        $(".timer").countTo();
      },
      {
        accY: -100,
      }
    );

    /* ==================================================
		# Wow Init
	===============================================*/
    var wow = new WOW({
      boxClass: "wow", // animated element css class (default is wow)
      animateClass: "animated", // animation css class (default is animated)
      offset: 0, // distance to the element when triggering the animation (default is 0)
      mobile: true, // trigger animations on mobile devices (default is true)
      live: true, // act on asynchronously loaded content (default is true)
    });
    wow.init();

    /* ==================================================
		# Smooth Scroll
	=============================================== */
    $("a.smooth-menu").on("click", function (event) {
      var $anchor = $(this);
      var headerH = "85";
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: $($anchor.attr("href")).offset().top - headerH + "px",
          },
          1500,
          "easeInOutExpo"
        );
      event.preventDefault();
    });

    /* ==================================================
		# Accordion Menu
	=============================================== */

    $(document).on("click", ".panel-group .panel", function (e) {
      e.preventDefault();
      $(this).addClass("panel-active").siblings().removeClass("panel-active");
    });

    /* ==================================================
		# Feedback Carousel
	===============================================*/

    $(".feed-sldr").owlCarousel({
      loop: true,
      margin: 30,
      nav: false,
      navText: [
        "<i class='icofont-long-arrow-left'></i>",
        "<i class='icofont-long-arrow-right'></i>",
      ],
      dots: true,
      autoplay: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 2,
        },
      },
    });

    /* ==================================================
		# Partner Carousel
	===============================================*/

    $(".partner-sldr").owlCarousel({
      loop: true,
      margin: 90,
      nav: false,
      navText: [
        "<i class='icofont-long-arrow-left'></i>",
        "<i class='icofont-long-arrow-right'></i>",
      ],
      dots: false,
      autoplay: true,
      responsive: {
        0: {
          items: 2,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 5,
        },
      },
    });

    /* ==================================================
		# Hero Slider Carousel
	===============================================*/

    $(".hero-slider").owlCarousel({
      loop: true,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 5000,
      items: 1,
      navText: [
        "<i class='ti-angle-left'></i>",
        "<i class='ti-angle-right'></i>",
      ],
    });

    /* ==================================================
		Contact Form Validations
	================================================== */
    $(".contact-form").each(function () {
      var formInstance = $(this);
      formInstance.submit(function () {
        var action = $(this).attr("action");

        $("#message").slideUp(750, function () {
          $("#message").hide();

          $("#submit")
            .after(
              '<img src="assets/img/logo/ajax-loader.gif" class="loader" />'
            )
            .attr("disabled", "disabled");

          $.post(
            action,
            {
              name: $("#name").val(),
              email: $("#email").val(),
              subject: $("#subject").val(),
              website: $("#website").val(),
              comments: $("#comments").val(),
            },
            function (data) {
              document.getElementById("message").innerHTML = data;
              $("#message").slideDown("slow");
              $(".contact-form img.loader").fadeOut("slow", function () {
                $(this).remove();
              });
              $("#submit").removeAttr("disabled");
            }
          );
        });
        return false;
      });
    });

    /* ==================================================
		# Scroll to top
	=============================================== */
    //Get the button
    var mybutton = document.getElementById("scrtop");

    //When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction();
    };

    function scrollFunction() {
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    /* ==================================================
		  # Price Range
	  =============================================== */
    if ($("#myRange").length) {
      priceOpt();
    }

    // portfolio
    if ($("#portfolio-grid").length) {
      var $grid = $("#portfolio-grid").isotope({
        itemSelector: ".pf-item",
        // percentPosition: true,
      });

      // filter items on button click
      $(".mix-item-menu").on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({ filter: filterValue });
      });

      // change is-checked class on buttons
      $(".mix-item-menu").each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on("click", "button", function () {
          $buttonGroup.find(".active").removeClass("active");
          $(this).addClass("active");
        });
      });
    }
  });
  
		/* ==================================================
			# imagesLoaded active
		===============================================*/
		// $('#portfolio-grid,.blog-masonry').imagesLoaded(function() {

		// 	/* Filter menu */
		// 	$('.mix-item-menu').on('click', 'button', function() {
		// 		var filterValue = $(this).attr('data-filter');
		// 		$grid.isotope({
		// 			filter: filterValue
		// 		});
		// 	});

		// 	/* filter menu active class  */
		// 	$('.mix-item-menu button').on('click', function(event) {
		// 		$(this).siblings('.active').removeClass('active');
		// 		$(this).addClass('active');
		// 		event.preventDefault();
		// 	});

		// 	/* Filter active */
		// 	var $grid = $('#portfolio-grid').isotope({
		// 		itemSelector: '.pf-item',
		// 		percentPosition: true,
		// 		masonry: {
		// 			columnWidth: '.pf-item',
		// 		}
		// 	});

		// 	/* Filter active */
		// 	$('.blog-masonry').isotope({
		// 		itemSelector: '.blog-item',
		// 		percentPosition: true,
		// 		masonry: {
		// 			columnWidth: '.blog-item',
		// 		}
		// 	});

		// });
		     
})(jQuery); // End jQuery

/* ==================================================
# Price Range
===============================================*/

function priceOpt() {
	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;
	slider.oninput = function() {
		output.innerHTML = this.value;
	}
}
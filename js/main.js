'use strict';










var navBar = document.getElementsByClassName('header__nav')[0];
var spaceHolder = document.getElementsByClassName('header__nav--fill')[0];
var sticky = navBar.offsetTop;


function stickyHeader() {
	if (window.pageYOffset > sticky) {
		navBar.classList.add("header__nav--sticky");
		spaceHolder.classList.remove('hidden');

	} else {
		navBar.classList.remove("header__nav--sticky");
		spaceHolder.classList.add('hidden');
	}
}

window.onload = stickyHeader;
window.onscroll = stickyHeader;






(function($){
	$(document).ready(function() {




		
		var element = document.getElementById('phone');
		

		if (element !== null)
		{
			var maskOptions = {
				mask: '+{38#}000000000',
				definitions: {

					'#': /[0]/
				}
			};
			var mask = IMask(element, maskOptions);
		}
		if ($('.vacancy__work-slider').length) {


			$('.vacancy__work-slider').slick({
				slidesToShow: 4,
				slidesToScroll: 2,
				dots: true,
				arrows: true,
				prevArrow: $('.chevron-prev'),
				nextArrow: $('.chevron-next'),
				draggable: false,
				autoplay: true,
				autoplaySpeed: 4000,
				pauseOnHover: false,
				pauseOnFocus: false,
				responsive: [
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				]
			});

		}
		$('.header__slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 4000,
			pauseOnHover: false,
			pauseOnFocus: false,
			dots: false,
			arrows: false,

		})



	});

	function splashHeader() {
		if ($('.header').hasClass('header--work')) {
			return;
			
		} else {
			$('.header').addClass('header--work');
			$('.header__slider').focus();
			$('.header__slider').remove();
			$('.vacancy__title').css("color", "transparent");
			
		}

		
	}


	function navTransformation() {
		var link = $('.vacancy__nav-link');
		link.click(splashHeader);

	}
	function mainSection() {
		var mainLink = $('#nav-main-tab');
		mainLink.click(function() {
			if ($('.header').hasClass('header--work')) {

				$('.header').removeClass('header--work');
				location.hash = '';
				location.reload()
			} else {
				return;

			}
		});
	}
	function Burger() {
		var burgerMenu = $('.burger-menu');
		burgerMenu.click(function() {
			burgerMenu.addClass('burger-menu--active');
			$("body").addClass("is-menu-shown");
			$(".vacancy__nav").addClass("vacancy__nav--menu");
			$('.close-btn').removeClass('close-btn--hidden');
			$('.close-btn').animate({
				opacity: 1,
				/* stuff to do after animation is complete */
			}, 700);

			$('.vacancy__nav-link').click(function() {
				burgerMenu.removeClass('burger-menu--active');
				$("body").removeClass("is-menu-shown");
				$(".vacancy__nav").removeClass("vacancy__nav--menu");
				$('.close-btn').addClass('close-btn--hidden');
				$('.close-btn').css('opacity = "0"');
				$('html,body').animate({
					scrollTop: $("body").offset().top},
					'fast');
			})
			$('.close-btn').click(function() {
				burgerMenu.removeClass('burger-menu--active');
				$("body").removeClass("is-menu-shown");
				$(".vacancy__nav").removeClass("vacancy__nav--menu");
				$('.close-btn').addClass('close-btn--hidden');
				$('.close-btn').css("opacity", "0");
			})

		});
	}

	navTransformation();
	mainSection();
	Burger();
})(jQuery);






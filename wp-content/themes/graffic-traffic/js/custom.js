$(window).scroll(function() {
    if ($(this).scrollTop() > 100){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});  

/********************* js mobaile  *********************/
jQuery(document).ready(function () {
  jQuery('.mobileIcon').click(function () {
    jQuery("body").toggleClass('menu-open');
  });
});


jQuery(document).ready(function ($) {
    // Default active tab and content
    $('.services_list_iteam').first().addClass('active');
    $('.services_tab_item').hide().first().fadeIn().addClass('active');

    // Click event for tabs
    $('.services_list_iteam').on('click', function () {
        // Remove active class from all tabs
        $('.services_list_iteam').removeClass('active');
        // Add active class to clicked tab
        $(this).addClass('active');

        // Get index of clicked tab
        let index = $(this).index();

        // Hide all tab contents and fade in the corresponding one
        $('.services_tab_item').removeClass('active').hide();
        $('.services_tab_item').eq(index).fadeIn(400).addClass('active'); // Adjust 400ms for faster/slower fade effect
    });
});


var swiper = new Swiper(".services_item_slider", {
    slidesPerView: 1,
    navigation: {
        nextEl: ".swiper-button-next_new",
        prevEl: ".swiper-button-prev_new",
    },
});


jQuery(document).ready(function ($) {
    // Initially hide all FAQ content
    $('.faq_list_iteam_content').hide();

    // Click event for FAQ title
    $('.faq_list_iteam_title').on('click', function () {
        // Check if the clicked item is already open
        const isOpen = $(this).next('.faq_list_iteam_content').is(':visible');

        // Close all FAQ content
        $('.faq_list_iteam_content').slideUp(300);
        $('.faq_list_iteam').removeClass('active');

        // If the clicked item was not open, open it
        if (!isOpen) {
            $(this).next('.faq_list_iteam_content').slideDown(300);
            $(this).parent('.faq_list_iteam').addClass('active');
        }
    });
});


var swiper = new Swiper(".testimonials_slider_otr", {
    slidesPerView: "auto",
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next_new_test",
        prevEl: ".swiper-button-prev_new_test",
    },
});


var swiper = new Swiper(".meet_our_team_slider", {
    slidesPerView: 3, // Default number of slides visible
    loop: true, // Enable looping
    navigation: {
        nextEl: ".swiper-button-next_new_slide",
        prevEl: ".swiper-button-prev_new_slide",
    },
    breakpoints: {
        // When the window is >= 1024px
        1200: {
            slidesPerView: 3, // Show 3 slides
            spaceBetween: 30, // Space between slides    
        },
        1024: {
            slidesPerView: 2, // Show 3 slides
            spaceBetween: 60, // Space between slides
        },
        // When the window is >= 768px
        768: {
            slidesPerView: 2, // Show 2 slides
            spaceBetween: 60, // Space between slides
        },
        // When the window is >= 480px
        480: {
            slidesPerView: 1, // Show 1 slide
            spaceBetween: 10, // Space between slides
        },
        // When the window is < 480px
        0: {
            slidesPerView: 1, // Show 1 slide
            spaceBetween: 5, // Space between slides
        },
    },
});


$(document).ready(function () {
    // Define the classes to be added
    const classList = ['color_1', 'color_2', 'color_3'];
    
    // Loop through each item and assign classes in a repeating pattern
    $('.meet_our_team_iteam').each(function (index) {
        const classToAdd = classList[index % classList.length]; // Calculate the class in a loop
        $(this).addClass(classToAdd); // Add the class
    });
});


jQuery(document).ready(function ($) {
    // Initially hide all FAQ content
    $('.faq_list_new_iteam_content').hide();

    // Click event for FAQ title
    $('.faq_list_new_iteam_title').on('click', function () {
        // Check if the clicked item is already open
        const isOpen = $(this).next('.faq_list_new_iteam_content').is(':visible');

        // Close all FAQ content
        $('.faq_list_new_iteam_content').slideUp(300);
        $('.faq_list_new_iteam').removeClass('active');

        // If the clicked item was not open, open it
        if (!isOpen) {
            $(this).next('.faq_list_new_iteam_content').slideDown(300);
            $(this).parent('.faq_list_new_iteam').addClass('active');
        }
    });
});


$(document).ready(function () {
    var section = $('.our_work_section');
    var delayTime = 1000; // Delay time (in milliseconds)
    var offsetToRemove = 200; // Offset of 200px past the top to remove class
    var videoClosed = false; // Flag to track if the video has been closed
    var lastScrollTop = 0; // Variable to track the last scroll position

    // Function to check the position of .our_work_section
    function checkSectionPosition() {
        var sectionOffset = section.offset().top; // Position of .our_work_section
        var windowScrollTop = $(window).scrollTop(); // Current scroll position

        // Add or remove the class based on scroll direction and position
        if (windowScrollTop > lastScrollTop) { // Scrolling down
            // Add the class when scrolling down and section is in the viewport
            if (!videoClosed && sectionOffset <= windowScrollTop && sectionOffset + section.outerHeight() > windowScrollTop) {
                $('body').addClass('new_class_add');
            }

            // Remove the class when scrolled 200px past the section
            if (windowScrollTop >= sectionOffset + offsetToRemove) {
                $('body').removeClass('new_class_add');
            }
        } else { // Scrolling up
            // Remove the class if scrolling up and the section is at or above the top
            if (sectionOffset > windowScrollTop) {
                $('body').removeClass('new_class_add');
            }
        }

        // Update the last scroll position
        lastScrollTop = windowScrollTop;
    }

    // Trigger the check on scroll and on page load
    $(window).on('scroll', checkSectionPosition);
    $(window).on('resize', checkSectionPosition); // Also check when the window is resized
    checkSectionPosition(); // Initial check when the page is loaded

    // Add click event handler for .close_icon_otr
    $('.close_icon_otr').on('click', function () {
        $('body').removeClass('new_class_add'); // Remove the class on click
        videoClosed = true; // Mark the video as closed
    });
});


$(document).ready(function () {
    var idealistSection = $('.the_idealist_section'); // Target the section
    var image = $('.the_idealist_right img'); // Target the image

    $(window).on('scroll', function () {
        var sectionTop = idealistSection.offset().top; // Top of the section
        var sectionHeight = idealistSection.outerHeight(); // Height of the section
        var scrollPosition = $(window).scrollTop(); // Current scroll position
        var windowHeight = $(window).height(); // Height of the viewport

        // Check if the section is in the viewport
        if (scrollPosition + windowHeight > sectionTop && scrollPosition < sectionTop + sectionHeight) {
            var progress = (scrollPosition + windowHeight - sectionTop) / (sectionHeight + windowHeight);
            var scaleValue = 1 + progress * 0.4; // Scale between 1 and 1.4
            image.css('transform', `scale(${scaleValue})`); // Apply the scale
        } else {
            image.css('transform', 'scale(1)'); // Reset scale if out of view
        }
    });
});


jQuery(document).ready(function ($) {
    // Initially hide all FAQ content
    $('.services_list_iteam_content').hide();

    // Click event for services title
    $('.services_list_iteam_title').on('click', function () {
        // Check if the clicked item is already open
        const isOpen = $(this).next('.services_list_iteam_content').is(':visible');

        // Close all services content
        $('.services_list_iteam_content').slideUp(300);
        $('.services_list_iteam_new').removeClass('active');

        // If the clicked item was not open, open it
        if (!isOpen) {
            $(this).next('.services_list_iteam_content').slideDown(300);
            $(this).parent('.services_list_iteam_new').addClass('active');
        }
    });
});


jQuery(document).ready(function ($) {
  const $h2 = $(".make_sure_gt_top_title h2");
  const text = $h2.text().trim(); // Get the full text of the h2
  const lines = text.split(" "); // Split by spaces (adjust if lines need customization)

  // Clear original text and wrap each line in a span
  $h2.empty();
  lines.forEach((line) => {
    const $span = $("<span>").addClass("line").text(line + " ");
    $h2.append($span);
  });

  let isAnimating = false;
  let hasAnimated = false; // Flag to check if the animation has been triggered once

  // Debounced scroll event
  const debounceScroll = (func, delay) => {
    let timeout;
    return function () {
      clearTimeout(timeout);
      timeout = setTimeout(func, delay);
    };
  };

  // Animation on scroll
  const animateOnScroll = () => {
    // console.log("Scroll event triggered");

    const $section = $(".make_sure_gt_section");
    if ($section.length === 0) {
      // console.error("Section '.make_sure_gt_section' not found");
      return;
    }

    const $lines = $(".line");
    if ($lines.length === 0) {
      // console.error("No '.line' elements found in the DOM");
      return;
    }

    const sectionPosition = $section[0].getBoundingClientRect();
    // console.log("Section position:", sectionPosition);

    const sectionTop = sectionPosition.top;
    const windowHeight = $(window).height();

    // Check if the section has passed or touched the top of the viewport
    const isInView = sectionTop <= 0 && sectionTop >= -windowHeight;

    if (isInView && !hasAnimated) {
      // console.log("Section has touched or passed the top of the screen");
      hasAnimated = true; // Mark as animated so it doesn't trigger again when scrolling down

      $lines.each(function (index) {
        // console.log(`Animating line ${index + 1}:`, $(this).text().trim());
        setTimeout(() => {
          $(this).addClass("line-visible");
          // console.log(`Line ${index + 1} is now visible`);
        }, index * 200); // Delay animation for each line
      });
    } else if (sectionTop > 0 && hasAnimated) {
      // console.log("Section is out of view, reset animation state");
      hasAnimated = false; // Allow animation to trigger again when scrolling down
      $lines.removeClass("line-visible");
    }

    // If the section is below the viewport and has animated before, reset the animation state
    if (sectionTop > windowHeight && hasAnimated) {
      // console.log("Section is out of view, reset animation state");
      hasAnimated = false; // Reset so animation triggers when scrolling back up
      $lines.removeClass("line-visible");
    }
  };

  // Debounced scroll event
  $(window).on("scroll", debounceScroll(animateOnScroll, 200));
});




document.querySelectorAll('input[name="project"]').forEach(radio => {
    radio.addEventListener('change', function() {
        // Remove active class from all spans
        document.querySelectorAll('.option').forEach(option => {
            option.classList.remove('active');
        });

        // Add active class to the selected span
        const selectedLabel = this.nextElementSibling.querySelector('.option');
        if (selectedLabel) {
            selectedLabel.classList.add('active');
        }
    });
});




 "use strict";

    // DOM Content Loaded
    document.addEventListener("DOMContentLoaded", () => {
        const slider = document.getElementById("slider-range");
        const valueLabel = document.getElementById("slider-value");
        const hiddenInput = document.getElementById("slider-hidden");


        const updateUI = () => {
            const value = +slider.value;

            // Ensure the value increments by 2
            const adjustedValue = Math.floor(value / 2) * 2;

            // Update the dynamic label with the adjusted slider value
            valueLabel.textContent = `${adjustedValue} Days`;

                    // Update the hidden input value
        hiddenInput.value = adjustedValue;
        };

        // Add an event listener to the slider
        slider.addEventListener("input", updateUI);

        // Initialize UI on page load
        updateUI();
    });


"use strict";

// DOM Content Loaded
document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("slider-range-usa");
    const valueLabel = document.getElementById("slider-value-usa");
    const hiddenInput = document.getElementById("budget-hidden-input");

    const updateUI = () => {
        const value = +slider.value;

        // Ensure the value increments by 100
        const adjustedValue = Math.floor(value / 100) * 100;

        // Update the dynamic label
        valueLabel.textContent = `${adjustedValue} USD`;

        // Update the hidden input value
        hiddenInput.value = adjustedValue;
    };

    // Add an event listener to the slider
    slider.addEventListener("input", updateUI);

    // Initialize UI on page load
    updateUI();
});



    "use strict";

// DOM Content Loaded
document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("slider-range-quality");
    const valueLabel = document.getElementById("slider-value-quality");

    // Define the rating scale
    const ratings = ["Bad", "Poor", "Fair", "Good", "Very Good", "Excellent"];

    const updateUI = () => {
        const value = +slider.value;

        // Determine the rating based on the slider value
        let ratingIndex;
        
        if (value <= 500) {
            ratingIndex = 0; // Bad
        } else if (value <= 1000) {
            ratingIndex = 1; // Poor
        } else if (value <= 1500) {
            ratingIndex = 2; // Fair
        } else if (value <= 2000) {
            ratingIndex = 3; // Good
        } else if (value <= 2500) {
            ratingIndex = 4; // Very Good
        } else {
            ratingIndex = 5; // Excellent
        }

        // Update the dynamic label with the corresponding rating
        valueLabel.textContent = ratings[ratingIndex];
    };

    // Add an event listener to the slider
    slider.addEventListener("input", updateUI);

    // Initialize UI on page load
    updateUI();
});

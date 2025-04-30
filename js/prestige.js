(function ($) {
  // Mobile Menu Toggle
  document.querySelector(".mobile-toggle").addEventListener("click", function () {
    document.querySelector("nav ul").classList.toggle("show");
  });

  // Tab Functionality
  document.querySelectorAll(".tab-btn").forEach((button) => {
    button.addEventListener("click", function () {
      // Remove active class from all buttons and contents
      document.querySelectorAll(".tab-btn").forEach((btn) => btn.classList.remove("active"));
      document.querySelectorAll(".tab-content").forEach((content) => content.classList.remove("active"));

      // Add active class to clicked button
      this.classList.add("active");

      // Show corresponding content
      const target = this.getAttribute("data-target");
      document.getElementById(target).classList.add("active");
    });
  });

  // Simple scroll behavior
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();

      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        window.scrollTo({
          top: target.offsetTop - 80,
          behavior: "smooth",
        });

        // Close mobile menu if open
        document.querySelector("nav ul").classList.remove("show");
      }
    });
  });

  // Common Owl Carousel options
  const commonOptions = {
    autoplay: false,
    dots: true,
    loop: false,
    navText: ["&larr;", "&rarr;"],
    responsiveClass: true,
    smartSpeed: 450,
    onInitialized: updateNavButtons,
    onChanged: updateNavButtons,
  };

  // Initialize carousels with specific settings
  $(".testimonial-slider").owlCarousel({
    ...commonOptions,
    margin: 30,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
    },
  });

  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
    animateOut: "fadeOut",
    smartSpeed: 1000,
    dots: false,
    nav: false,
  });

  // Update navigation buttons state
  function updateNavButtons(event) {
    const items = event.item.count;
    const item = event.item.index;

    // Find the specific carousel and its navigation buttons
    const $carousel = $(event.target);
    const $prevButton = $carousel.parent().find(".owl-prev");
    const $nextButton = $carousel.parent().find(".owl-next");

    // Toggle disabled class on navigation buttons
    if (item === 0) {
      $prevButton.addClass("disabled");
    } else {
      $prevButton.removeClass("disabled");
    }

    if (item >= items - event.page.size) {
      $nextButton.addClass("disabled");
    } else {
      $nextButton.removeClass("disabled");
    }
  }
})(jQuery);

(function ($) {
  // Simple scroll behavior

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

  // Change the Input types from text to date
  jQuery(document).ready(function ($) {
    $("#wpforms-326-field_6").attr("type", "date");
  });
})(jQuery);

// Change a text field into a phone field
jQuery(function ($) {
  const $form = $("#wpforms-form-326");
  const $field = $("#wpforms-326-field_3");
  const regex = /^\+?[0-9]{10,15}$/;

  const msgRequired = "This field is required.";
  const msgInvalid = "Please enter a valid phone number (10–15 digits, optional “+”).";

  if (!$form.length || !$field.length) return;

  // Prepare the field
  $field.attr({
    type: "tel",
    inputmode: "tel",
    required: false,
    autocomplete: "off",
    "aria-required": "false",
  });

  const errorId = $field.attr("id") + "-error";

  function showError(message) {
    let $error = $("#" + errorId);
    if (!$error.length) {
      $error = $("<em>", {
        id: errorId,
        class: "wpforms-error",
        role: "alert",
        "aria-label": "Error message",
      }).insertAfter($field);
    }
    $error.text(message);
    $field.addClass("wpforms-error").attr({
      "aria-invalid": "true",
      "aria-describedby": errorId,
    });
  }

  function clearError() {
    $("#" + errorId).remove();
    $field.removeClass("wpforms-error").removeAttr("aria-invalid aria-describedby");
  }

  function validateField() {
    const val = $.trim($field.val());

    if (!val) {
      showError(msgRequired);
      return false;
    } else if (!regex.test(val)) {
      showError(msgInvalid);
      return false;
    } else {
      clearError();
      return true;
    }
  }

  // Validate on input
  $field.on("input", function () {
    validateField();
  });

  // Validate on submit
  $form.on("submit", function (e) {
    const isValid = validateField();
    if (!isValid) {
      e.preventDefault();
      $field.focus();
    }
  });
});

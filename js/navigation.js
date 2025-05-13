/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function ($) {
  // Variables
  var $body = $("body"),
    $menuToggle = $(".menu-toggle"),
    $siteNavigation = $(".main-navigation"),
    $mobileNavigation = $(".mobile-navigation"),
    $dropdownToggle = $(".dropdown-toggle"),
    $window = $(window);

  // Initialize the navigation system
  function initNavigation() {
    // Mobile Menu Toggle Button
    if (!$menuToggle.length) {
      $siteNavigation.prepend(
        '<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="menu-label">Menu</span></button>'
      );
      $menuToggle = $(".menu-toggle");
    }

    // Setup event handlers
    setupEventHandlers();

    // Initial setup for dropdown menus
    $siteNavigation.find("li.menu-item-has-children > a").attr("aria-haspopup", "true");

    // Handle resize events
    handleResize();

    // Make navigation accessible via keyboard
    makeAccessible();
  }

  // Setup all event handlers
  function setupEventHandlers() {
    // Menu toggle button click
    $body.on("click", ".menu-toggle", function (e) {
      e.preventDefault();
      toggleMobileMenu();
    });

    // Dropdown toggle click (mobile)
    $body.on("click", ".dropdown-toggle", function (e) {
      e.preventDefault();
      toggleDropdown($(this));
    });

    // Handle clicks on menu items with children on desktop
    $siteNavigation.find(".menu-item-has-children > a").on("click", function (e) {
      var $this = $(this);

      if ($window.width() > 768) {
        // Only if we're on desktop and the submenu isn't open
        if (!$this.parent().hasClass("submenu-open")) {
          e.preventDefault();
          $this.parent().siblings(".submenu-open").removeClass("submenu-open").find(".sub-menu").slideUp(200);

          $this.parent().addClass("submenu-open").find("> .sub-menu").slideDown(200);
        }
      }
    });

    // Close submenus when clicking outside
    $(document).on("click", function (e) {
      if (!$(e.target).closest(".main-navigation").length) {
        $(".submenu-open").removeClass("submenu-open").find(".sub-menu").slideUp(200);
      }
    });

    // Close mobile menu when clicking outside
    $(document).on("click", function (e) {
      if (
        $mobileNavigation.hasClass("toggled") &&
        !$(e.target).closest(".mobile-navigation").length &&
        !$(e.target).closest(".menu-toggle").length
      ) {
        toggleMobileMenu();
      }
    });

    // Handle hover events for desktop
    $siteNavigation.find(".menu-item-has-children").hover(
      function () {
        if ($window.width() > 768) {
          $(this).addClass("hover");
          $(this).children(".sub-menu").stop(true, false).slideDown(200);
        }
      },
      function () {
        if ($window.width() > 768) {
          $(this).removeClass("hover");
          $(this).children(".sub-menu").stop(true, false).slideUp(200);
        }
      }
    );
  }

  // Toggle the mobile menu
  function toggleMobileMenu() {
    $menuToggle.toggleClass("toggled");
    $mobileNavigation.toggleClass("toggled");

    if ($menuToggle.hasClass("toggled")) {
      $menuToggle.attr("aria-expanded", "true");
      $body.addClass("mobile-menu-open");
    } else {
      $menuToggle.attr("aria-expanded", "false");
      $body.removeClass("mobile-menu-open");

      // Reset all expanded dropdowns
      $mobileNavigation.find(".dropdown-toggle").attr("aria-expanded", "false").parent().find(".sub-menu").hide();
    }
  }

  // Toggle a dropdown menu
  function toggleDropdown($button) {
    var $parent = $button.parent(),
      $subMenu = $parent.find("> .sub-menu"),
      expanded = $button.attr("aria-expanded") === "true";

    // Close other dropdowns at the same level
    $parent.siblings(".dropdown").find("> .dropdown-toggle").attr("aria-expanded", "false");
    $parent.siblings(".dropdown").find("> .sub-menu").slideUp(200);

    // Toggle current dropdown
    $button.attr("aria-expanded", !expanded);

    if (!expanded) {
      $subMenu.slideDown(200);
    } else {
      $subMenu.slideUp(200);
    }
  }

  // Handle window resize events
  function handleResize() {
    $window.on("resize", function () {
      if ($window.width() > 768) {
        // If we're on desktop, close the mobile menu if it's open
        if ($mobileNavigation.hasClass("toggled")) {
          toggleMobileMenu();
        }

        // Reset any mobile-specific states
        $siteNavigation.find(".sub-menu").removeAttr("style");
      } else {
        // If we're on mobile, reset any desktop-specific states
        $siteNavigation.find(".hover").removeClass("hover");
      }
    });
  }

  // Make navigation accessible via keyboard
  function makeAccessible() {
    $siteNavigation.find("a").on("focus blur", function () {
      $(this).parents("li.menu-item-has-children").toggleClass("focus");
    });
  }

  // Initialize when the document is ready
  $(document).ready(function () {
    initNavigation();
  });
})(jQuery);

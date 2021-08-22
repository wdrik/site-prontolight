jQuery(document).ready(function ($) {
  let loader = $(".loader");
  loader.fadeIn();

  if ($("body").hasClass("home")) {
    setTimeout(function () {
      $("#sucos").find("a.tab-link").click();
    }, 600);

    setTimeout(function () {
      $("#lanches").find("a.tab-link").click();
    }, 900);

    setTimeout(function () {
      $("#porcoes").find("a.tab-link").click();
    }, 1100);

    setTimeout(function () {
      $("#pratos").find("a.tab-link").click();
    }, 1300);
  }

  loader.fadeOut();

  $(".tab-custom ul.tabs-custom")
    .addClass("active")
    .find("> li:eq(0)")
    .addClass("current");

  $(".tab-custom ul.tabs-custom li a.tab-link").click(function (e) {
    e.preventDefault();

    var tab = $(this).closest(".tab-custom"),
      index = $(this).closest("li").attr("id");

    tab.find("ul.tabs-custom > li").removeClass("current");

    $(this).closest("li").addClass("current");

    tab
      .find(".tab_content")
      .find("div.tabs_item")
      .not("div.tabs_item[data-id=" + index + "]")
      .hide();

    tab
      .find(".tab_content")
      .find("div.tabs_item[data-id=" + index + "]")
      .fadeIn(800);

    // $('html, body').animate({scrollTop:$('#div_id').position().top}, 'slow');
  });

  let addToCard = $(".ajax_add_to_cart");
  addToCard.on("click", function () {
    $(".product-added").addClass("added");

    setTimeout(function () {
      $(".product-added").removeClass("added");
    }, 8000);
  });

  setTimeout(function () {
    $(
      "#pagseguro-payment-methods li label #pagseguro-payment-method-banking-ticket"
    ).on("click", function () {
      $(".boleto-method").addClass("added");

      setTimeout(function () {
        $(".boleto-method").removeClass("added");
      }, 6000);
    });
  }, 20000);

  $(".woocommerce-MyAccount-navigation ul li a").on("click", function (e) {});

  if ($("body").hasClass("woocommerce-account")) {
    if ($(window).width() <= 768) {
      $("html, body").animate(
        { scrollTop: $(".woocommerce-MyAccount-content").position().top - 80 },
        "slow"
      );
    }

    $(window).resize(function () {
      if ($(window).width() <= 768) {
        $("html, body").animate(
          {
            scrollTop: $(".woocommerce-MyAccount-content").position().top - 80,
          },
          "slow"
        );
      }
    });
  }

  let owlCarouselProductsRelated = $(".owl-carousel--products__related");
  owlCarouselProductsRelated.owlCarousel({
    loop: 0,
    margin: 40,
    nav: 1,
    dots: 1,
    items: 3,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: 0,
        stagePadding: 40,
        center: 1,
        margin: 20,
      },
      480: {
        items: 1,
        stagePadding: 60,
        margin: 30,
      },
      681: {
        items: 2,
        margin: 20,
      },
      1024: {
        items: 3,
      },
    },
  });

  let owlCarouselProducts = $(".owl-carousel--products");
  owlCarouselProducts.owlCarousel({
    loop: 0,
    margin: 40,
    nav: 1,
    dots: 1,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: 0,
        stagePadding: 40,
        center: 1,
        margin: 20,
      },
      480: {
        items: 1,
        stagePadding: 60,
        margin: 30,
      },
      601: {
        items: 1,
        nav: 1,
      },
      681: {
        items: 2,
      },
      1281: {
        items: 3,
      },
    },
  });

  let owlCarouselVideos = $(".owl-carousel--videos");
  owlCarouselVideos.owlCarousel({
    loop: 0,
    margin: 30,
    nav: 1,
    dots: 1,
    center: 1,
    loop: 1,
    smartSpeed: 600,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
        stagePadding: 50,
        margin: 12,
      },
      425: {
        items: 2,
        margin: 20,
      },
      768: {
        items: 3,
      },
      1100: {
        items: 4,
      },
    },
  });

  // let filterWidgetLink = $('.widget-area .product-search-filter-terms .term-name');

  // filterWidgetLink.on('click', function(e) {
  //   e.preventDefault();

  //   setTimeout(function() {
  //     $('#secondary.widget-area').css({
  //       'top': '-100%'
  //     })
  //   }, 1000)
  // });

  let filterProduct = $("#filterProduct");
  filterProduct.on("click", function (e) {
    e.preventDefault();

    $("#secondary.widget-area").css({
      top: "0",
    });
  });

  $("#custom_html-2 i.fa-times").on("click", function () {
    $("#secondary.widget-area").css({
      top: "-100%",
    });
  });

  $(".owl-carousel--videos .item").on("click", function () {
    let link = jQuery(this).find("iframe").attr("src");

    $(".big_video .yt-wrapper")
      .find("iframe")
      .attr("src", link.replace("autoplay=0", "autoplay=1"));
  });

  //--> Accordion
  // $('.accordion > li:eq(0) a.accordion-title').addClass('active').next().slideDown();

  $(".accordion a.accordion-title").on("click", function (e) {
    let dropDown = $(this).closest("li").find("div.wrapper-partners");

    $(this)
      .closest(".accordion")
      .find("div.wrapper-partners")
      .not(dropDown)
      .slideUp();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(this)
        .closest(".accordion")
        .find("a.accordion-title.active")
        .removeClass("active");

      $(this).addClass("active");
    }

    dropDown.stop(false, true).slideToggle();

    e.preventDefault();
  });

  // Click function for show the Modal
  $(".show").on("click", function () {
    var e = jQuery(this).attr("id");

    jQuery(".mask[data-id='" + e + "']").addClass("active");
  });

  // Function for close the Modal
  function closeModal() {
    $(".mask").removeClass("active");
  }

  // Call the closeModal function on the clicks/keyboard
  $(".close, .mask").on("click", function () {
    closeModal();
  });

  $(document).keyup(function (e) {
    if (e.keyCode === 27) closeModal();
  });

  if ($("body").hasClass("blog") || $("body").hasClass("single-post")) {
    $(window).scroll(function () {
      let scroll = $(window).scrollTop();

      if (scroll < 70) {
        $("#media_image-2").css({
          top: "150px",
        });

        $("#text-6").css({
          top: "390px",
        });
      } else {
        $("#media_image-2").css({
          top: "100px",
        });

        $("#text-6").css({
          top: "340px",
        });
      }

      if (scroll >= $(".site-footer").offset().top - 700) {
        $("#media_image-2").css({
          opacity: "0",
          "pointer-events": "none",
        });

        $("#text-6").css({
          opacity: "0",
          "pointer-events": "none",
        });
      } else {
        $("#media_image-2").css({
          opacity: "1",
          "pointer-events": "all",
        });

        $("#text-6").css({
          opacity: "1",
          "pointer-events": "all",
        });
      }
    });
  }

  $("#payment .place-order .button").on("click", function () {
    setTimeout(function () {
      $(".form-row.woocommerce-invalid input.input-text:first").focus();
    }, 2000);

    setTimeout(function () {
      $(".form-row.woocommerce-invalid input.input-text").focus();
    }, 2000);

    setTimeout(function () {
      $(".form-row.woocommerce-invalid input.input-text").first().focus();
    }, 2000);
  });

  //--> Accordion
  $(".accordion > li:eq(0) a").addClass("active").next().slideDown();

  $(".accordion a").click(function (e) {
    var dropDown = $(this).closest("li").find("p");

    $(this).closest(".accordion").find("p").not(dropDown).slideUp();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(this).closest(".accordion").find("a.active").removeClass("active");

      $(this).addClass("active");
    }

    dropDown.stop(false, true).slideToggle();

    e.preventDefault();
  });
  //--> Accordion

  //#region --> Toggle Header Mobile
  function menuToggle(e) {
    e.preventDefault();

    $("#toggleEffect").toggleClass("is-open");
    $(this).toggleClass("on");
  }

  $("#iconMenuMobile").on("click", menuToggle);

  $(".site-content").on("click", function () {
    $("#toggleEffect").removeClass("is-open");
    $("#iconMenuMobile").removeClass("on");
  });

  $(".site-header--mobile .menu-item.menu-item-has-children a").on(
    "click",
    function (e) {
      e.preventDefault();

      if ($(this).hasClass("is-open--submenu")) {
        $(this).removeClass("is-open--submenu");

        $("ul.sub-menu").slideUp();

        return;
      }

      $(".menu-item a").removeClass("is-open--submenu");

      $("ul.sub-menu").slideUp();

      $(this).parent(".menu-item").find("ul.sub-menu").slideDown();

      $(this).addClass("is-open--submenu");
    }
  );

  $("ul.sub-menu a").on("click", function (e) {
    window.location.href = e.target.href;
  });

  $("#openSearchForm").on("click", function (e) {
    e.preventDefault();

    $(".search-form--custom").slideToggle();
  });
  //#endregion

  /**
   * Handle add and remove from cart
   */
  var baseURL = location.origin;

  function handleUpdateMiniCard() {
    jQuery
      .ajax({
        type: "POST",
        data: {
          action: "mode_theme_update_mini_cart",
        },
        url: baseURL + "/wp-admin/admin-ajax.php",
      })
      .then(function (data) {
        $(".widget_shopping_cart_content").html(data);
      });
  }

  let addItem = $(".add-item");
  let removeItem = $(".remove-item");
  let addItensOnCart = $(".add-itens-on-cart");
  let counterInput = $(".counter-input");

  counterInput.on("change", function (e) {
    if (e.target.value > 99) e.target.value = 99;
    if (e.target.value < 1) e.target.value = 1;
  });

  counterInput.on("click", function () {
    this.select();
  });

  addItensOnCart.on("click", function (e) {
    e.preventDefault();

    let button = $(this);
    button.addClass("loading");

    // let productId = e.target.href.split('/').pop();
    let productId = e.target.getAttribute("data-tag-id");

    let currentQuantity = $("input." + productId).val();

    let form = {
      productId,
      currentQuantity,
    };

    jQuery
      .ajax({
        type: "POST",
        data: {
          action: "handle_products_on_cart",
          form: form,
        },
        url: baseURL + "/wp-admin/admin-ajax.php",
      })
      .then(function (res) {
        let response = JSON.parse(res);

        handleUpdateMiniCard();

        $("span.woocommerce-cart-tab__contents").text(response.count);

        if (response.count >= 1) {
          $(".woocommerce-cart-tab")
            .css({ display: "block" })
            .removeClass("woocommerce-cart-tab--empty")
            .addClass("woocommerce-cart-tab--has-contents");
        }

        if (response.count === 0) {
          $(".woocommerce-cart-tab")
            .css({ display: "none" })
            .removeClass("woocommerce-cart-tab--has-contents")
            .addClass("woocommerce-cart-tab--empty");
        }

        if (response.count <= 0) {
          setTimeout(function () {
            $(".woocommerce-cart-tab-container").addClass(
              "woocommerce-cart-tab-container--visible"
            );
          }, 1000);
        }

        setTimeout(function () {
          button.removeClass("loading");
          jQuery(".wrapper-product-counter." + productId).removeClass(
            "not-show"
          );
          jQuery('.button[data-product_id="' + productId + '"]').css({
            display: "none",
          });

          jQuery(".img-custom--overlay.this--white." + productId).css({
            opacity: "1",
            visibility: "visible",
          });
          jQuery(".img-custom--link." + productId).css({
            "pointer-events": "all",
          });
        }, 800);
      });
  });

  addItem.on("click", function (e) {
    e.preventDefault();

    let btn = $(this);

    btn.css({ "pointer-events": "none" });

    // let productId = e.target.href.split('/').pop();
    let productId = e.target.getAttribute("data-tag-id");

    let currentQuantity = jQuery("input." + productId).val();

    if ($("input." + productId).val() >= 99) return;

    $("input." + productId).val(parseInt($("input." + productId).val()) + 1);

    currentQuantity = parseInt(currentQuantity) + 1;

    let form = {
      productId,
      currentQuantity,
    };

    jQuery
      .ajax({
        type: "POST",
        data: {
          action: "handle_products_on_cart",
          form: form,
        },
        url: baseURL + "/wp-admin/admin-ajax.php",
      })
      .then(function (data) {
        let response = JSON.parse(data);
        jQuery("span.woocommerce-cart-tab__contents").text(response.count);

        jQuery(".widget_shopping_cart_content").html(data);
      });

    setTimeout(function () {
      handleUpdateMiniCard();
      jQuery(".widget_shopping_cart_content").addClass("loading");

      setTimeout(function () {
        jQuery(".widget_shopping_cart_content").removeClass("loading");

        btn.css({ "pointer-events": "all" });
      }, 800);
    }, 800);
  });

  removeItem.on("click", function (e) {
    e.preventDefault();

    let btn = $(this);

    btn.css({ "pointer-events": "none" });

    // let productId = e.target.href.split('/').pop();
    let productId = e.target.getAttribute("data-tag-id");
    let currentQuantity = jQuery("input." + productId).val();

    if ($("input." + productId).val() <= 1) return;

    $("input." + productId).val(parseInt($("input." + productId).val()) - 1);

    currentQuantity = parseInt(currentQuantity) - 1;

    let form = {
      productId,
      currentQuantity,
    };

    jQuery
      .ajax({
        type: "POST",
        data: {
          action: "handle_products_on_cart",
          form: form,
        },
        url: baseURL + "/wp-admin/admin-ajax.php",
      })
      .then(function (data) {
        let response = JSON.parse(data);
        jQuery("span.woocommerce-cart-tab__contents").text(response.count);

        jQuery(".widget_shopping_cart_content").html(data);
      });

    setTimeout(function () {
      handleUpdateMiniCard();
      jQuery(".widget_shopping_cart_content").addClass("loading");

      setTimeout(function () {
        jQuery(".widget_shopping_cart_content").removeClass("loading");

        btn.css({ "pointer-events": "all" });
      }, 800);
    }, 800);
  });
});

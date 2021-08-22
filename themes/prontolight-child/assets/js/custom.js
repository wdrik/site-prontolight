jQuery(document).ready(function ($) {
  $(".fullbanner-home__slider").owlCarousel({
    loop: 1,
    nav: 1,
    dots: 0,
    autoplay: 1,
    mouseDrag: 0,
    autoplayTimeout: 9000,
    items: 1,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
  });

  $(".fullbanner-home__slider-intern").owlCarousel({
    loop: 1,
    nav: 1,
    dots: 0,
    autoplay: 1,
    autoplayTimeout: 8000,
    mouseDrag: 0,
    items: 1,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
  });

  /* Sidebar - Novidades  */
  $(".clip-news-content__close").on("click", function () {
    $(".clip-news-content").removeClass("clip-news--active");
    $(".clip-news").css({ visibility: "visible", display: "block" });
  });

  $(".clip-news, .clip-news__span").on("click", function () {
    $(".clip-news-content").addClass("clip-news--active");
    $(".clip-news").css({ visibility: "hidden", display: "none" });
  });

  $(document).click(function (event) {
    var $target = $(event.target);

    if (
      !$target.closest(".clip-news-content").length &&
      !$target.closest(".clip-news__span").length &&
      $(".clip-news-content").hasClass("clip-news--active")
    ) {
      $(".clip-news-content").removeClass("clip-news--active");
      $(".clip-news").css({ visibility: "visible", display: "block" });
    }
  });
  /* Sidebar - Novidades ----------------------- Final  */

  $(".btn-more").on("click", function (e) {
    e.preventDefault();

    let valuePlus = parseInt(
      $($(e.target).parents(".quantity")[0].children[2]).val()
    );

    $($(e.target).parents(".quantity")[0].children[2]).val(valuePlus + 1);
  });

  $(".btn-less").on("click", function (e) {
    e.preventDefault();

    let valueMinus = parseInt(
      $($(e.target).parents(".quantity")[0].children[2]).val()
    );

    if (valueMinus === 1) return;

    $($(e.target).parents(".quantity")[0].children[2]).val(valueMinus - 1);
  });

  // jQuery("img.filter-icon").on("click", function() {
  //   var title = $(this).find(".title");

  //   if (!title.length) {
  //     $(this).append(
  //       '<span class="title">' + $(this).attr("title") + "</span>"
  //     );
  //   } else {
  //     title.remove();
  //   }
  // });
});

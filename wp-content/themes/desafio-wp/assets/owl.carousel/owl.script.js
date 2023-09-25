$(document).ready(function () {
  let video_carousel = [];

  $(".slide-video").each(function (key) {
    video_carousel[key] = $(".owl-carousel", this);

    video_carousel[key].owlCarousel({
      margin: 24,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 2.15,
        },
        768: {
          items: 2.5,
        },
        1040: {
          items: 6,
        },
      },
    });

    $(this)
      .find(".slide-video-prev")
      .bind("click", function () {
        product_carousel[key].trigger("prev.owl.carousel");
      });

    $(this)
      .find(".slide-video-next")
      .bind("click", function () {
        product_carousel[key].trigger("next.owl.carousel");
      });
  });
});

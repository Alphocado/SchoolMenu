$(document).ready(function () {
  $(".tm-paging-link").click(function (e) {
    // console.log(e)
    e.preventDefault(); // Prevent the default behavior of the link

    var targetPage = $(this).text().toLowerCase();
    $(".tm-gallery-page").addClass("hidden");
    $("#tm-gallery-page-" + targetPage).removeClass("hidden");

    $(".tm-paging-link").removeClass("active");
    $(this).addClass("active");
  });
});

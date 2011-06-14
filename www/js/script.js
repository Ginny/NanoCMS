$("div.flash").livequery(function () {
    $(this).delay(2000).animate({"opacity": 0}, 2000).slideUp();
});

$('.guest').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/rooms");
    $('.dashboard').removeClass("selected");
    $('.guest').addClass("selected");
    $('.history').removeClass("selected");
});

$('.history').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/history-booking");
    $('.dashboard').removeClass("selected");
    $('.guest').removeClass("selected");
    $('.history').addClass("selected");
});

$('.dashboard').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/dashboard");
    $('.guest').removeClass("selected");
    $('.history').removeClass("selected");
    $('.dashboard').addClass("selected");
});

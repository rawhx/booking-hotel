$('.guest').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/rooms");
    $('.dashboard').removeClass("selected");
    $('.history').removeClass("selected");
    $('.profile').removeClass("selected");
    $('.topprofile').removeClass("active");
    $('.guest').addClass("selected");
});

$('.history').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/history-booking");
    $('.dashboard').removeClass("selected");
    $('.guest').removeClass("selected");
    $('.profile').removeClass("selected");
    $('.history').addClass("selected");
    $('.topprofile').removeClass("active");
});

$('.profile').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/profile");
    $('.dashboard').removeClass("selected");
    $('.guest').removeClass("selected");
    $('.history').removeClass("selected");
    $('.profile').addClass("selected");
    $('.topprofile').addClass("active");
});

$('.topprofile').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/profile");
    $('.dashboard').removeClass("selected");
    $('.guest').removeClass("selected");
    $('.history').removeClass("selected");
    $('.profile').addClass("selected");
    $('.topprofile').addClass("active");
});

$('.dashboard').click(function (e) { 
    e.preventDefault();
    $('.page-wrapper').load("/dashboard");
    $('.guest').removeClass("selected");
    $('.history').removeClass("selected");
    $('.profile').removeClass("selected");
    $('.topprofile').removeClass("active");
    $('.dashboard').addClass("selected");
});

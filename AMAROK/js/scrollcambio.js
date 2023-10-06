$(window).scroll(function (){
    if($("#navb").offset().top > 350) {
        $("#arriba").css("color", "#212529");
        $('#arriba').show();
    } else{
        $("#arriba").css("color", "transparent");
        $('#arriba').hide();
    }
});


$(window).scroll(function (){
    if($("#navb").offset().top > 250 ) {
        $("#navb").css("background-color", "white");
        $("#navb").css("transition", "all ease .4s");
        $("#navb").css("opacity", "0.8");
    } else{
        $("#navb").css("background-color", "transparent");
        $("#navb").css("transition", "all ease .4s");
        $("#navb").css("opacity", "1");
        $("#hom").css("color", "darkgoldenrod");
        $("#hom").css("transition", "all ease .1s");
    }
});

/*$(window).scroll(function (){
    if($("#produc").offset().top > 850) {
        $("#produc").css("color", "darkgoldenrod");
        $("#produc").css("transition", "all ease .1s");
        $("#hom").css("color", "#212529");
        $("#hom").css("transition", "all ease .1s");
    } else{
        $("#produc").css("color", "#212529");
        $("#produc").css("transition", "all ease .1s");
    }
});

$(window).scroll(function (){
    if($("#quienes").offset().top > 1450) {
        $("#quienes").css("color", "darkgoldenrod");
        $("#quienes").css("transition", "all ease .1s");
        $("#produc").css("color", "#212529");
        $("#produc").css("transition", "all ease .1s");
    } else{
        $("#quienes").css("color", "#212529");
        $("#quienes").css("transition", "all ease .1s");
    }
});

$(window).scroll(function (){
    if($("#contact").offset().top > 2400) {
        $("#contact").css("color", "darkgoldenrod");
        $("#contact").css("transition", "all ease .1s");
        $("#quienes").css("color", "#212529");
        $("#quienes").css("transition", "all ease .1s");
    } else{
        $("#contact").css("color", "#212529");
        $("#contact").css("transition", "all ease .1s");
    }
});*/
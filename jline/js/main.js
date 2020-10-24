(function ($){
    $("#btn-scroll").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollDown: $("#sesi2").offset().top
        }, 4000);   
    })
});
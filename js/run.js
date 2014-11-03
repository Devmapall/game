var url1 = "http://localhost/dbna/";
var url2 = "http://euve1560.vserver.de/test/game/";

function poller(id) {
    $.post(url1+'ajax/getChar.php', function(data) {
        var json = $.parseJSON(data);
        var nhw = Math.floor((290 * json.health) / 100);
        var npw = Math.floor((290 * json.power) / 100);
        var nmw = Math.floor((290 * json.mind) / 100);

        $(".charHealth").css("width", nhw);
        $(".charPower").css("width", npw);
        $(".charMind").css("width", nmw);
        var buffs = json.buffs;
        $(".charBuff").remove();
        if (buffs) {
            $.each(buffs, function(i, item) {
                $(".charBuffContainer").append("<div class='charBuff'></div>");
            });
        }
        setTimeout(poller, 1000);
    });
}

$(function() {
    //poller(34);

    $(".skill").click(function() {
        var buffName = $(this).attr("name");
        $.post(url1+'ajax/buffer.php', {id:34,buff:buffName}, function(data) {
            console.log("Buffed");
        });
    });
    
    $(".skillElement").hover(
        function() {
            $(this).addClass("skillElementHover");
        }, function() {
            $(this).removeClass("skillElementHover");
        }
    );
    
    $(".skillElement").click(
            function() {
                $("#dialog").dialog();
                $(".skillElementClicked").toggleClass("skillElementClicked");
                $(this).toggleClass("skillElementClicked");
            });
});
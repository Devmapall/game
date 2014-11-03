var url = "http://euve1560.vserver.de/test/game/";

function poller(id) {
    $.post(url+'ajax/getChar.php', function(data) {
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
    var skill;
    
    $("#dialog").dialog({
        resizable: false,
        autoOpen: false,
        modal: true,
        buttons: {
            "Learn": function() {
                skill.css("background-color","#006400");
                skill.css("color","yellow");
                $(this).dialog("close");
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        }
    });
    
    $(".skill").click(function() {
        var buffName = $(this).attr("name");
        $.post(url+'ajax/buffer.php', {id:34,buff:buffName}, function(data) {
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
            skill = $(this);
            
            $.post(url+'ajax/getSkill.php', {skillName: skill.text()}, function(data) {
                console.log("Learned");
            });
            
            $("#dialog").dialog("open");
            $(".skillElementClicked").toggleClass("skillElementClicked");
            $(this).toggleClass("skillElementClicked");
        }
    );
});
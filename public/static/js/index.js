$(function() {
    var speed = 50;
    $(".slideTabs").each(function() {
        $(this).parents(".slideTabs").data("running",true);
        var clone = $(this).find(".origin").html();
        $(this).find(".clone").append(clone);
    });
    var cycle = function() {
        $(".slideTabs").each(function() {
            if($(this).data("running")===false){
                return null;
            }
            if ($(this).scrollLeft() >= $(this).find(".origin").width()) {
                $(this).scrollLeft(0);
            } else {
                var value = $(this).scrollLeft() + 1;
                $(this).scrollLeft(value);
            }
        });
    };
    setInterval(cycle, speed);
    $(".slideTabs li").hover(function() {
        $(this).parents(".slideTabs").data("running",false);
    }, function() {
        $(this).parents(".slideTabs").data("running",true);
    });
});

$(function() {
    var cur;
    var selectColor='#0299FF';
    var normalColor='#F7F7F7';
    $("#listbox dt").click(function() {
        if (cur === this) {
            $(this).parent("dl").find("dd").hide(1000);
            $(this).css("background", normalColor);
            cur = false;
        } else {
            if (cur) {
                $("#listbox dd").hide(1000);
                $("#listbox dt").css("background", normalColor);
            }
            $(this).css("background", selectColor);
            $(this).parent("dl").find("dd").show(1000);
            cur = this;
        }
    });
});

//首页及封面页的焦点图片展示

var focusImage=function(images) {
    var imageObj=new Array();
    for(var i=0;i<images.length;i++){
        imageObj[i]=new Image();
        imageObj[i].src=images[i];
    }
    var index = 0;
    var chg = function() {
        $("#image").fadeTo("slow", 0.1, function() {
            index = ++index % images.length;
            $("#image").get(0).src =imageObj[index].src;
            $("#image").fadeTo("slow", 1);
        });
    };
    setInterval(chg, 6000);    
};


$(function() {
    var color;
    $("ul.art li a").hover(function() {
        color = $(this).css("color");
        $(this).css("color", "red");
    }, function() {
        $(this).css("color", color);
    });
});
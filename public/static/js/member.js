$(function() {
    var speed = 50;
    $("#slist2").html($("#slist1").html());
    $("#slist3").html($("#slist1").html());
    var cycle = function() {
        if ($("#slide0").scrollLeft() >= $("#slist1").width()) {
            $("#slide0").scrollLeft(0);
        } else {
            var value = $("#slide0").scrollLeft() + 1;
            $("#slide0").scrollLeft(value);
        }
    };
    var sliding = setInterval(cycle, speed);
    $("#slide0").hover(function() {
        clearInterval(sliding);
    }, function() {
        sliding = setInterval(cycle, speed);
    });
});
$(function() {
    var cur;
    $("#listbox dt").click(function() {
        if (cur === this) {
            $(this).parent("dl").find("dd").hide(1000);
            $(this).css("background", '#F7F7F7');
            cur = false;
        } else {
            if (cur) {
                $("#listbox dd").hide(1000);
                $("#listbox dt").css("background", '#F7F7F7');
            }
            $(this).css("background", '#0299FF');
            $(this).parent("dl").find("dd").show(1000);
            cur = this;
        }
    });
});
$(function() {
    var src = ["focus1.jpg", "focus2.jpg"];
    var count = 1;
    var chg = function() {
        if (count % 2 === 1) {
            $("#focus").fadeTo("slow", 0.3, function() {
                $("#focus img").get()[0].src = "../images/" + src[1] + "?aa=" + Math.random();
                $("#focus").fadeTo("slow", 1);
            });
        } else {
            $("#focus").fadeTo("slow", 0.3, function() {
                $("#focus img").get()[0].src = "../images/" + src[0] + "?aa=" + Math.random();
                $("#focus").fadeTo("slow", 1);
            });
        }
        count = ++count % 2;
    };
    setInterval(chg, 6000);
});

$(function() {
    var color;
    $(".arc .panel li").hover(function() {
        color = $(this).css("color");
        $(this).css("color", "red");
    }, function() {
        $(this).css("color", color);
    });
});

$(function() {
    var date = new Date();
    var tyear = date.getYear();
    var tmonth = date.getMonth() + 1;
    if (tyear <= 1900) {
        tyear = tyear + 1900;
    }
    var initYear = function() {
        var oyear = $("#year").get(0);
        $(oyear).empty();
        for (var i = tyear - 40; i <= tyear; i++) {
            oyear.options.add(new Option(i, i));
        }
    };
    var initMonth = function() {
        var ysv = $("#year").val() || tyear;
        var omonth=$("#month").get(0);
        var months = 12;
        if (ysv == tyear) {
            months = tmonth;
        }
        $(omonth).empty();
        for (var i = 1; i <= months; i++) {
            omonth.options.add(new Option(i, i));
        }
    };
    var initDate = function() {
        var msv = $("#month").val() || tmonth;
        var ysv = $("#year").val() || tyear;
        var odate = $("#date").get(0);
        var m30 = [4, 6, 9, 11];
        var days = 31;
        for (var i = 0; i < m30.length; i++) {
            if (m30[i] == msv) {
                days = 30;
                break;
            }
        }
        if (msv == 2) {
            if (ysv % 400 == 0 || (ysv % 100 != 0 && ysv % 4 == 0)) {
                days = 29;
            } else {
                days = 28;
            }
        }
        if (ysv == tyear && msv == tmonth) {
            days = date.getDate();
        }
        $(odate).empty();
        for (var i = 1; i <= days; i++) {
            odate.options.add(new Option(i, i));
        }
    };
    $("#year").change(function(){
        initMonth();
        initDate();
    });
    $("#month").change(initDate);
    initYear();
    initMonth();
    initDate();
});
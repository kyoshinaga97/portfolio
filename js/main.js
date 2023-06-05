//ロード時アニメーション
$(function(){
    $(document).ready(function(){
        $(".inner").animate({
            opacity: 1,
            fontSize:'60px'
        },
        1500
    );        
    })
});

//スクロール時navber
$(function() {
    var pos = $("nav").offset().top;
    var height = $("nav").outerHeight();
    $(window).scroll(function () {
        if ($(this).scrollTop() > pos) {
            $("nav").addClass("fix");
            $("body").css("padding-top", height);
        } else {
            $("nav").removeClass("fix");
            $("body").css("padding-top", 0);
        }
    });
});

//work各リンクhover時 色変更するべきかも
$(function(){
    $(".link .a1").hover(function(){
        $(".link .a1").css({
            color: "#0000ff",
        })
    },function(){
        $(".link .a1").css({
            color: "#2c2c2c",
        })
    });
});
$(function(){
    $(".link .a2").hover(function(){
        $(".link .a2").css({
            color: "#0000ff",
        })
    },function(){
        $(".link .a2").css({
            color: "#2c2c2c",
        })
    });
});

//CONTACT 各focus時色変更処理
//name
$(function(){
    $("#name").focus(function(){
        $("#name-title").css("color","#0dbd9a");
    });
});
$(function(){
    $("#name").blur(function(){
        $("#name-title").css("color","#2c2c2c");
    });
});
//email
$(function(){
    $("#email").focus(function(){
        $("#email-title").css("color","#0dbd9a");
    });
});
$(function(){
    $("#email").blur(function(){
        $("#email-title").css("color","#2c2c2c");
    });
});
//comment
$(function(){
    $("#textarea").focus(function(){
        $("#comment-title").css("color","#0dbd9a");
    });
});
$(function(){
    $("#textarea").blur(function(){
        $("#comment-title").css("color","#2c2c2c");
    });
});

//送信ボタンhover時処理
$(function(){
    $(".submit_btn").hover(function(){
        $(".submit_btn").css({
            color: "#0dbd9a",
            border: "2px solid #0dbd9a"
        })
    },function(){
        $(".submit_btn").css({
            color: "#2c2c2c",
            border: "2px solid #2c2c2c"
        })
    });
});


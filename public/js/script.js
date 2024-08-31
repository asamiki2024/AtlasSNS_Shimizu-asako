//アコーディオンメニュー
$(function (){
$('.nav-btn').on("click", function(){
    $(this).next().slideToggle();
    $(this).toggleClass("open");

    $('.nav-btn').not(this).removeClass('open');
    });

$('.nav-menu').on("click", function(){
    $(this).removeClass("selected");
    $(this).addClass("selected");
});

});
//投稿の編集機能(モーダル機能)
$(function(){
    //編集ボタン(class="js-modal-open)が押されたら発火
    $('.js-modal-open').on('click',function(){
        //モーダルの中身(class="js-modal")の表示
        $('.js-modal').fadeIn();
        //押されたボタンから投稿内容を取得し変数へ格納
        var post = $(this).attr('post');
        //押されたボタンから投稿のIDを取得し変数へ格納(どの投稿を編集するのか特定するのに必要なため)
        var post_id = $(this).attr('post_id');

        //取得した投稿内容をモーダルの中身へ渡す
        $('.modal_post').text(post);
        //取得した投稿のIDをモーダルの中身へ渡す
        $('.modal_id').val(post_id);
        return false;
    });

    //背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js-modal-close').on('click',function(){
        //モーダルの中身(class="js-modal")を非表示
        $('.js-modal').fadeOut();
        return false;
    });
});
$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        var post_id=$(this).attr('data-toggle');
        $('.edit-btn').val(post_id);
        return false;
    });
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});

jQuery(function ($) {
    $('.js-accordion-title').on('click', function () {
      /*クリックでコンテンツを開閉*/
      $(this).next().slideToggle(200);
      /*矢印の向きを変更*/
      $(this).toggleClass('open', 200);
    });
});

jQuery(document).ready(function($) {
  /* Animation */
  $(document).scroll(function() {

      if( $('.widget_skill-widget').length ) {
        var divPos =  $('.widget_skill-widget').offset().top;
      } else {
        var divPos =  0;
      }

        var topOfWindow = $(document).scrollTop();
        if( divPos < topOfWindow+500) {
          $(document).unbind('scroll');
          $('.skill-content .count').each(function () {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
              duration: 2000,
              easing: 'swing',
              step: function () {
                $this.text(Math.ceil(this.Counter));
              }
            });
          });        
        }
  });

  /* Animation */
  $(window).scroll(function() {

      $('.home .site-main .circle-icon-wrapper').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+500) {
          $(this).addClass("ab-animation-slide-top");
          $(this).addClass("animated");
        }
      });

      $('.home .site-main .circle-icon-box h4, .home .site-main .circle-icon-box p, .home .site-main .circle-icon-box a').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+500) {
          $(this).addClass("ab-animation-slide-bottom");
          $(this).addClass("animated");
        }
      }); 

      $('.home .site-main .widget_list-widget h3, .home .site-main .widget_testimonial-widget h3, .home .site-main .widget_skill-widget h3, .home .site-main .widget_text h3').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+500) {
          $(this).addClass("ab-animation-slide-top");
          $(this).addClass("animated");
        }
      });   

      $('.home .site-main .widget_list-widget li').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+600) {
          $(this).addClass("ab-animation-slide-fade");
          $(this).addClass("animated");
        }
      });    

      $('.home .site-main .testimonials').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+600) {
          $(this).addClass("ab-animation-scale-up");
          $(this).addClass("animated");
        }
      });  

      $('.home .site-main .skill-container').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+600) {
          $(this).addClass("ab-animation-slide-bottom");
          $(this).addClass("animated");
        }
      });

      $('.home .content-area .widget_text').each(function(){
      var imagePos = $(this).offset().top;

      var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+600) {
          $(this).addClass("flipInX");
          $(this).addClass("animated");
        }
      });    

  });
});

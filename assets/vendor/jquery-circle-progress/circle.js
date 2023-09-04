// circle progress bar
function animateElements() {
  $('.progressbar').each(function () {
      var $this = $(this); // Cache the jQuery object
      var elementPos = $this.offset(); // Get the offset
      if (!elementPos) return; // Check if offset is available
      var topOfWindow = $(window).scrollTop();
      var percent = $this.find('.circle').attr('data-percent');
      var percentage = parseInt(percent, 10) / parseInt(100, 10);
      var animate = $this.data('animate');
      if (elementPos.top < topOfWindow + $(window).height() - 30 && !animate) {
          $this.data('animate', true);
          $this.find('.circle').circleProgress({
              startAngle: -Math.PI / 2,
              value: percent / 100,
              lineCap: "round",
              size: 180,
          }).on('circle-animation-progress', function (event, progress, stepValue) {
              $(this).find('div').text((stepValue * 100).toFixed(1) + "%");
          }).stop();
      }
  });
}

// Show animated elements
animateElements();
$(window).scroll(animateElements);

// counter up
var a = 0;
$(window).scroll(function () {
  var $counterElements = $('.technaus-counter');
  if ($counterElements.length === 0) return; // Check if there are any counter elements
  var oTop = $counterElements.offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
      $('.technaus-counter-value').each(function () {
          var $this = $(this),
              countTo = $this.attr('data-count');
          $({
              countNum: $this.text()
          }).animate({
              countNum: countTo
          }, {
              duration: 4000,
              easing: 'swing',
              step: function () {
                  $this.text(Math.floor(this.countNum));
              },
              complete: function () {
                  $this.text(this.countNum);
                  //alert('finished');
              }
          });
      });
      a = 1;
  }
});

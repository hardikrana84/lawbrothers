var $affectedElements = jQuery(
  'div, a, p, span, h1, h2, h3, h4, h5, h6, table, table tr, table td, label, select, select option, button, ul, ul li'
); // Can be extended, ex. $("div, p, span.someClass")
$affectedElements.each(function () {
  var $this = jQuery(this);
  $this.data('orig-size', $this.css('font-size'));
});
count = 0;
count2 = 0;
var increasefont = function () {
  changeFontSize(1);
  count++;
  if (count >= 2) {
    jQuery('.increasefont').off();
    count = 2;
    jQuery('.decreasefont').on();
  }
};
var decreasefont = function () {
  changeFontSize(-1);
  count2++;
  if (count2 >= 2) {
    jQuery('.decreasefont').off();
    count2 = 2;
    jQuery('.increasefont').on();
  }
};
jQuery('.increasefont').click(increasefont);
jQuery('.decreasefont').click(decreasefont);
jQuery('.resetfont').click(function () {
  count = 0;
  count2 = 0;
  jQuery('.increasefont').on('click', increasefont);
  jQuery('.decreasefont').on('click', decreasefont);
  $affectedElements.each(function () {
    var $this = jQuery(this);
    $this.css('font-size', $this.data('orig-size'));
  });
});
function changeFontSize(direction) {
  $affectedElements.each(function () {
    var $this = jQuery(this);
    $this.css('font-size', parseInt($this.css('font-size')) + direction);
  });
}

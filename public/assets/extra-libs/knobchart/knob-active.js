(function ($) {
 "use strict";
    /*---------------------
       Circular Bars - Knob
    --------------------- */	
	  if(typeof($.fn.knob) != 'undefined') {
		$('.knob').each(function () {
		  var $this = $(this),
			  knobVal = $this.attr('data-rel'),
			  unit = $this.attr('data-txt') || '%',
			  max = $this.attr('data-max') || 100;
	
		  $this.knob({
			'draw' : function () { 
			  $(this.i).val(this.cv + unit)
			},
			'max': max,
			'inputColor': '#414851',
			'font': 'Roboto',
			'fontWeight': 'normal'
		  });
		  
		  $this.appear(function() {
			$({
			  value: -1
			}).animate({
			  value: knobVal
			}, {
			  duration : 2000,
			  easing   : 'swing',
			  step     : function () {
				$this.val(Math.ceil(this.value)).trigger('change');
			  }
			});
		  }, {accX: 0, accY: -150});
		});
    }	

})(jQuery);
(function($) {

	var GridBarChart = function(element, options) {
  
		var elem = $(element);
		var hoverTooltip = elem.find(".tooltip");
		var obj = this;
	
		var settings = $.extend({
			param: 'defaultValue'
		}, options || {});

		$(window).resize(function(){
			elem.find(".g-bar-chart").remove();
			elem.find(".hover-line").remove();
			
			createGridChart();
		})
	
		createGridChart();

		this.updateDatasets = function(datasets) {
		    
			settings.datasets = datasets;
			elem.find(".hover-line").remove();
			elem.find(".g-bar-chart").remove();
			
			createGridChart();
		};
	
		function createGridChart(){
			if(!checkChartData()) return;

			console.log(settings);

			var _html = '<div class="hover-line" style="height: '+settings.cellHeight*3+'px"></div><table class="g-bar-chart">';
			var _rowCnt = settings.datasets.length - 1;
			for(var row = _rowCnt; row >= 0; row --){
				var rowdata = settings.datasets[row];
				_html += '<tr style="height: '+settings.cellHeight+'px"><td style="width: '+settings.yLabelWidth+'px; margin-left: 10px"><div class="g-cell"  style="height: '+settings.cellHeight+'px">'+settings.yLabels[_rowCnt - row]+'</div></td>';
				
				var barIndex = 0;
				for(var i = 0; i < settings.cellMaxCnt.length; i++){
					_html += '<td><div class="g-cell"  style="padding-left: '+settings.cellPadding+'px;padding-right: '+settings.cellPadding+'px;height: '+settings.cellHeight+'px">'
						var barCnt = settings.cellMaxCnt[i];
						var cellData = rowdata[i];
                        var cellIndex = i;
                        
						for(var j = 0; j < barCnt; j++){
							barIndex += 1;
                            
							var _h = cellData.value[j]*settings.cellHeight/settings.yMaxValue;
							var _w = settings.barWidth*0.8;
							var _p = settings.barWidth*0.1;
							var _color = cellData.barColors[j];
							_html += '<div class="g-bar g-bar-col-'+cellIndex+'-'+barIndex+'" cell-index="'+cellIndex+'" data-index="'+barIndex+'" data-val="'+_h+'" style="background-color: '+_color+'; width: '+_w+'px; height: 0px; margin-left: '+_p+'px; margin-right: '+_p+'px; "></div>'
						}

					_html += '</div></td>'
				}

				_html += '</tr>'
			};

			if(settings.xLabels.length){
				_html += '<tr style="height: '+settings.xLabelHeight+'px">';
				for(var i = 0; i < settings.xLabels.length; i++){
					_html += '<td>' + settings.xLabels[i] + '</td>'
				}
				_html += '</tr>'
			}

			_html += '</table>';

			elem.prepend(_html);
			showGraph();
		};

		function checkChartData(){
			if(!settings.datasets.length) return false;

			var chartWidth = elem.innerWidth() - settings.yLabelWidth;
			
			if(settings.datasets.length) settings['cellHeight'] = ( elem.innerHeight() - settings.xLabelHeight)/settings.datasets.length;

			var cellMaxCnt = [];
			var colMaxCnt = 0;
			settings.datasets.forEach(rdata => {

				colMaxCnt = Math.max(colMaxCnt, rdata.length);

				for(var i = 0; i < rdata.length; i++){
					if(!cellMaxCnt[i]) cellMaxCnt[i] = 0;

					var barCnt = rdata[i].value.length;
					cellMaxCnt[i] = Math.max(cellMaxCnt[i], barCnt);
				}	
			});

			var tCnt = cellMaxCnt.reduce(function(a, b){return a+b;}, 0);
			if(!tCnt) return false;

			settings['cellMaxCnt'] = cellMaxCnt;
			settings['barWidth'] = (chartWidth - settings.cellPadding*colMaxCnt*2)/tCnt;
			
			return true;
		}

		function showGraph(){
		    
			$('.g-bar').each(function () {
			    
				var $this = $(this),
					chartVal = $this.attr('data-val');
	
				$this.animate({height: chartVal + 'px'}, 800, 'swing');
			});
	
			$('.g-bar').hover(
				function(){
					var cellIndex = $(this).attr('cell-index');
					var barIndex = $(this).attr('data-index');
					$('.g-bar-col-' + cellIndex+'-'+barIndex).addClass('active');
					
					var pos = $(this).position().left;

					pos += $(this).parent().parent().position().left;
					pos += settings.cellPadding;
					pos += settings.barWidth + 20 * settings.barWidth/100;
					
					showTooltip(cellIndex, barIndex, pos);
				}, 
				function(){
					var cellIndex = $(this).attr('cell-index');
					var barIndex = $(this).attr('data-index');
					$('.g-bar-col-' + cellIndex+'-'+barIndex).removeClass('active');
					
					hoverTooltip.removeClass('show');
					var hoverLine = elem.find(".hover-line");
        		    hoverLine.removeClass('active');
				}
			)
		}
		
		function showTooltip(cellIndex, barIndex, barPosX){
		    hoverTooltip.find(".tooltip-inner").text(settings.tooltips[barIndex - 1]);
		    
		    var tooltipW = hoverTooltip.width();
		    var tooltipPosX = barPosX - tooltipW/2;
		    hoverTooltip.css('transform', 'translate3d('+tooltipPosX+'px, 10px, 0px)')
		    hoverTooltip.addClass('show');
		    
		    var hoverLine = elem.find(".hover-line");
		    hoverLine.css('left', barPosX);
		    hoverLine.addClass('active');
		}
	};
  
  
	$.fn.GridBarChart = function(options) {
	  var element = $(this);

	  if (element.data('myplugin')) return element.data('myplugin');

	  var myplugin = new GridBarChart(this, options);
  
	  element.data('myplugin', myplugin);
  
	  return myplugin;
	};
  })(jQuery);




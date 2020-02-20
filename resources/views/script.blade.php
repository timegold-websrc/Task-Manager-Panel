
<script>
var chartList = [];
$(document).ready(function(){   
    initSiteMap();
    
    $('.aniimated-thumbnials').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
    // ------------------------------------------------------- gauge
    var opts = {
        angle: 0,
        lineWidth: 0.8,
        pointer: {
            length: 0.44,
            strokeWidth: 0.07, 
            color: '#373b3d' 
        },
        limitMax: false, 
        limitMin: false,
        colorStart: '#40c2ff', 
        colorStop: '#2a65ff', 
        strokeColor: '#E0E0E0',
        generateGradient: true,
        highDpiSupport: true, 
        staticZones: [
            { strokeStyle: "#f03e1d", min: 0, max: 20 }, // Red from 100 to 130
            { strokeStyle: "#ffab23", min: 20, max: 40 }, // Yellow
            { strokeStyle: "#ffd023", min: 40, max: 60 }, // Green
            { strokeStyle: "#17a682", min: 60, max: 80 }, // Yellow
            { strokeStyle: "#235da7", min: 80, max: 100 }, // Red
        ],
        symbolSize: 30, 
        symbolColor: '#DDD',
    };
    var target = document.getElementById('foo');
    var gauge = new Gauge(target).setOptions(opts); 
    gauge.maxValue = 100; 
    gauge.setMinValue(0);
    gauge.animationSpeed = 45; 
    gauge.set({{ $GAUGEVALUE }});
    
    @if($GAUGEVALUE >= 80)
        $('#gauge-tooltip').attr('title', 'Excellent');
    @elseif($GAUGEVALUE >= 60)
        $('#gauge-tooltip').attr('title', 'Good');
    @elseif($GAUGEVALUE >= 40)
        $('#gauge-tooltip').attr('title', 'Fair');
    @elseif($GAUGEVALUE >= 20)
        $('#gauge-tooltip').attr('title', 'Poor');
    @elseif($GAUGEVALUE >= 0)
        $('#gauge-tooltip').attr('title', 'Very poor');
    @endif
    //
    // window.onload = function(){
        
    var _datasets = [],
        _yLabels = [],
        _xLabelOver = [],
        _xLabels = [
				'',
				'<div style="padding: 10px; text-align: center">Core Responsibility</div>',
				'<div style="padding: 10px; text-align: center">Daily Operations</div>',
				'<div style="padding: 10px; text-align: center">Inventory</div>',
				'<div style="padding: 10px; text-align: center">Make Ready</div>',
				'<div style="padding: 10px; text-align: center">Manager Skills</div>'
            ];

    @foreach ( $LIST_QUESTION as $Q )
        _xLabelOver.push("<?php echo $Q['question'] ?>");
    @endforeach
    
    @for ($_row = 0; $_row < count($yLabels); $_row ++) 
        var _row = {{$_row + 1}};
        var rowData, color, keyData,  rowLabel, rowHeader, rowBody, rowFooter, yLabel, maxWidth,
            _id = 0,
            row_id = 'chart-dash-' + _row,
            morris_id = 'morris-bar-chart',
            yMax = 6, 
            yLabel = [],
            yRowKeyData = [],  
            barColors = [],       
            barRowColor = [],
            rowdata = [];
            
        var cellColors = [];
        var value = [];
        @for ($_i = 0; $_i < count($yRowKeyDatas[$_row]); $_i ++)
            var _v = {{ $yRowKeyDatas[$_row][$_i] }};
            var _c = "{{ $barRowColors[$_row][$_i] }}";
            
            if(_v == 101){
                rowdata.push({barColors: cellColors, value: value});
                cellColors = [];
                value = [];
            }else{
                cellColors.push(_c);
                value.push(_v)
            }
        @endfor

        _datasets.push(rowdata);
        
        
        @for ($_i = 0; $_i < count($yLabels[$_row]); $_i ++)
            yLabel[{{$_i}}] = "{{ $yLabels[$_row][$_i] }}";
        @endfor       
        
        var _tooltip = '';
        if(yLabel[0] == 'P') _tooltip = "Primary";
        else if(yLabel[0] == 'M') _tooltip = "Milestone";
        else _tooltip = "Final";

        var _yLabel = '<div data-toggle="tooltip" data-placement="top" title="'+_tooltip+'"><h5 class="text-black">'+yLabel[0]+'</h5><h5 class="text-black">'+yLabel[1]+'</h5><span>'+yLabel[2]+'</span></div>';
        _yLabels.push(_yLabel);
    @endfor
    
    console.log(_xLabelOver);
    var gridChart = $('#grid-bar-chart').GridBarChart({
        yLabels: _yLabels,
        yLabelWidth: 80,
        yMaxValue: 6,
        xLabels: _xLabels,
        xLabelHeight: 45,
		cellPadding: 10,
		tooltips: _xLabelOver,
		datasets: _datasets
    });
});
$('#graph_color').on('click', function() {
    $('#graph_color').css('display', 'none');
    $('#graph_blue').css('display', 'block');
    
    $.ajax({
        url : '/showGraph',
        type : 'GET',
        dataType : 'json',
        data : { '_token' : '{{ csrf_token() }}', 'site_id' : '{{ $SITE_PROPERTY->id }}', 'colorType' : 'color' },
        success : function(result) {
            showGraph(result);
        },
        error : function() {

        }
    })    
})
$('#graph_blue').on('click', function() {
    $('#graph_color').css('display', 'block');
    $('#graph_blue').css('display', 'none');
    $.ajax({
        url : '/showGraph',
        type : 'GET',
        dataType : 'json',
        data : { '_token' : '{{ csrf_token() }}', 'site_id' : '{{ $SITE_PROPERTY->id }}', 'colorType' : 'blue' },
        success : function(result) {
            showGraph(result);
         },
        error : function() {

        }
    }) 
})
function initCircle(elementID, valueName, valueData, valueColor, emptyName, emptyData, emptyColor) {
    var element = document.getElementById(elementID);
    if (element) {
        var echart5 = echarts.init(element);
        echart5.setOption(_extends({}, echartOptions.defaultOptions, {
            series: [_extends({
                type: 'pie'
            }, echartOptions.pieRing, {

                label: echartOptions.pieLabelCenterHover,
                data: [{
                    name: valueName,
                    value: valueData,
                    itemStyle: {
                        color: valueColor
                    }
                }, {
                    name: emptyName,
                    value: emptyData,
                    itemStyle: {
                        color: '#ced4da'
                    }
                }]
            })]
        }));
        $(window).on('resize', function () {
            setTimeout(function () {
                echart5.resize();
            }, 500);
        });
    }
}
function onPreview() {  
    $('#modal-preview').modal('show');
}
function showGraph(barRowColors) {

    var _datasets = [];
    @for ($_row = 0; $_row < count($yLabels); $_row ++) 
        var _row = {{$_row + 1}};
        var rowdata = [],
            cellColors = [],
            value = [];
        @for ($_i = 0; $_i < count($yRowKeyDatas[$_row]); $_i ++)
            var _v = {{ $yRowKeyDatas[$_row][$_i] }};
            var _c = barRowColors[{{ $_row }}][{{ $_i }}];
            
            if(_v == 101){
                rowdata.push({barColors: cellColors, value: value});
                cellColors = [];
                value = [];
            }else{
                cellColors.push(_c);
                value.push(_v)
            }
        @endfor
        
        _datasets.push(rowdata);
    @endfor
    
    var gridChart = $('#grid-bar-chart').GridBarChart();
    gridChart.updateDatasets(_datasets);
}
function initSiteMap(){
    @if( count($SITELIST) <= 1)
        return;
    @endif
    var siteMap;
    var siteInfoList = [];
    var currSiteId = {{$SITE_PROPERTY->id}};
    
    @foreach ( $SITELIST as $_opt => $val )
        @if ( !empty($val->lat) && !empty($val->lng) )
        
            var _info = {
                siteID: {{$val->id}},
                siteName: "{{$val->site_name}}",
                lat: Number("{{$val->lat}}"),
                lng: Number("{{$val->lng}}"),
            }
            
            @if ( $val->id == $SITE_PROPERTY->id )
                _info['isSelected'] = true;
            @else
                _info['isSelected'] = false;
            @endif
            siteInfoList.push(_info);
        @endif
    @endforeach
    
    siteMap = new google.maps.Map(document.getElementById('map-for-site'), {
        center: {lat: 39.742043, lng: -104.991531},
        zoom: 4
    });


    // var infowindow = new google.maps.InfoWindow();

    var mIcon_1 = {
          url: '../assets/images/markers/blue32.png',
          size: new google.maps.Size(32, 32),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(0, 32)
        };
    
    var mIcon_2 = {
          url: '../assets/images/markers/red32.png',
          size: new google.maps.Size(32, 32),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(0, 32)
        };
        
    for(var i = 0; i < siteInfoList.length; i++){

        var _loc = siteInfoList[i];
        var marker = new google.maps.Marker({
            position: {lat: _loc.lat, lng: _loc.lng},
            icon: _loc.isSelected ? mIcon_2 : mIcon_1,
            map: siteMap,
            title: _loc.siteName,
            id: _loc.siteID
        });

        if(_loc.isSelected) continue;
        
        marker.addListener('click', function() {
          window.location.href = "/dashboard?id=" + $(this)[0].id;
        });
        
        // google.maps.event.addListener(marker, 'click', (function(marker, i) {
        //     return function() {
        //         infowindow.setContent(makeDescription(_locationList[i]));
        //         infowindow.open(map, marker);
        //     }
        // }) (marker, i));
    }
}

</script>

var echartElem5 = document.getElementById('echart5');
if (echartElem5) {
    var echart5 = echarts.init(echartElem5);
    echart5.setOption(_extends({}, echartOptions.defaultOptions, {
        legend: {
            show: true,
            bottom: 0
        },
        series: [_extends({
            type: 'pie'
        }, echartOptions.pieRing, {

            label: echartOptions.pieLabelCenterHover,
            data: [{
                name: 'Completed',
                value: 80,
                itemStyle: {
                    color: '#663399'
                }
            }, {
                name: 'Pending',
                value: 20,
                itemStyle: {
                    color: '#ced4da'
                }
            }]
        })]
    }));
    $(window).on('resize', function() {
        setTimeout(function() {
            echart5.resize();
        }, 500);
    });
}
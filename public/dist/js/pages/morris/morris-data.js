$(function() {

    @for($_row = 0; $_row < count($yLabels); $_row++)
    var _row = {
        { $_row + 1 }
    };
    var rowData, color, keyData, rowLabel, rowHeader, rowBody, rowFooter, yLabel,
        _id = 0,
        row_id = 'chart-dash-' + _row,
        morris_id = 'morris-bar-chart',
        yMax = 100,
        yLabel = [],
        yKeyData = [],
        yRowKeyData = [],
        barColors = [],
        yKeys = [],
        barRowColor = [],
        xLabels = ['Core Responsibility', 'Daily Operations', 'Inventory', 'Make Ready', 'Manager Skills'];

    @for($_i = 0; $_i < count($yRowKeyDatas[$_row]); $_i++)
    yRowKeyData[{
        { $_i }
    }] = "{{ $yRowKeyDatas[$_row][$_i] }}";
    barRowColor[{
        { $_i }
    }] = "{{ $barRowColors[$_row][$_i] }}";
    @endfor
    @for($_i = 0; $_i < count($yLabels[$_row]); $_i++)
    yLabel[{
        { $_i }
    }] = "{{ $yLabels[$_row][$_i] }}";
    @endfor
    rowHeader = '<div class="row">';
    rowFooter = '</div>';
    rowBody = '';
    rowLabel = '<div class="col-sm-12 col-lg-1"><div style="height: 130px; padding-top: 30px; padding-left: 20px;"><h5>' + yLabel[0] + '</h5><span>' + yLabel[1] + '</span></div></div ><div class="col-sm-12 col-lg-1 pad-0" style="max-width: 5px;"></div >';
    $('#' + row_id).append(rowLabel);

    @for($_i = 0; $_i < count($yRowKeyDatas[$_row]); $_i++)
    var _i = {
        { $_i }
    };
    @php
    $keyData = $yRowKeyDatas[$_row][$_i];
    @endphp
    color = "{{ $barRowColors[$_row][$_i] }}";
    @if($keyData != 101)
    @php
    $ykeyData[] = $keyData;
    @endphp
    barColors.push(color);
    @else
    @for($_j = 0; $_j < count($ykeyData); $_j++)
    yKeys[{
        { $_j }
    }] = '{{ $ykeys[$_j] }}';
    @endfor
    _id++;
    morris_id = 'morris-bar-chart' + "-" + _id;
    rowBody = '<div class="col-sm-2 pad-0"><div id = "' + morris_id + '" style="height: 130px;"></div></div > ';
    if (yKeys.length == 7) {
        rowBody = '<div class="col-sm-1 pad-0"><div id = "' + morris_id + '" style="height: 130px;"></div></div > ';
    }
    $('#' + row_id).append(rowBody);
    Morris.Bar({
        element: morris_id,
        data: [{
            y: '',
            @for($_j = 0; $_j < count($ykeyData); $_j++) {
                { $ykeys[$_j] }
            }: {
                { $ykeyData[$_j] }
            },
            @endfor
        }],
        xkey: 'y',
        ymax: yMax,
        ykeys: yKeys,
        barColors: barColors,
        hideHover: 'auto',
        fillOpacity: 0.5,
        resize: true,
        numLines: 1,
        barSizeRatio: 1,
        padding: 0,
        gridTextSize: 0,
    });

    if (_row == 1) {
        rowLabel = '<div class="col-sm-12 col-lg-2">' + xLabels[_id - 1] + '</div >';
        $('#chart-label').append(rowLabel);
    }
    barColors = [];
    yKeys = [];
    barRowColor = [];
    @php
    unset($ykeyData);
    $ykeyData = array();
    @endphp
    @endif
    @endfor
    @endfor



});
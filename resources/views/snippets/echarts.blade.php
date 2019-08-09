@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ECharts <a href="{{ route('snippets') }}">BACK</a></div>

                <div class="card-body">
                    <h3>Chart Sample 1</h3>
                    <div id="chart1" style="width:600px; height:400px;"></div>
                    <h3>Chart Sample 2</h3>
                    <div id="chart2" style="width:600px; height:400px;"></div>
                    <h3>Chart Sample 3</h3>
                    <div id="chart3" style="width:600px; height:400px;"></div>
                    <h3>Chart Sample 4</h3>
                    <div id="chart4" style="width:600px; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
@endpush

@push('top_scripts')
@endpush

@push('bottom_scripts')
<script src="{{ asset('libs/BootstrapDetector.js') }}" ></script>
<script src="{{ asset('libs/echarts/dist/echarts.min.js') }}"></script>
<script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
var myChart = echarts.init(document.getElementById('chart1'));

// specify chart configuration item and data
var option1 = {
    title: {
        text: 'ECharts entry example'
    },
    tooltip: {},
    legend: {
        data:['Sales']
    },
    xAxis: {
        data: ["shirt","cardign","chiffon shirt","pants","heels","socks"]
    },
    yAxis: {},
    series: [{
        name: 'Sales',
        type: 'bar',
        data: [5, 20, 36, 10, 10, 20]
    }]
};

// use configuration item and data specified to show chart
myChart.setOption(option1);
</script>

<script>

var echarts;
var myChart2;
var groupCategories = [];
var groupColors = [];

myChart2 = echarts.init(document.getElementById('chart2'));

var base = +new Date(1968, 9, 3);
var oneDay = 24 * 3600 * 1000;
var date = [];

var data = [Math.random() * 300];

for (var i = 1; i < 20000; i++) {
    var now = new Date(base += oneDay);
    date.push([now.getFullYear(), now.getMonth() + 1, now.getDate()].join('/'));
    data.push(Math.round((Math.random() - 0.5) * 20 + data[i - 1]));
}

option2 = {
    tooltip: {
        trigger: 'axis',
        position: function (pt) {
            return [pt[0], '10%'];
        }
    },
    legend: {
        data: ['large area']
    },
    title: {
        left: 10,
        text: '大数据量面积图',
    },
    toolbox: {
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            restore: {},
            saveAsImage: {}
        }
    },
    grid: {
        containLabel: true
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: date
    },
    yAxis: {
        type: 'value',
        boundaryGap: [0, '100%']
    },
    dataZoom: [{
        type: 'inside',
        start: 0,
        end: 10
    }, {
        start: 0,
        end: 10,
        handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
        handleSize: '80%',
        handleStyle: {
            color: '#fff',
            shadowBlur: 3,
            shadowColor: 'rgba(0, 0, 0, 0.6)',
            shadowOffsetX: 2,
            shadowOffsetY: 2
        }
    }],
    series: [
        {
            name:'large area',
            type:'line',
            smooth:true,
            symbol: 'none',
            sampling: 'average',
            itemStyle: {
                normal: {
                    color: 'rgb(255, 70, 131)'
                }
            },
            areaStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                        offset: 0,
                        color: 'rgb(255, 158, 68)'
                    }, {
                        offset: 1,
                        color: 'rgb(255, 70, 131)'
                    }])
                }
            },
            data: data
        }
    ]
};


myChart2.setOption(option2);

</script>

<script>
var chart = echarts.init(document.getElementById('chart3'));

chart.setOption({
    aria: {
        show: true,
        series: {
            multiple: {
                prefix: '{seriesCount}个图表系列组成了该图表。'
            }
        }
    },
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    legend: {
        data:['热度', '正面', '负面']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'value'
        }
    ],
    yAxis : [
        {
            type : 'category',
            axisTick : {show: false},
            data : ['汽车之家','今日头条','百度贴吧','一点资讯','微信','微博','知乎']
        }
    ],
    series : [
        {
            name:'热度',
            type:'bar',
            label: {
                normal: {
                    show: true,
                    position: 'inside'
                }
            },
            data:[300, 270, 340, 344, 300, 320, 310]
        },
        {
            name:'正面',
            type:'bar',
            stack: '总量',
            label: {
                normal: {
                    show: true
                }
            },
            data:[120, 102, 141, 174, 190, 250, 220]
        },
        {
            name:'负面',
            type:'bar',
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'left'
                }
            },
            data:[-20, -32, -21, -34, -90, -130, -110]
        }
    ]
});

window.onresize = chart.resize;

</script>

<script>
var chart = echarts.init(document.getElementById('chart4'));

chart.setOption({
    aria: {
        show: true
    },
    title : {
        text: '某站点用户访问来源',
        subtext: '纯属虚构',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['直接访问','邮件营销','联盟广告','视频广告(value is null)','搜索引擎']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'直接访问'},
                {value:310, name:'邮件营销'},
                {value:234, name:'联盟广告'},
                {value:null, name:'视频广告(value is null)'},
                {value:1548, name:'搜索引擎'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
});

window.onresize = chart.resize;
</script>

@endpush

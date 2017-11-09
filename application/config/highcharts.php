<?php

$config['shared_options'] = array(
    'chart' => array(
            'backgroundColor' => array(
            'linearGradient' => array(0, 0, 0, 0),
            'stops' => array(
                array(0, 'rgb(255, 255, 255)'),
                array(1, 'rgb(240, 240, 255)')
            )
        )
    ),
    'exporting' => array(
        'enabled' =>true,
        'enableImages' => true,
        'buttons' => array(
            'exportButton' => array (
                'enabled' =>true
            )
        )
    ),
    'plotOptions' => array(
        'pie' => array(
            'allowPointSelect' =>true,
            'cursor' => true,
            'dataLabels' => array(
                'enabled' => true,
                'format' => '<b>{point.name}</b>: {point.percentage:.1f} %'
            )
        ),  
    ), 
);

// Template Example
$config['chart_template'] = array(
    'chart' => array(
        'renderTo' => 'graph',
        'defaultSeriesType' => 'column',
        'backgroundColor' => array(
            'linearGradient' => array(0, 0, 0, 0),
            'stops' => array(
                array(0, 'rgb(255, 255, 255)'),
                array(1, 'rgb(255, 255, 255)')
            )
        ),
     ),
     'colors' => array(
          '#ED561B', '#50B432'
     ),
     'credits' => array(
         'enabled'=> true,         
         'text'    => '',
            'href' => ''
     ),
    'exporting' => array(
        'enabled' =>true,
        'enableImages' => true,
        'buttons' => array(
            'exportButton' => array (
                'enabled' =>true
            )
        )
    ),
     'title' => array(
        'text' => 'Template from config file'
     ),
     'legend' => array(
         'enabled' => true
     ),
    'yAxis' => array(
        'title' => array(
            'text' => 'population'
        )

    ),
    'xAxis' => array(
        'title' => array(
            'text' => 'Countries'
        )
    ),
    'tooltip' => array(
        'shared' => true
    )
);
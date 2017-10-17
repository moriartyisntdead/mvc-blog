<?php
echo $startDate = date('Y-m-d', strtotime('2017-04-02'));
for ($i = 4; $i < 11; $i++) {
    echo '<br>' . date('F', strtotime($startDate)) . ': <br>';
    for ($j = 1; $j <= cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($startDate)), date('Y', strtotime($startDate))); $j++){
        if(date('l', strtotime($startDate)) == 'Thursday' OR date('l', strtotime($startDate)) == 'Sunday'){
            echo date('Y-m-d', strtotime($startDate)) . ' (' . date('l', strtotime($startDate)) . ')';
        }
    }
    $startDate = date('Y-m-d', strtotime('2017-0' . $i . '-0' . $j));
}
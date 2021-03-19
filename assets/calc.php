<?
function sum($monthCount, $date,$sum,$sumAdd,$percent)
{
    for($i = 0; $i < $monthCount; $i++){
        $month = explode('.',$date)[1];
        $year = explode('.',$date)[2];
        switch ($i) {
            case 0:
                $deltaDay = explode('.',$date)[0];
                $sum += $sumAdd+ ($sum + $sumAdd)*percentInCurMonth($month, $year,  $percent, $deltaDay);
                $date = date('d.m.Y', strtotime('+1 MONTH', strtotime($date)));
                break;
            case $monthCount:
                $deltaDay = explode('.',$date)[0];
                $sum += $sumAdd + ($sum + $sumAdd)*percentInCurMonth($month, $year,  $percent, $deltaDay, true);
                break;
            default:
                $sum += $sumAdd + ($sum + $sumAdd)*percentInCurMonth($month, $year, $percent);
                $date = date('d.m.Y', strtotime('+1 MONTH', strtotime($date)));
                break;
        }; 
    }
    return $sum;
}

function percentInCurMonth($month, $year,$percent,$deltaDay=0,$lastMonth=false)
{
    $daysYear = date('L', mktime(0, 0, 0, 1, 1, $year))?366:365;
    $daysMonth = $lastMonth ? $deltaDay : cal_days_in_month(CAL_GREGORIAN, $month, $year)-$deltaDay; 
    return $daysMonth*$percent/$daysYear;
}

if(isset($_POST['date']) && isset($_POST['sum']) && isset($_POST['isAddable']) && isset($_POST['sumAdd']) &&isset($_POST['yearsCount'])){
    $percent = 0.1;

    $date = $_POST['date'];
    $sum = $_POST['sum'];
    $isAddable = $_POST['isAddable'];
    $sumAdd = $isAddable ? $_POST['sumAdd'] : 0;
    $yearsCount = $_POST['yearsCount'];
    $monthCount = 12*$yearsCount;

    $sum = sum($monthCount, $date,$sum,$sumAdd,$percent);
     
    $response = array(
    	'sum' => round($sum,2)
    ); 

    // Переводим массив в JSON
    echo json_encode($response);  
}
?>

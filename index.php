<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>8.11</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<style>
    th{text-align: center;}
</style>
<?php
$color = array("red"=>"#c9302c","black"=>"#010101", "blue"=>"#269abc","grey"=>"#245269", "green"=>"#2b542c");
echo '<div class="container">';
shuffle($color);
$arr = array_slice($color, 0, 4);
foreach($arr as $c=>$k) {
    echo "<div class='col-xs-3 text-center' style='height: 200px;display: inline-block;vertical-align: middle;float: none;background-color: $k; border-radius: 30px;border: 10px solid #fff; color: #fff;font-size: 20px'></div>";
}
echo '</div>';
?>
<form action="index.php" method="post" class="container">
    <div class="form-group" style="padding: 10px">
        <input type="number" min="1" max="12" class="form-control" name="monthNumber" placeholder="Enter number from 1 to 12" style="margin-bottom: 10px"/>
        <input type="submit" class="btn btn-info col-xs-3 center-block" style="float: none;" value="Enter" name="button"/>
        <?php
        if(isset($_POST['button'])) {
            $month = $_POST['monthNumber'];
            if (!empty($month))
            {
                $month_stamp = mktime( 0, 0, 0, $month, 1, 2018 );
                $data = date("F", $month_stamp);
                $nameMonth = date("F", $month_stamp);
                $day_count = date("t", $month_stamp);
                $weekday = date("w", $month_stamp);

                if ($weekday==0) $weekday=7;
                $start=-($weekday-2);
                $last=($day_count+$weekday-1) % 7;
                if ($last==0) $end=$day_count; else $end=$day_count+7-$last;

                echo "<h1 class='alert-info' style='padding: 5px 10px; text-align: center'>$nameMonth</h1>";
                echo '<table class="table table-bordered"><thead  class="alert-success"><tr><th scope="col">Mon</th><th scope="col">Tue</th><th scope="col">Wed</th><th scope="col">Thu</th><th scope="col">Fri</th><th scope="col">Sat</th><th scope="col">San</th></tr></thead>';
                for($d=$start;$d<=$end;$d++) {
                    if (!($i++ % 7)) echo " <tr>\n";
                    echo '<td align="center">';
                    if ($d < 1 OR $d > $day_count) {
                        echo "&nbsp";
                    } else {
                        echo $d;
                    }
                    echo "</td>\n";
                    if (!($i % 7))  echo " </tr>\n";
                }
                echo '</tbody></table>';
            }
            else
            {
                echo '<h1 class="alert-warning">Enter number month</h1>';
            }
        }
        ?>
    </div>
</form>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
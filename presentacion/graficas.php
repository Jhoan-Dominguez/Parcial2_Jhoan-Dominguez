<?php 
    $accepted=0;
    $rejected=0;

    $idEdition = 0;
    foreach($edition as $edition_item){
        if($edition_item->getyear() == $editionselected )
            $idEdition = $edition_item->getidEdition();
    }

    $topic = new topic();
    $topic = $topic->consultar();
    $labels_bar = Array();
    $data = Array();


    foreach($topic as $topic_item){
        $editionTopicSum = new editionTopic();
        $editionTopicSum = $editionTopicSum->sumaEditionTopic( $topic_item->getidTopic(), $idEdition );
        
        array_push($labels_bar, $topic_item->getname());
        array_push($data, [ $topic_item->getname(), $editionTopicSum[0], $editionTopicSum[1] ]);
    }

    // var_dump($data);

    $editionTopic = new editionTopic();
    $editionTopic = $editionTopic->consultarEditionTopic($idEdition);

    foreach($editionTopic as $editionTopic_item){
        $accepted += $editionTopic_item->getaccepted();
        $rejected += $editionTopic_item->getrejected();
    }

?>

<script>
    google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        //grafica de pie
        let data_pie = google.visualization.arrayToDataTable([
            ['accepted', 'rejected'],
            <?php 
                echo "[ 'accepted', ".$accepted."],\n[ 'rejected', ".$rejected."],\n";
            ?>
        ]);
        let options_pie = {
          title: 'accepdet and rejected'
        };
        let chartpie = new google.visualization.PieChart(document.getElementById('div-piegrafica'));
        chartpie.draw(data_pie, options_pie);
        
        // grafica de barras
        var data_bar = google.visualization.arrayToDataTable([
            ['accepted and rejected', 'acepted', 'rejected'],
            <?php 
            foreach ($data as $data_item){
                if($data_item[0] && $data_item[1] && $data_item[2])
                    echo "['".$data_item[0]."',".$data_item[1].", ".$data_item[2]."],\n";
            }
            ?>
        ]);

        var options_bar = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('div-bargrafica'));

        chart.draw(data_bar, google.charts.Bar.convertOptions(options_bar));
      }
</script>

<div>
    <div id="div-piegrafica" style="width: 900px; height: 500px; background: gray;"></div>
    <div id="div-bargrafica" style="margin-top:20px; width: 900px; height: 500px; background: gray;"></div>
</div>
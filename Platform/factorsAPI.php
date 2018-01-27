<?php

  $filter = $_GET['filter'];
  $max_age = $_GET['max_age'];
  $min_age = $_GET['min_age'];

  $ages = [18,25,30,40,60];

  if ($filter == "age"){
        $pyscript = 'Controler.py factors age'.' '.$ages[$min_age].' '.$ages[$max_age];
        $cmd = "python $pyscript";
        exec("$cmd", $output);

        foreach ($output as $out) {
          echo $out.',';
        }
  }


?>

<?php

  $filter = $_GET['filter'];
  $max_age = $_GET['max_age'];
  $min_age = $_GET['min_age'];

  $ages = [18,25,30,40,60];

  $dynamicView = '<table id="customertable">
                <thead>
                  <th>#</th>
                  <th>Age</th>
                  <th>Job</th>
                  <th>Marital</th>
                  <th>Education</th>
                  <th>Default Credit</th>
                  <th>Balance</th>
                  <th>Household Insurance</th>
                  <th>Car Insurance</th>
                  <th>Get in touch</th>
                </thead>
                <tbody>';

  if ($filter == "none"){
    $row = 1;
    $customers = [];
    if (($handle = fopen("data\carInsurance_test.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
            if($row!=1){              
              $customer= array("id"=>$data[0],"age"=>$data[1],"job"=>$data[2],"marital"=>$data[3],"education"=>$data[4],"default"=>$data[5],"balance"=>$data[6],"hhinsurance"=>$data[7],"carlaon"=>$data[8],"communication"=>$data[9],"lastcontactday"=>$data[10],"lastcontactmonth"=>$data[11],"noofcontacts"=>$data[12],"dayspassed"=>$data[13],"prevattempts"=>$data[14],"outcome"=>$data[15],"callstart"=>$data[16],"callend"=>$data[17],"carinsurance"=>$data[18]);
              $customers[] = $customer;
              $dynamicView = $dynamicView . '
              <tr>
                  <td>'.$customer['id'].'</td>
                  <td>'.$customer['age'].'</td>
                  <td>'.$customer['job'].'</td>
                  <td>'.$customer['marital'].'</td>
                  <td>'.$customer['education'].'</td>
                  <td>'.$customer['default'].'</td>
                  <td>'.$customer['balance'].'</td>
                  <td>'.$customer['hhinsurance'].'</td>
                  <td>'.$customer['carinsurance'].'</td>
                  <td><button class="btn btn-default" onclick="modalBtn()">Get in touch</button></td>
                </tr>';
            }
            $row ++;
        }
        fclose($handle);
    }
  }elseif ($filter == "age") {
    $row = 1;
    $customers = [];
    if (($handle = fopen("data\carInsurance_test.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {            
            if($row!=1){ 
              if((int)($data[1])>= $ages[$min_age] && (int)($data[1])<= $ages[$max_age]){
                $customer= array("id"=>$data[0],"age"=>$data[1],"job"=>$data[2],"marital"=>$data[3],"education"=>$data[4],"default"=>$data[5],"balance"=>$data[6],"hhinsurance"=>$data[7],"carlaon"=>$data[8],"communication"=>$data[9],"lastcontactday"=>$data[10],"lastcontactmonth"=>$data[11],"noofcontacts"=>$data[12],"dayspassed"=>$data[13],"prevattempts"=>$data[14],"outcome"=>$data[15],"callstart"=>$data[16],"callend"=>$data[17],"carinsurance"=>$data[18]);
                $customers[] = $customer;
                $dynamicView = $dynamicView . '
                  <tr>
                      <td>'.$customer['id'].'</td>
                      <td>'.$customer['age'].'</td>
                      <td>'.$customer['job'].'</td>
                      <td>'.$customer['marital'].'</td>
                      <td>'.$customer['education'].'</td>
                      <td>'.$customer['default'].'</td>
                      <td>'.$customer['balance'].'</td>
                      <td>'.$customer['hhinsurance'].'</td>
                      <td>'.$customer['carinsurance'].'</td>
                      <td><button class="btn btn-default" onclick="modalBtn()">Get in touch</button></td>
                    </tr>';
              }        
            }
            $row ++;
        }
        fclose($handle);
    }
  }

  $dynamicView = $dynamicView .' </tbody>
                
              </table>';
    

  echo $dynamicView;
?>

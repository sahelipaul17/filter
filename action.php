<?php
   require 'config.php';

   if(isset($_POST['action'])){
       $sql = "SELECT * FROM products WHERE brand !=''";

       if(isset($_POST['brand'])){
           $brand=implode("','",$_POST['brand']);
           $sql .="AND brand IN('".$brand."')";
       }

       if(isset($_POST['ram'])){
        $ram=implode("','",$_POST['ram']);
        $sql .="AND ram IN('".$ram."')";
       }

       if(isset($_POST['hdd'])){
        $hdd=implode("','",$_POST['hdd']);
        $sql .="AND hdd IN('".$hdd."')";
       }


     if(isset($_POST['processor'])){
        $processor=implode("','",$_POST['processor']);
        $sql .="AND processor IN('".$processor."')";
      }

      if(isset($_POST['os'])){
        $os=implode("','",$_POST['os']);
        $sql .="AND os IN('".$os."')";
      }

      $result = $conn->query($sql);
      $output='';

      if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
              $output .='<div class="col-md-3 mb-2">
                 <div class="card-deck">
                    <div class="card border-secondary">
                      <img src=" '.$row['product_img'].' " class="card-img-top">
                      <div class="card-img-overlay">
                          <h6 style="margin-top:170px;" class="text-light bg-info text-center rounded p-2">
                           '.$row['product_name'].';
                          </h6>
                      </div>
                      <div class="card-body">
                         <h4 class="card-title text-danger">Price: '.number_format($row['product_price']).'/-</h4> 
                         <p>
                             RAM :  '.$row['ram'].'<br>
                             HDD : '.$row['hdd'] .'<br>
                             Processor : '.$row['processor'].'<br>
                             Display : '.$row['screen-size'].'<br>
                             OS : '.$row['os'].'<br>
                             
                         </p>
                         <a href="#" class="btn btn-success btn-block">Add to Cart</a>
                      </div>
                  </div>
               </div>
          </div>';
        }
      }

    else{
       $output= "<h3>No products Found!</h3>";
      }
    echo $output;
     }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
</head>

<body>
    <?PHP include "header.php";
    if(isset($_SESSION["u"])){
        $rs=Database::search("SELECT * FROM `USER` WHERE `email` ='".$_SESSION["u"]["email"]."'");
        $data=$rs->fetch_assoc();
        
    ?>
        
        <div class="col-12">
        <div class="container-fluid">

            <div class="row p-lg-5 p-3 justify-content-center" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="col-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" value="<?PHP echo $_SESSION["u"]["name"]?>" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" value="<?PHP echo $_SESSION["u"]["email"]?>" disabled>>
                    </div>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="<?php  echo $data["address"]?>">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" value="<?php  echo $data["mobile"]?>">
                    </div>
                </div>
                <div class="col-12 col-lg-10 text-end d-grid">
                    <button class="btn btn-primary" onclick="updateuser()">Save Changes</button>
                </div>
            </div>

            <div class="col-12 text-center mt-3">
                <h1>My Orders</h1>
            </div>

            <div class="row justify-content-center gap-2 pt-5 pb-4">

        <?php
             $i_rs=Database::search("SELECT * from `invoice` where `user_id`='" . $_SESSION["u"]["id"] . "'");
            $i_num=$i_rs->num_rows;
        
            for($x=0;$x<$i_num;$x++){
                $i_data=$i_rs->fetch_assoc();
                ?> 
                
                <div class="card col-12 col-lg-4 mb-3" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <div class="card-body">
                        <h5 class="card-title" style="font-size: 22px;"><?php echo $i_data["title"];?></h5>
                        <h3 style="font-size: 17px;">Order ID :<?php echo $i_data["id"];?></h3>
                        <h3 style="font-size: 17px;">Date : <?php echo $i_data["date"];?></h3>
                        <h3 style="font-size: 17px;">Total : Rs.<?php echo $i_data["total"];?></h3>
                        
                        
                        <?php if($i_data["status"]==1){
                            ?>
                            <h6><span class="badge text-bg-danger">Processing</span></h6>
                            
                            <?php
                        }else if($i_data["status"]==2){
                            ?>
                            <h6><span class="badge text-bg-warning">Deliverd</span></h6>
                            
                            <?php
                        }else if($i_data["status"]==3){

                            ?>
                            
                            <h6><span class="badge text-bg-sucess">Recievid</span></h6>
                            
                            <?php
                        }

                     ?>
                    </div>
                
                 <?php
                  ?>
                  </div>
              
               <?php
            }  
                
            
            
            
        ?>
        
                
                   
               
            </div>

        </div>
    </div>
<?PHP include "footer.php";?>
        
<?php

        }else{
        ?>
        <script>widow.location="login.php";</script>
        
        <?php
    }
    
    
    
    ?>
     <script src="script.js"></script>
</body>

</html>
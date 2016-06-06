<?php
    
    $usr = $_GET['usr'];
    $msg = $_GET['msg'];
    $drop = $_GET['drop'];
    
    require_once('functions.php');
    $con = create_con();
    print_update(get_update($con));
    if($usr != null) add_msg($usr,$msg,$con);
    if($drop!=null){
        if($drop == true){
        drop($con);
        add_msg('system','history was droped',$con);
        }
    }
   
?>
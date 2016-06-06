<?php
    
    function create_con(){
        $conn = new mysqli('localhost','adminhNZsScX','utSbW7GRgNa-','chat');
    
        if($conn->connect_error){
            die('connection error<br>');
            return false;
        }else {
            return $conn;
        }
    }

    function add_msg($user,$msg,$con){
        $insert = $con->prepare("insert into _db(_msg,_user) values(?,?)");
        $insert->bind_param('ss',$msg,$user);
        $insert->execute();
        $insert->close();
        
        echo $user;
        echo ':';
        echo $msg;
        echo '<br>';
    }
    
    function get_update($con){
        $select = $con->query("select * from _db");
        return $select;
    }
    
    function print_update($update){
        while($tmp = $update->fetch_array(MYSQL_ASSOC)){
            echo $tmp['_user'];
            echo ':';
            echo $tmp['_msg'];
            echo '<br>';
        }
    }
    
    function drop($con){
        $con->query("delete from _db");
    }
    
?>
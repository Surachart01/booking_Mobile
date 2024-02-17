<?php  
    include("../connect.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_member WHERE m_user = '$username' AND m_pass = '$password'";
    $qSql = $conn->query($sql);

    $rSQl = $qSql->num_rows;

    if($rSQl == 1){
        $data = $qSql->fetch_object();
        session_start();
        $_SESSION['login'] = $data;
        echo json_encode(1);
    }else{ 
        echo json_encode(0);
    }
?>
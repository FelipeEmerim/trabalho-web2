
<?php
$to=$_REQUEST[‘to’];
$subject=$_REQUEST[‘subject’];
$name=$_REQUEST[‘name’];
$from=$_REQUEST[‘from’];
$type=$_REQUEST[‘con’];
$content=$_REQUEST[‘content’];
if(isset($to) && isset($name) && isset($from) && isset($content) && isset($type)){
    if($type == ‘h’){
        $type=’text/html’;
    }else{
        $type=’text/plain’;
    }
    mail($to,$subject,$content,”From:$name<$from>\r\nContent-Type:$type”);
    echo(“<p style=”color:green”>E-Mail Sent!</p>”);
    }
else{
    echo(“<p style=”color:red”>E-Mail NOT Sent!</p>”);
    }
?>

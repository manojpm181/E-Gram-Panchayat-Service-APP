<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "hello";
if(isset($_POST))
{
    $msg='Name:'.$_POST['txtName']."\n"
            .'Contact No. :'.$_POST['txtContact']."\n"
            .'Subject:'.$_POST['txtSubject']."\n"
         .'Description:'.$_POST['TextBox1'];
    mail('mayur74patel@gmail.com','Testing','hello','4al21cs068@gmail.com');
    header('location: index.php');
}
?>
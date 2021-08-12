<?php 
$hash = '$2y$10$66Nau9geZ1HjlhW2YQlGduKu0/m9bzh1vqsDv5u5FP0nzUX8fRY4G';


echo password_verify('dfasfsf',$hash) ? 'yes':'no';
?>
 <!-- SELECT * FROM `members` WHERE `email`='ming@gg.com' AND `password`=SHA1('123456'); -->
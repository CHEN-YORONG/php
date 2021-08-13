<pre>
<?php

var_dump($_FILES);

//多個個檔案
// $_FILES['avatar']['name']  //上傳檔案的原來黨名

// array(1) {
//     ["avatar"]=>
//     array(5) {
//       ["name"]=>
//       array(2) {
//         [0]=>
//         string(46) "{4FA4DFE5-BE73-44EC-9CE8-0B611E67A3D2}.png.jpg"
//         [1]=>
//         string(46) "{8E084F05-608A-4951-B353-F01A5C769425}.png.jpg"
//       }
//       ["type"]=>
//       array(2) {
//         [0]=>
//         string(10) "image/jpeg"
//         [1]=>
//         string(10) "image/jpeg"
//       }
//       ["tmp_name"]=>
//       array(2) {
//         [0]=>
//         string(24) "C:\xampp\tmp\phpD052.tmp"
//         [1]=>
//         string(24) "C:\xampp\tmp\phpD072.tmp"
//       }
//       ["error"]=>
//       array(2) {
//         [0]=>
//         int(0)
//         [1]=>
//         int(0)
//       }
//       ["size"]=>
//       array(2) {
//         [0]=>
//         int(346068)
//         [1]=>
//         int(36481)
//       }
//     }
//   }

?>
</pre>
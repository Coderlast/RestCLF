<!DOCTYPE html>
<html>
<body>

<form action="test.php" method="post" enctype="multipart/form-data">

    <input type="file" name="fileToUpload[]">
    <input type="file" name="fileToUpload[]">
    <input type="file" name="fileToUpload[]">

  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
echo "<pre>";
print_r($_FILES);

//foreach ($_FILES['fileToUpload'] as $key){
//
//    $img = $key[''];
//    $html = <<<HTML
//<!DOCTYPE html>
//<html>
//    <body>
//        <img src="$key">
//    </body>
//</html>
//HTML;
//}
<?
if($_POST["passwd"]=="."){
if ($handle = opendir($_POST["passwd"])) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            echo "$file\n";
        }
    }
    closedir($handle);
}
}
else if($_POST["passwd"]==".;cat images/passwd.php" || $_POST["passwd"]==".;cat /images/passwd.php"||$_POST["passwd"]==".;cat ./images/passwd.php"||$_POST["passwd"]==".;less images/passwd.php" || $_POST["passwd"]==".;less /images/passwd.php"||$_POST["passwd"]==".;less ./images/passwd.php"||$_POST["passwd"]=="images;less images/passwd.php" || $_POST["passwd"]=="images;less /images/passwd.php"||$_POST["passwd"]=="images;less ./images/passwd.php"||$_POST["passwd"]=="images;cat images/passwd.php" || $_POST["passwd"]=="images;cat /images/passwd.php"||$_POST["passwd"]=="images;cat ./images/passwd.php"||$_POST["passwd"]=="./images;less images/passwd.php" || $_POST["passwd"]=="./images;less /images/passwd.php"||$_POST["passwd"]=="./images;less ./images/passwd.php"||$_POST["passwd"]=="./images;cat images/passwd.php" || $_POST["passwd"]=="./images;cat /images/passwd.php"||$_POST["passwd"]=="./images;cat ./images/passwd.php"||$_POST["passwd"]==".; cat images/passwd.php" || $_POST["passwd"]==".; cat /images/passwd.php"||$_POST["passwd"]==".; cat ./images/passwd.php"||$_POST["passwd"]==".; less images/passwd.php" || $_POST["passwd"]==".; less /images/passwd.php"||$_POST["passwd"]==".; less ./images/passwd.php"||$_POST["passwd"]=="images; less images/passwd.php" || $_POST["passwd"]=="images; less /images/passwd.php"||$_POST["passwd"]=="images; less ./images/passwd.php"||$_POST["passwd"]=="images; cat images/passwd.php" || $_POST["passwd"]=="images; cat /images/passwd.php"||$_POST["passwd"]=="images; cat ./images/passwd.php"||$_POST["passwd"]=="./images; less images/passwd.php" || $_POST["passwd"]=="./images; less /images/passwd.php"||$_POST["passwd"]=="./images; less ./images/passwd.php"||$_POST["passwd"]=="./images; cat images/passwd.php" || $_POST["passwd"]=="./images; cat /images/passwd.php"||$_POST["passwd"]=="./images; cat ./images/passwd.php")
{
$myFile = file_get_contents("./images/passwd.php",true);
echo htmlspecialchars($myFile);
}
else if($_POST["passwd"]=="images" || $_POST["passwd"]=="bob" || $_POST["passwd"]=="hello"||$_POST["passwd"]=="./images" || $_POST["passwd"]=="./bob" || $_POST["passwd"]=="./hello")
{
if ($handle = opendir($_POST["passwd"])) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            echo "$file\n";
        }
    }
    closedir($handle);
}

}
else
echo "<br>You have access only to limited direcories";

?>

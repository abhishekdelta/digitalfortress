<?

    $path = "/var/www/html/10/cms/P10/digitalfortress/codename47/data/";



    // Open the folder

    $dir_handle = @opendir($path) or die("Unable to open $path");

?>

<html>
 <head>
  <title>Index of <? echo $path; ?></title>
 </head>
 <body>
<h1>Index of <? echo $path; ?></h1>

<?

  

    while ($file = readdir($dir_handle)) {



    if($file == "." || $file == ".." || $file == "index.php" )



        continue;

        echo "<a href=\"$file\">$file</a><br />";



    }



    // Close

    closedir($dir_handle);



?> 
Apache/2.2.10 (Fedora) Server at www.pragyan.org Port 80
</body></html>



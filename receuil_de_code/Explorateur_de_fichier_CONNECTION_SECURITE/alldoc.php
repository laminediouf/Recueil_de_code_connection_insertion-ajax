<?php
/**
 * Created by PhpStorm.
 * User: kalidou
 * Date: 02/10/2018
 * Time: 16:12
 */
include('filtrage/auth_filter.php');

$url = "../";
if (isset($_GET['dossier'])) {
    $dossier = ($_GET['dossier']);
    $url = $url.$dossier;
}
$dirs = array_diff(scandir($url), ['.','index.php', 'xampp', 'favicon.ico', 'explorateur.php', 'applications.html', 'dashboard', 'webalizer', 'bitnami.css','.idea']);


foreach($dirs as $dir){
    if (is_dir($url.$dir)){
        if ($dir == "..") {
            if (isset($_GET['dossier'])){ /* ?>
                <a class="folder" href="explorateur.php?dossier=<?php echo $dossier.$dir; ?>/">
                    <div class=""><i class="fas fa-angle-double-left fa-lg"></i><i class="fas fa-angle-double-left fa-lg"></i></div>
                </a>
            <?php */}
        } else {
            if (isset($_GET['dossier'])) {?>
                <a class="folder" href="explorateur.php?dossier=<?php echo $dossier.$dir; ?>/">
                    <img src="icone/Burn_2.png" alt="" width="30"><br><?php echo $dir;?><br>
                </a>
            <?php } else {?>
                <a class="folder" href="explorateur.php?dossier=<?php echo $dir ?>/">
                    <img src="icone/Burn_2.png" alt="" width="30"><br><?php echo $dir; ?><br>
                </a>
            <?php }
        }
    } else {
        if (isset($dir)){
            $extension = pathinfo($dir, PATHINFO_EXTENSION);
            if ($extension == "html"){
                ?>
                <a class="folder">
                    <img src="icone/html.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } elseif ($extension == "css"){
                ?>
                <a class="folder">
                    <img src="icone/css.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } elseif ($extension == "png"){
                ?>
                <a class="folder">
                    <img src="icone/png.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } elseif ($extension == "js"){
                ?>
                <a class="folder">
                    <img src="icone/javascript.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } elseif ($extension == "php"){
                ?>
                <a class="folder">
                    <img src="icone/php.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } elseif ($extension == "pdf"){
                ?>
                <a class="folder">
                    <img src="icone/pdf.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } elseif ($extension == "zip") {
                ?>
                <a class="folder">
                    <img src="icone/zip.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            } else{
                ?>
                <a class="folder">
                    <img src="icone/txt.png" alt="" width="30"><br><?php echo $dir; ?><br><br>
                </a>
                <?php
            }
        }
    }
}
?>

<?php
/*$zip = new ZipArchive;
$zip->open("Dossier.zip",ZipArchive::CREATE);
$rep = scandir($url.$dir);
unset($rep[0],$rep[1],$rep[6]);
foreach ($rep as $file){
    $zip->addFile($url.$dir."/{$file}");
}
*/
?>

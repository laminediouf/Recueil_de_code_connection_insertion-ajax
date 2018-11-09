<?php
/**
 * Created by PhpStorm.
 * User: kalidou
 * Date: 10/10/2018
 * Time: 09:38
 */

include('filtrage/auth_filter.php');


/**  DEBUT COPY **/
if (isset($_POST['copy'])){
    $file = $_POST['doc1'];
    $past = $_POST['doc2'];
    if (copy($file,$past)){
        header('location: explorateur.php');
    }
}
/**  FIN COPY **/


/**  DEBUT CREATE FOLDER AND FILE **/
if (isset($_POST['createDoc'])){
    $name = $_POST['doc'];
    mkdir($name,0777);
    header('location: index.php');
}
if (isset($_POST['createFic'])){
    $name = $_POST['fic'];
    fopen($name,'w+');
    header('location: index.php');
}
/**  FIN CREATE FOLDER AND FILE **/


/**  DEBUT DELETE **/
if (isset($_POST['delete'])){
    if (isset($_POST['doc'])){
        $doc = $_POST['doc'];
        if (is_dir($doc)){
            rmdir($doc);
        } else {
            unlink($doc);
        }
        header('location: explorateur.php');
    }
}
/**  FIN DELETE **/


/**  DEBUT UPLOAD **/
if (isset($_POST['upload'])){
    $fichier = $_FILES['file']['name'];
    $taille_max = 2097152;
    $taille = filesize($_FILES['file']['tmp_name']);
    $extensions = ['.png','.jpg','.jpeg'];
    $extension = strrchr($fichier, '.');

    if (!in_array($extension, $extensions)){
        $error = '<div class="alert">Vous devez uploader un fichier de type </div>';
    }
    if ($taille > $taille_max){
        $error = '<div class="alert">Fichier trop volumineux ...</div>';
    }
    if (!isset($error)){
        $fichier = preg_replace('/([^.a-z0-9]+)/', '.', $fichier);
        move_uploaded_file($_FILES['file']['tmp_name'], "upload/".$fichier);
        header('location: explorateur.php');
    } else {
        echo $error;
    }
}
/**  FIN UPLOAD **/



/**  DEBUT DOWNLOAD **/
if (isset($_POST['download'])){
    $dir = $_POST['docD'];
    if(is_dir($dir)) {
        $zip_file = $_POST['docD'].'.zip';
        // Get real path for our folder
        $rootPath = realpath($dir);
        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }
        // Zip archive will be created only after closing object
        $zip->close();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($zip_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        readfile($zip_file);
    }
    else if(is_file($dir)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($dir));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($dir));
        ob_clean();
        ob_end_flush();
        readfile($dir);
    }
}
header('location: explorateur.php');
/**  FIN DOWNLOAD **/

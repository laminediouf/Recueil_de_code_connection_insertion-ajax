<?php
include('filtrage/auth_filter.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <title>Explorateur de fichiers en PHP</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="fd"></div>
    <header>
        <?php
        $url = "../";
        if (isset($_GET['dossier'])) {
            $dossier = ($_GET['dossier']);
            $url = $url.$dossier;
        }
        $dirs = scandir($url);
        foreach($dirs as $dir) {
            if (is_dir($url . $dir)) {
                if ($dir == "..") {
                    if (isset($_GET['dossier'])) {
                        ?>
                        <a href="explorateur.php?dossier=<?php echo $dossier . $dir; ?>/" title="Back">
                            <i class="fas fa-angle-double-left fa-lg"></i>
                        </a>
                    <?php }
                }
            }
        }
        ?>
        <a href="explorateur.php" title="home"><i class="fas fa-home fa-lg"></i></a>
        <a href="" title="Refresh"><i class="fas fa-sync-alt fa-spin fa-lg"></i></a>
        <a href="#" id="upload" title="Upload"><i class="fas fa-cloud-upload-alt fa-lg"></i></a>
        <a href="#" id="download" title="Download"><i class="fas fa-cloud-download-alt fa-lg"></i></a>
        <a href="#" id="createFolder" title="New Folder">+<i class="fas fa-folder fa-lg"></i></a>
        <a href="#" id="copy" title="Copy"><i class="fas fa-copy fa-lg"></i></a>
        <!-- <a href="#"><i class="fas fa-paste fa-lg"></i></a> -->
        <a href="#" id="sup" title="Delete"><i class="fas fa-trash-alt fa-lg"></i></a>
        <a href="#" id="infos" title="Infos"><i class="fas fa-info-circle fa-spin fa-lg"></i></a>
        <a href="logout.php" title="Sign-Out"><i class="fas fa-sign-out-alt fa-lg"></i></a>
    </header>

    <aside>
        <div>
            <?php include "alldoc.php" ?>
        </div>
    </aside>

    <section id="ajax">
        <div>
            <?php include "traitement.php" ?>
        </div>
    </section>

    <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <h1>Que Voulez-vous supprimer</h1>
            <form action="traitement2.php" method="post">
                <label for="">Dossier ou Fichier</label>
                <input type="text" placeholder="Nom du dossier ou du fichier" class="txt" name="doc" id="doc"><br><br>
                <input type="submit" value="Supprimer" class="btn" name="delete" id="delete">
            </form>
        </div>
    </div>

    <div class="bg-modal1">
        <div class="modal-content1">
            <div class="close1">+</div>
            <h1>Upload de fichier</h1>
            <form action="traitement2.php" method="post" enctype="multipart/form-data">
                <label for="">Dossier ou Fichier</label>
                <input type="file" name="file" id="file"><br><br>
                <input type="submit" value="Uploader" class="btn" name="upload" id="upload">
            </form>
        </div>
    </div>

    <div class="bg-modal2">
        <div class="modal-content2">
            <div class="close2">+</div>
            <h1>Copier un dossier ou un fichier</h1>
            <form action="traitement2.php" method="post">
                <input type="text" placeholder="Nom du fichier a copier" class="txt" name="doc1"><br><br>
                <input type="text" placeholder="Nom du nouveau fichier" class="txt" name="doc2"><br><br>
                <input type="submit" value="Copier" class="btn" name="copy" id="copy">
            </form>
        </div>
    </div>

    <div class="bg-modal3">
        <div class="modal-content3">
            <div class="close3">+</div>
            <h1>Creation de dossier</h1>
            <form action="traitement2.php" method="post">
                <label for="">Création de Dossier</label>
                <input type="text" placeholder="Nom du dossier" class="txt" name="doc"><br><br>
                <input type="submit" value="Creation" class="btn" name="createDoc">
            </form>
            <form action="traitement2.php" method="post">
                <label for="">Création de Fichier</label>
                <input type="text" placeholder="Nom du fichier" class="txt" name="fic"><br><br>
                <input type="submit" value="Creation" class="btn" name="createFic">
            </form>
        </div>
    </div>

    <div class="bg-modal4">
        <div class="modal-content4">
            <div class="close4">+</div>
            <h1>Téléchargement</h1>
            <form action="traitement2.php" method="post">
                <label for="">Dossier ou Fichier</label>
                <input type="text" placeholder="Nom du dossier ou du fichier" class="txt" name="docD"><br><br>
                <input type="submit" value="Download" class="btn" name="download">
            </form>
        </div>
    </div>

    <div class="bg-modal5">
        <div class="modal-content5">
            <div class="close5">+</div>
            <h1>Information</h1>
            <form class="infos">
                <p><b>Upload: </b>Quand vous faites un upload, le fichier uploader va se trouver dans le dossier <b>Explorateur</b></p>
                <p><b>Download: </b>Quand vous faites un download, si le fichier ou le dossier se trouve dans <b>Explorateur</b> on écrit directement le nom du fichier ou du dossier. Au cas contraire on met <b>../nom_du_dossier</b> pour télécharger en dehors de <b>Explorateur</b></p>
                <p>C'est la même méthode pour les autres fonctionnalités, faut juste précisé le chemin</p>
                <p>Exemple: <b>../bootstrap</b> quand on sort du dossier Explorateur</p>
                <p>Exemple: <b>css/main.css</b> quand on est dans le dossier Explorateur</p>
            </form>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
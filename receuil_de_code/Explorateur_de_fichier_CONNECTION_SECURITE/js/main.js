$(document).ready(function() {
    $(document).on("click", "div a", function(e) {
        e.preventDefault();
        var adresse = $(this).attr("href").split("?");
        var dossier = adresse[1];
        $.ajax({
            method: "GET",
            data: dossier,
            url: "traitement.php",
            success: function(data) {
                $("#ajax").html(data);
            }
        });
    });
});

document.getElementById('sup').addEventListener('click', function () {
    document.querySelector('.bg-modal').style.display = 'flex';
});
document.querySelector('.close').addEventListener('click', function () {
    document.querySelector('.bg-modal').style.display = 'none';
});

document.getElementById('upload').addEventListener('click', function () {
    document.querySelector('.bg-modal1').style.display = 'flex';
});
document.querySelector('.close1').addEventListener('click', function () {
    document.querySelector('.bg-modal1').style.display = 'none';
});

document.getElementById('copy').addEventListener('click', function () {
    document.querySelector('.bg-modal2').style.display = 'flex';
});
document.querySelector('.close2').addEventListener('click', function () {
    document.querySelector('.bg-modal2').style.display = 'none';
});

document.getElementById('createFolder').addEventListener('click', function () {
    document.querySelector('.bg-modal3').style.display = 'flex';
});
document.querySelector('.close3').addEventListener('click', function () {
    document.querySelector('.bg-modal3').style.display = 'none';
});

document.getElementById('download').addEventListener('click', function () {
    document.querySelector('.bg-modal4').style.display = 'flex';
});
document.querySelector('.close4').addEventListener('click', function () {
    document.querySelector('.bg-modal4').style.display = 'none';
});

document.getElementById('infos').addEventListener('click', function () {
    document.querySelector('.bg-modal5').style.display = 'flex';
});
document.querySelector('.close5').addEventListener('click', function () {
    document.querySelector('.bg-modal5').style.display = 'none';
});
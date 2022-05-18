document.body.onload = function() {
    fetch('../../controler/json/utilisateurEnCoursDeSession.php', {
            method: "GET",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        }).then(response => response.json())
        .then(function(donneesUtilisateur) {
            let prenom = document.getElementById('prenom');
            let nom = document.getElementById('nom');
            let email = document.getElementById('email');

            prenom.value = donneesUtilisateur.Prenom;
            nom.value = donneesUtilisateur.Nom;
            email.value = donneesUtilisateur.Mail;

        })
}
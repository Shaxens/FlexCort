function test() {
    const getPhp = "../../model/entityManager/ModeleManager.php"

    fetch(getPhp, {
        method: "GET",
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
    var result = "<?php getAllModele(); ?>";
    alert(result);
    return false;
}
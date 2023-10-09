<?php
    require_once "../_Varios.php";

    $conexionBD = obtenerPdoConexionBD();

    $personaId = $_REQUEST['id'] ?? null;
    if ($personaId == null || trim($personaId) == "") { redireccionar("./PersonasIndex.php?"); }

    $recoveredStar = $conexionBD->prepare("SELECT estrella FROM persona WHERE id = ?");
    $recoveredStar->execute([trim($personaId)]);
    $star = $recoveredStar->fetch(PDO::FETCH_ASSOC)['estrella'];

    $star = ($star == 0) ? 1 : 0;

    $conexionBD->prepare("UPDATE persona SET estrella = ? WHERE id = ?")->execute([$star, trim($personaId)]);

    redireccionar("PersonasIndex.php");
?>

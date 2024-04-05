<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
/**
 * Ejecutar la petición y guardar el resultado
 */
$result = curl_exec($ch);
$data = json_decode($result, true);

if ($result == false) {
    echo "Error de solicitud " . curl_error($ch);
} else {
    curl_close($ch);
}


?>

<head>
    <meta charset="utf-8">

    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
    <section style="text-align: center;">
        <h2>Proxima proxima película</h2>

        <img src="<?= $data["poster_url"] ?>" alt="Poster de  " width="300" style="border-radius: 25px;">
    </section>

    <hgroup>
        <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno : <?= $data["release_date"] ?></p>
        <p>La siguiente es : <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>


<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;

        place-content: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
</style>
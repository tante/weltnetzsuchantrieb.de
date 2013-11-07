<html>
<head>
<title>Weltnetzsuchantrieb</title></head>
<body>
<br>
<br>
<form method="GET">
    Suche    <input type="text" name="Suche" />
</form>
<?php
if(isset($_REQUEST['Suche'])){
    print("Suchbegriff: ".$_REQUEST['Suche']);
    $url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&lr=lang_de&cr=countryDE&rsz=8&q=".urlencode($_REQUEST['Suche']);

    //Anfrage senden 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, "Weltnetzsuchantrieb.de");
    $inhalte = curl_exec($ch);
    curl_close($ch);

    $ergebnisse = json_decode($inhalte);

    print_r($ergebnisse);
}
?>
</body>
</html>

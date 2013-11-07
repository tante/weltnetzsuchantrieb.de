<html>
<head>
<title>Weltnetzsuchantrieb</title></head>
<link href="style.css" rel="stylesheet" type="text/css">
<body>
<div id="distance"></div>
<div id="logo"><img src="assets/logo.png" alt="logo"/>
<form method="GET">
    <input id="suchfeld" type="text" name="Suche" /> 
    <input id="abschicken" type="submit" name="suchen" value="suchen"/>
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
}

foreach($ergebnisse->responseData->results as $eintrag){
    print("Ergebnis :".$eintrag->visibleUrl);
    print("<br>");
}

?>
<div id="footer">Kontakt: <a href="http://twitter.com">@tante</a>, <a href="http://tante.cc/imprintimpressum/">Impressum</a>, <a href="https://github.com/tante/weltnetzsuchantrieb.de">Code</a>
</body>
</html>

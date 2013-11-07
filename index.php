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
if isset($_REQUEST['Suche']){
    print("Suchbegriff: ".$_REQUEST['Suche']);

}
?>
</body>
</html>

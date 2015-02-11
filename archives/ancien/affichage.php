
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Concours de piano Ecole Polytechnique</title>
<link type="text/css" href="index.css" rel="stylesheet" title="index" />
</head>

<?php
// On traite les arguments
// par defaut on affiche la page d accueil
$title = "accueil";
if (isset($_GET['title'])) $title = $_GET['title'];
// francais langue par dŽfaut
$lang = "fr";
if (isset($_GET['lang'])) $lang = $_GET['lang'];
?>

<body>

<div class="contenu">
<?php
$pageContenu = $title."_contenu_$lang.html";
if (file_exists($pageContenu)) include ($pageContenu);
else print("Page introuvable");
?>

</div>
</div>
</body>
</html>

?>

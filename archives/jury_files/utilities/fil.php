<?php
function chargeFichier($fichier) {
    $xml=simplexml_load_file($fichier);
    return $xml;
}

function afficheFichier($xml) {
    foreach($xml->channel->item as $item) {
        if (time() - $item->time < $xml->channel->ttl*60  ) {
        echo"<div class=tout><b><a href=$item->link>
        $item->title</a></b><br>";
        echo"$item->description<br>";
        echo"<i>$item->pubDate</i><br><br></div>";
        }
    }

}

function ajouteNews($xml, $title, $date, $link, $description) {
    $child= $xml->channel->addChild('item');
    $child->addChild('title', $title);
    $child->addChild('pubDate', date(DATE_RFC822, $date));
    $child->addChild('time',time());
    $child->addChild('link', $link);
    $child->addChild('description', $description);
return $xml;
}

function sauveFichier($fichier,$xml) {
    $file = fopen($fichier, "w");
    fprintf($file, $xml->asXML());
}
?>

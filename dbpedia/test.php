<?php
/* Include ARC2 classes. */
include_once("arc/ARC2.php");

/* Configure the app to use DBPedia. */
$dbpconfig = array(
  "remote_store_endpoint" => "http://dbpedia.org/sparql",
);

/* Create the 'remote store' */
$dbpedia = ARC2::getRemoteStore($dbpconfig);

/* Configure the app to use DBTune. */
$dbtconfig = array(
  "remote_store_endpoint" => "http://dbtune.org/musicbrainz/sparql",
);

/* Create the 'remote store' */
$dbtune = ARC2::getRemoteStore($dbtconfig);

/* Let's start with some genre (Art rock). */
$genre = "Art_rock";
if ($_GET['genre']) {
  $genre = $_GET['genre'];
}
$uri = "http://dbpedia.org/resource/$genre";

/* Let's query DBPedia for some genre info. */
$q = "
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
PREFIX dbpprop: <http://dbpedia.org/property/>
PREFIX foaf: <http://xmlns.com/foaf/0.1/>
SELECT ?name ?popularity ?abstract ?wikipedia
WHERE
 { <$uri> rdfs:label ?name ;
          rdfs:comment ?abstract ;
          foaf:page ?wikipedia .
   OPTIONAL { <$uri> dbpprop:popularity ?popularity . }
   FILTER ( langMatches(lang(?name), \"EN\") &&
            langMatches(lang(?abstract), \"EN\") ) }
";
$genre = $dbpedia->query($q, 'row');

/* Let's also grab related genres. */
$q = "
PREFIX dbpedia-owl-musicgenre: <http://dbpedia.org/ontology/MusicGenre/>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT DISTINCT ?genre ?genreuri
WHERE
 { <$uri> dbpedia-owl-musicgenre:musicSubgenre ?genreuri .
   ?genreuri rdfs:label ?genre . 
   FILTER ( langMatches(lang(?genre), \"EN\") ) }
";
$subgenres = $dbpedia->query($q, 'rows');

$q = "
PREFIX dbpedia-owl-musicgenre: <http://dbpedia.org/ontology/MusicGenre/>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT DISTINCT ?genre ?genreuri
WHERE
 { <$uri> dbpedia-owl-musicgenre:stylisticOrigin ?genreuri .
   ?genreuri rdfs:label ?genre . 
   FILTER ( langMatches(lang(?genre), \"EN\") ) }
";
$stylisticOrigins = $dbpedia->query($q, 'rows');

$q = "
PREFIX dbpedia-owl-musicgenre: <http://dbpedia.org/ontology/MusicGenre/>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT DISTINCT ?genre ?genreuri
WHERE
 { ?genreuri dbpedia-owl-musicgenre:musicSubgenre <$uri> ;
             rdfs:label ?genre . 
   FILTER ( langMatches(lang(?genre), \"EN\") ) }
";
$parentGenres = $dbpedia->query($q, 'rows');

$q = "
PREFIX dbpedia-owl-musicgenre: <http://dbpedia.org/ontology/MusicGenre/>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
SELECT DISTINCT ?genre ?genreuri
WHERE
 { ?genreuri dbpedia-owl-musicgenre:stylisticOrigin <$uri> ;
             rdfs:label ?genre . 
   FILTER ( langMatches(lang(?genre), \"EN\") ) }
";
$stylisticChildren = $dbpedia->query($q, 'rows');

/* Now, we finally grab artists. */
$q = "
PREFIX dbpedia-owl-artist: <http://dbpedia.org/ontology/Artist/>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX dbpprop: <http://dbpedia.org/property/>
SELECT DISTINCT ?artist ?artisturi ?yearsActive
WHERE
 { ?artisturi dbpedia-owl-artist:genre <$uri> ;
              rdfs:label ?artist .
   OPTIONAL { ?artisturi dbpprop:yearsActive ?yearsActive . }
   FILTER ( langMatches(lang(?artist), \"EN\") ) }

";
$artists = $dbpedia->query($q, 'rows');

/* But we need to do some legwork to get the number of albums, since
 we don't have a sameAs link back to DBTune. We use sameAs.org to go
 backwards. */
$newArtists = array();
foreach ($artists as $key => $artist) {
  $sameAsURI = "http://sameas.org/rdf?uri=" . urlencode($artist['artisturi']);
  $parser = ARC2::getRDFXMLParser();
  $parser->parse($sameAsURI);
  $triples = $parser->getTriples();
  $dbturi = '';
  foreach ($triples as $triple) {
    if (substr($triple['o'], 0, 46) == 'http://dbtune.org/musicbrainz/resource/artist/') {
      $dbturi = $triple['o'];
      break;
    }
  }
  $newArtists[$key] = $artist;
  $newArtists[$key]['artisturi'] = $dbturi;
  print_r($newArtists[$key]);
  if ($dbturi != '') {
    /* Now that we have the DBTune URI, we can query it for the number
     of albums. */
    $q = "
PREFIX foaf: <http://xmlns.com/foaf/0.1/>
PREFIX mo: <http://purl.org/ontology/mo/>
SELECT ?album
WHERE
 { ?album a mo:Record ;
          foaf:maker <$dbturi> . }";
    $dbtArtist = $dbtune->query($q, 'rows');
    $newArtists[$key]['albums'] = count($dbtArtist);
  } else {
    $newArtists[$key]['artisturi'] = '';
    $newArtists[$key]['albums'] = '';
  }
}
$artists = $newArtists;

?>
<html>
<head>
<title>Genre: <?=$genre['name']?></title>
</head>
<body>
<h1><?=$genre['name']?></h1>
<p>Popularity: <?=$genre['popularity']?></p>
<p>Supergenres: <?php foreach ($parentGenres as $genre) { print "<a href=\"genre.php?genre=" . substr($genre['genreuri'], 28) . "\">" . $genre['genre'] . "</a>"; } ?></p>
<p>Stylistic Origins: <?php foreach ($stylisticOrigins as $genre) { print "<a href=\"genre.php?genre=" . substr($genre['genreuri'], 28) . "\">" . $genre['genre'] . "</a>"; } ?></p>
<p>Subgenres: <?php foreach ($subgenres as $genre) { print "<a href=\"genre.php?genre=" . substr($genre['genreuri'], 28) . "\">" . $genre['genre'] . "</a>"; } ?></p>
<p>Stylistic Children: <?php foreach ($stylisticChildren as $genre) { print "<a href=\"genre.php?genre=" . substr($genre['genreuri'], 28) . "\">" . $genre['genre'] . "</a>"; } ?></p>
<p><?=$genre['abstract']?></p>
<table>
<thead>
<tr>
<th>Artist</th>
<th>Years Active</th>
<th>Number of Records</th>
</tr>
</thead>
<tbody>
<?php
foreach ($artists as $artist) {
?>
<tr>
<td><a href="<?='music.php?mbid=' . substr($artist['artisturi'], 46)?>"><?=$artist['artist']?></a></td>
<td><?=$artist['yearsActive']?></td>
<td><?=$artist['albums']?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</body>
</html> 
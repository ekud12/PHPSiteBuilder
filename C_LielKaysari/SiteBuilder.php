<?php
include("includes/template.php");

$data = json_decode($_POST["data"],true);
$PageNamesArray = array("index.html","Site1.html","Site2.html","Site3.html","Site4.html","Site5.html");

// Start with creating the main page
$Indexfile = @fopen("../D_LielKaysari/Sites/".$PageNamesArray[0], w) or die("Can't open file");
$FormattedIndexPage = sprintf($MainPageTemplate,$data["clientName"],$data["Site1Name"],$data["Site2Name"],$data["Site3Name"],$data["Site4Name"],$data["Site5Name"]);
fwrite($Indexfile,$FormattedIndexPage);


// Loop for creating the 5 sites pages
    
for($i = 1; $i<count($PageNamesArray); $i++) {
    $Site1File = @fopen("../D_LielKaysari/Sites/".$PageNamesArray[$i],w) or die ("Can't open the file");
    $FormattedSite1Page = sprintf($SitePageTemplate,$data["Site".$i."Name"],$data["Site".$i."PhotoUpload"],$data["Site".$i."Description"]);
    fwrite($Site1File,$FormattedSite1Page);
}     
?>

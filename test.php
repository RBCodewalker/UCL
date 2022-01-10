<html>
​<head>
 ​    ​<title>IP and Location</title>
 ​    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
  
<body>
 ​    <script src = "https://code.jquery.com/jquery-3.6.0.js"></script>
     <script src = "https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  
 ​    <div​ ​class = "main-content">
  
 ​        ​<div class = "container-fluid mb-5 mt-5 centerr">
 ​            <h3> Current Location according to your Public IP Address </h3>
  
 ​            <div class = "info">This website uses <a href = "​http://ipinfo.io/">ipinfo </a> to get IP details and location and ​<a href = "​https://www.openstreetmap.org/"> openstreetmap</a> for displaying map. Please check their Terms of Service and Privacy Policy.
 ​                <br>This is not that accurate as using location/GPS tracking which we are not doing on this website.
 ​                <p><strong>Note:</strong> that you might have to turn adBlock off for it to work</p>
 ​            </div>
 ​            <div class = "ipinfo" id ="map">
 ​            </div>
 ​            <div id = "mapview" style ="height:70vh;">
 ​                loading...
 ​            </div>
 ​        </div>
  
  
 ​    </div>
  
  
 ​    <script src = "​https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  
 ​    <script>
 ​        $(document).ready(() => ​{
  
 ​            ​var​ ​elem​ ​=​ $(​'​#map​'​);
  
  
 ​            $.​ajax​({
 ​                ​url​: ​"​http://ipinfo.io/?token=dbbde0098487bc​"​,
 ​                ​method​: ​"​GET​"​,
 ​                ​dataType​: ​"​json​"​,
 ​                ​success​: (​data​) ​=>​ {
  
 ​                    ​console​.​log​(​data​);
 ​                    ​var​ ​loc​ ​=​ ​data​.​loc​.​split​(​"​,​"​)
 ​                    ​elem​.​html​(​"​IP : ​"​ ​+​ ​data​.​ip​ ​+​ ​"​<br> Region: ​"​ ​+​ ​data​.​region​);
  
 ​                    ​var​ ​map​ ​=​ ​L​.​map​(​'​mapview​'​)​.​setView​([​loc​[​0​], ​loc​[​1​]], ​13​);
 ​                    ​//​Used to load and display tile layers on the map
 ​                    ​//​https://docs.eegeo.com/eegeo.js/v0.1.500/docs/leaflet/L.TileLayer 
 ​                    ​L​.​tileLayer​(​'​https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png​'​, {
 ​                        ​attribution​: ​'​&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors​'
 ​                    })​.​addTo​(​map​);
  
 ​                    ​L​.​marker​([​loc​[​0​], ​loc​[​1​]])​.​addTo​(​map​)
 ​                        ​.​bindPopup​(​'​IP ADDRESS: ​'​ ​+​ ​data​.​ip​ ​+​ ​"​<br> Region: ​"​ ​+​ ​data​.​region​ ​+​ ​"​<br>Location: ​"​ ​+​ ​data​.​loc​)
 ​                        ​.​openPopup​();
 ​                },
  
 ​                ​error​: () ​=>​ {
 ​                    $(​"​#mapview​"​)​.​html​(​"​Fetching info failed.​"​);
  
 ​                }
 ​            })
 ​        ​}​);
 ​    </script>
  
</body>
  
</html>
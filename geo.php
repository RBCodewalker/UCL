<!DOCTYPE html>
<html>
<head>
  <meta name = "viewport", content="width = device-width, initial-scale=1">
  <title> UCL </title>
  
  <link rel="stylesheet" href="leaflet.css" />
  <script src="leaflet.js"></script>
  
  <link rel = "stylesheet" href = "ucl.css"> 
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family
  =Noto+Sans+Mono:wght@100;300;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <script src = "https://code.jquery.com/jquery-3.6.0.js"></script>
     <script src = "https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

  <section class="background">
      <nav>
        <a href = "https://www.uefa.com/uefachampionsleague/"> 
        <img src = "img/u.png" alt = "logo"></a>
        <div class = "links">
          <ul>
            <li><a href ="ucl.html"> HOME </a></li>
            <li><a href ="login.php"> MAINTENANCE </a></li>
            <li><a href =""> MATCHES </a></li>
            <li><a href =""> PLAYERS </a></li>
            <li><a href =""> TEAMS </a></li>
            <li><a href =""> GROUPS </a></li>
            <li><a href ="geo.php"> LOCATION </a></li>
            <li><a href = "in.php">SEARCH</a></li>
            <li><a href = "imprint.html"> IMPRINT </a></li>
            </ul>
      </nav>
      <h2> FIND WHAT YOU ARE LOOKING FOR IN THE MAP </h2>
        <p> Note: All the IP information was parsed from <a href = "http://ipinfo.io">ipinfo</a><br />
          PRO TIP: If the map does not show up, try disabling your adblocker!</p>
      <div id="showmap">
      </div>
      
      <script>
        $(document).ready(() => 
        {
            var ref = $('#map');

            $.ajax({
                url: "https://ipinfo.io?token=9bf4e24b5670c9",
                method: "GET",
                dataType: "json",
                success: (data) =>
                {
                    console.log(data);
                    var loc = data.loc.split(",")
                    ref.html=("Your IP => " + data.ip + "<br> Your Region => " + data.region);
                    
                    var map = L.map('showmap').setView([loc[0], loc[1]], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                      }).addTo(map);

                    L.marker([loc[0], loc[1]]).addTo(map)
                    .bindPopup('Your IP was discovered as: ' + data.ip + "<br> Region: " + data.region + "<br>Location: " + data.loc)
                    .openPopup();
                },
                error: () =>
                {
                    $("#showmap").html("UNEXPECTED ERROR!!!");
                }
            })

        });
      </script>
  </section>
</body>
</html>
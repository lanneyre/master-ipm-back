<head>

  <style>
    /* Ajuster la taille de la carte */
    #map {
      height: 500px;
      width: 100%;
    }
  </style>
  <!-- Charger OpenStreetMap avec Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    // Fonction pour charger le fichier XML et afficher les marqueurs
    function initMap() {
      // Créer la carte centrée sur Londres
      var map = L.map('map').setView([51.5074, -0.1278], 6); // Centre à Londres

      // Ajouter le fond de carte OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
      
      // Charger le fichier XML avec AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "gps.xml", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var xmlDoc = xhr.responseXML;
          var utilisateurs = xmlDoc.getElementsByTagName("identite");
          
          // Tableau des lieux et coordonnées associés
          var lieux_coords = {
            "À la taverne Les Trois Balais": {lat: 52.9984, lng: -0.2485},
            "À Poudlard": {lat: 52.0000, lng: -2.0000},
            "Au magasin Weasley, Farces pour sorciers facétieux": {lat: 51.5223, lng: -0.1270},
            "À la maison": {lat: 51.397, lng: -0.687},
            "Chez Ollivander - Fabricants de baguettes magiques": {lat: 52.5074, lng: -0.1280},
            "À la banque Gringotts": {lat: 52.3, lng: -2.7},
            "À la Cabane hurlante": {lat: 52.3, lng: -2.7}
          };

          // Parcourir les identités et ajouter des marqueurs
          for (var i = 0; i < utilisateurs.length; i++) {
            var nom = utilisateurs[i].getElementsByTagName("nom")[0].childNodes[0].nodeValue;
            var lieu = utilisateurs[i].getElementsByTagName("lieu")[0].childNodes[0].nodeValue;
            var date = utilisateurs[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;

            if (lieux_coords[lieu]) {
              var coord = lieux_coords[lieu];
              var marker = L.marker([coord.lat, coord.lng]).addTo(map);
              var popupContent = "<strong id=\"map\">" + nom + "</strong><br>" +
                                 "Lieu : " + lieu + "<br>" +
                                 "Dernière mise à jour : " + date;
              marker.bindPopup(popupContent);
            }
          }
        }
      };
      xhr.send();
    }
  </script>
</head>


<body class="is-preload" onload="initMap()">

    <!-- Header -->
    <header id="header">
        <h1>Bonjour <?= htmlspecialchars($personnage) ?> !</h1>
        <p>Voici la position de tes enfants.</p>
    </header>

    <div class="topright">
        <ul class="icons">
            <li><a href="index.php" class="icon fa-user"><span class="label">Retour à la page de connexion</span> Retour à la page de connexion</a></li>
        </ul>
    </div>

  <div id="map"></div>

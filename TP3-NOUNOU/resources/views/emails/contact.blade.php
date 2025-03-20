<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
</head>

<body>
    <h2>Nouveau message de contact</h2>
    <p><strong>Nom :</strong> {{ $contact['name'] }}</p>
    <p><strong>Email :</strong> {{ $contact['email'] }}</p>
    <p><strong>Motif :</strong> {{ $contact['motif'] }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $contact['message'] }}</p>
</body>

</html>

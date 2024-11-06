<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('dossiers.store')}}" method="post">
        @csrf 
        @method('post')
        <p>Libele <input type="text" name="libele" required></p>
        <p>description <input type="text" name="description" required></p>
        <p>date <input type="date" name="date_dossier" required></p>
        <input type="hidden" name="conservateur_id" value="1">
        <input type="hidden" name="assujettie_id"  value="1">
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
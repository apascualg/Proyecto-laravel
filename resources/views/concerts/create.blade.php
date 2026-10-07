<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="{{route('concerts.store')}}" method="POST">
    @csrf
    <p>
        <label for="artista_id"> Artista: </label>
        <select name="artista_id" id="artista">
            @foreach ($artistes as $artista)
                <option value="{{ $artista->id }}">{{ $artista->nom }}</option>
            @endforeach
        </select>
    </p>
    <p>
        <label for="nom">Nombre:</label><br>
        <input type="text" name="nom" id="nom">
    </p>

    <p>
        <label for="data_hora">Data:</label><br>
        <input type="datetime-local" name="data_hora" id="data">
    </p>

    <p>
        <label for="durada_minuts">Durada:</label><br>
        <input type="number" name="durada_minuts" id="durada">
    </p>

    <p>
        <label for="tipus"> Tipus:</label>
        <select name="tipus" id="tipus">
            @foreach (['CONCERT', 'DJ_SET', 'SHOWCASE', 'ACUSTIC'] as $t)
                <option value="{{ $t }}">{{ $t }}</option>
            @endforeach
        </select>
    </p>

    <p>
        <button type="submit">Crear</button>
    </p>
</form>

</body>
</html>




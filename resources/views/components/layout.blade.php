<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fotokino.eu</title>
</head>
<body>
<div>
    <div>
        <h1>Fotokino.eu</h1>
    </div>
</div>
<div>
    <nav>
        <ul>
            <li>
                <a href="{{ route('photo-print') }}">Tisk fotografií</a>
            </li>
            <li>
                <a href="{{ route('canvas-print') }}">Tisk pláten</a>
            </li>
            <li>
                <a href="{{ route('bigformat-print') }}">Velkoformátový tisk</a>
            </li>
            <li>
                <a href="{{ route('others-print') }}">Tisk ostatní</a>
            </li>
            <li>
                <a href="{{ route('films-negatives') }}">Film & negativy</a>
            </li>

            <li>
                <a href="{{ route('goods') }}">Zboží</a>
            </li>

            <li><a href="{{ route('contact') }}">Kontakt</a></li>
        </ul>

    </nav>
</div>

<footer>

</footer>
</body>
</html>

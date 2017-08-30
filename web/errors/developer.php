<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>#Error-Console Developer</title>
</head>
<body>
    <h1>#error -> Fehlermeldungen</h1>
    <p>Fehlercode: <?=$errno;?></p>
    <p>Fehlerbeschreibung: <?=$errstr;?></p>
    <p>Fehlerhafte Datei: <?=$errfile;?></p>
    <p>Fehlerhafte Zeile: <?=$errline;?></p>
</body>
</html>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>SFU Friend Finder</title>
        <style>
        </style>
        <script defer>
        </script>
    </head>
    <body>
        <?php
            if (isset($department) && isset($number) && isset($description)) {
                echo $department.' - ';
                echo $number.' - ';
                echo $description;
                if (isset($students)) {
                    echo "<p>Students:</p>";
                    for ($i = 0; $i < count($students); ++$i) {
                        echo "<a href=users/{$students[$i]->id}> {$students[$i]->name} - {$students[$i]->email}</a> </br>";
                    }
                }
            } else {
                echo "Course not found.";
            }
        ?>
    </body>
</html>

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
            } else {
                echo "Course not found.";
            }
        ?>
    </body>
</html>

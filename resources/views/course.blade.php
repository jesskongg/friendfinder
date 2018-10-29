<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>SFU Friend Finder</title>
        <style>
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script defer>
            function func()
            {
                $("#result").empty();
                let interest = $('#interest')[0].value;
                let department = "<?php echo $department ?>";
                let number = "<?php echo $number ?>";
                $.ajax({
                    type: 'GET',
                    url: '/course/filterByInterest',
                    data: {
                        interest,
                        department,
                        number,                     
                    },
                    success: result => {
                        for (let user of result.data) {
                            $("#result").append(`<p>${user.name} - ${user.email}</p>`);
                        }
                    },
                    error: result => console.log(data),
                })
                return false
            }
        </script>
    </head>
    <body>
        <?php if (isset($department) && isset($number) && isset($description)) : ?>
        <?php
                echo $department.' - ';
                echo $number.' - ';
                echo $description;
                if (isset($students)) {
                    echo "<p>Students:</p>";
                    for ($i = 0; $i < count($students); ++$i) {
                        echo "<a href=/users/{$students[$i]->id}> {$students[$i]->name} - {$students[$i]->email}</a> </br>";
                    }
                }            
        ?>
        <div>
            <br/>Interest: <input id='interest' type='text' name='interest' value='' oninput="return func()">
        </div>        
        <?php else : ?>
        <?php 
            echo "Course not found.";
        ?>
        <?php
            endif;
        ?>
        <div id="result">
        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form method="GET" action="/users/search">
            <input type="text" name="name">
            <button type="submit">Search</button>
        </form>
        <?php
            if (isset($users)) {
                foreach ($users as $user) {
                    echo "<p> {$user->name} - {$user->email}";
                }
            }
        ?>
    </body>
</html>



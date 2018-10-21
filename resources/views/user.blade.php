<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <strong>Filter</strong>
        <form method="GET" action="/users">
            <div>
                <?php
                    echo "Name: <input type='text' name='name' value={$name}>";
                ?>
            </div>
            <div>
                <?php
                    echo "Email: <input type='text' name='email' value={$email}>";
                ?>
            </div>
            <button type="submit">Search</button>
        </form>
        <?php
            if (isset($users)) {
                echo "<p><strong> Results: </strong><p>";
                foreach ($users as $user) {
                    echo "<p> {$user->name} - {$user->email}";
                }
            }
        ?>
    </body>
</html>



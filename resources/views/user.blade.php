<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function getResult() {
                $("#result").empty()
                let name = $('#name')[0].value
                let email = $('#email')[0].value
                $.ajax({
                    type: 'GET',
                    url: '/filter',
                    data: {
                        name,
                        email,
                    },
                    success: result => {
                        for (let user of result.data) {
                            $("#result").append(`<p>${user.name} - ${user.email}</p>`)
                        }
                    },
                    error: result => console.log(data),
                })
                return false
            }
        </script>
    </head>
    <body>
        <strong>Filter</strong>
        <form method="get" onsubmit="return getResult()">
            <div>
                Name: <input id='name' type='text' name='name' value=''>
            </div>
            <div>
                Email: <input id='email' type='text' name='email' value=''>
            </div>
            <input type="submit" value="Search"/>
        </form>
        <div id="result">
        </div>
    </body>
</html>



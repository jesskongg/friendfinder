


@extends('layouts.app')

@section('scripts')
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

@section('content')
<?php
    if (isset($department) && isset($number) && isset($description)) {
        echo $department.' - ';
        echo $number.' - ';
        echo $description;
        if (isset($students)) {
            echo "<p>Students:</p>";
            for ($i = 0; $i < count($students); ++$i) {
                echo "<a href=/users/{$students[$i]->id}> {$students[$i]->name} - {$students[$i]->email}</a> </br>";
            }
        }
    } else {
        echo "Course not found.";
    }
?>
    <div id="result">
    </div>
@endsection()
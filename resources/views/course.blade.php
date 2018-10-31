@extends('layouts.app')

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script defer>
    $(document).ready(function(){
        $("#button").click(function(){
            // Clear a student list
            $("#result").empty();
            let students = <?php echo json_encode($students) ?>;

            // Parse selected interets
            let interests = [];
            $(":checkbox:checked").each(function(i){
                interests[i] = $(this).val();
            });
            let others = $("#others").val();
            if (others != null && others != "")
            {
                // Check if it is already in the interests table. If not, insert it into the table
                // need to call another controller                 
                interests.push(others);
            }
            if (interests.length == 0)
            {
                // Print all students
                for (let i = 0; i < students.length; i++)
                {
                    $("#result").append(`<a href=/users/${students[i].id}> ${students[i].name} - ${students[i].email}</a> </br>`);
                }
            }
            else
            {
                $.ajax({
                    type: 'GET',
                    url: '/course/filterByInterest',
                    data: {
                        interests,                    
                    },
                    success: result => {                        
                        for (let user of result.data) {
                            // From a Kyle's lesson: Use HASH MAP
                            for (let i = 0; i < students.length; i++)
                            {
                                if (user.id == students[i].id){
                                    $("#result").append(`<a href=/users/${user.id}> ${user.name} - ${user.email}</a> </br>`);
                                }
                            }
                        }
                    },
                    error: result => console.log(data),
                })
            }
        });
    });    
</script>

@section('content')

<?php if (isset($department) && isset($number) && isset($description)): ?>
    <?php
        echo $department.' - ';
        echo $number.' - ';
        echo $description;
    ?>
    <?php if (isset($students)): ?>
        <form>
            <fieldset>
                <legend>Filters</legend>
                <div>
                    <?php
                        // Currently, the page lists all interest types from DB, but later we can modify it to only list interests of the current user 
                        for ($i = 0; $i < count($interests); $i++)
                        {
                            echo "<input type='checkbox' value='{$interests[$i]->type}'>{$interests[$i]->type}<br/>";
                        }
                    ?>
                    Others: <input id="others" type="textbox" name="others" value=""><br/>
                    <input type="button" id="button" value="Search">                  
                </div>
            </fieldset>
        </form>
        <div id="result">
            <?php
                for ($i = 0; $i < count($students); ++$i) 
                {
                    echo "<a href=/users/{$students[$i]->id}> {$students[$i]->name} - {$students[$i]->email}</a> </br>";
                }
            ?>
    <?php endif; ?>
<?php else: ?>
    <h1>Course not found</h1>
<?php endif; ?>

@endsection()
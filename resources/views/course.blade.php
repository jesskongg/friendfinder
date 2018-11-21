@extends('layouts.app')

@section('styles')
<style>
    .filter {
        margin-bottom: 50px;
    }
    .avatar {
        width: 50px;
        height: 50px;
        vertical-align: middle;
    }
</style>

@section('scripts')
<script defer>
    $(document).ready(function(){
        $("#button").click(function(){
            // Clear a student list
            $("#result").empty();
            let students = <?php
                if (isset($students)){
                    echo json_encode($students);
                }
            ?>;

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
@endsection()

@section('content')
<?php if (isset($department) && isset($number) && isset($description)): ?>
    <?php
        echo "<h3>";
        echo strtoupper($department).' ';
        echo $number.' - ';
        echo $description;
        echo "</h3>";
    ?>
    <br>
    <?php if (isset($students)): ?>
        <div class="collapse show" id="filter">
            <form>
                <h5>Filter users enrolled in this course by interest</h5>
                <?php
                    for ($i = 0; $i < count($interests); $i++){
                        echo "<input type='checkbox' value='{$interests[$i]->type}'> {$interests[$i]->type}<br/>";
                    }
                ?>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="major">Others</label>
                        <input class="form-control" id="others" type="textbox" name="others" value=""><br/>
                        <input class="btn btn-success" type="button" id="button" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <button class="filter btn btn-primary" type="button" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter">
            Toggle Filter
        </button>
        <h4>Students</h4>
        <div id="result">
            <?php
                for ($i = 0; $i < count($students); ++$i)
                {
                    echo "<img src='/icon/user.png' class='avatar'>";
                    echo "<a href=/users/{$students[$i]->id}> {$students[$i]->name} - {$students[$i]->email}</a> </br>";
                }
            ?>
        </div>
        <!-- <br><h5>Recommending</h5> -->
        <div id="recommend">
            <?php
                if($recommendFriends != null)
                {
                    for($i = 0; $i < count($recommendFriends); $i++)
                    {
                        if(Auth::id() != $recommendFriends[$i]->id)
                        {
                            echo "<img src='/icon/user.png' class='avatar'>";
                            echo "<a href=/users/{$recommendFriends[$i]->id}> {$recommendFriends[$i]->name} - {$recommendFriends[$i]->email}</a> </br>";
                        }
                    }
                }
            ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <h1>Course not found</h1>
<?php endif; ?>
@endsection()

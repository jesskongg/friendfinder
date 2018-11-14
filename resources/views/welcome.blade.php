@extends('layouts.app')

@section('styles')
    <style>
        .search_center {
            position:absolute;
            top:40%;
            left:50%;
            height: 50px;
            width: 300px;
            transform: translate(-50%, -50%);
            font-size: 25px;
        }
    </style>
@endsection()

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
<script defer>
    window.onload = function() {
        // adapted from: https://stackoverflow.com/questions/15097563/limit-total-entries-displayed-by-datalist
        var search = document.getElementById('search')
        var results = document.getElementById('courses')
        // WARNING: template tag's id seem to be affected after using section
        // var templateContent = document.getElementById("coursestemplate").content
        var templateContent = document.getElementById('app').childNodes[0]
        search.addEventListener('keyup', e => {
            var input = new RegExp(search.value.trim(), 'i')
            var options = templateContent.cloneNode(true)
            var all = ""
            let frag = document.createDocumentFragment()
            results.innerHTML = ''
            for (let i = 1; i < options.childNodes.length; ++i) {
                if (frag.children.length > 6) break
                if (input.test(options.childNodes[i].value)) {
                    frag.appendChild(options.childNodes[i])
                }
            }
            results.appendChild(frag)
        });

        // What is this doing?
        // Search for the course only if there is a input in the search bar.
        search.addEventListener('input', e => {
            if (e.inputType === null || e.inputType === undefined) {
                redirectCourse(e.target.value)
            }
        })

        function redirectCourse (text) {
            let courseInfo = text.split(' ')
            let department = courseInfo[0].toLowerCase()
            let number = courseInfo[1].toLowerCase()
            let form = document.createElement('form')
            form.action = '/course'
            form.method = 'get'
            form.innerHTML = `<input name="department" value="${department}"/>
                                <input name="number" value="${number}"/>`
            document.body.append(form)
            form.submit()
        }
    }
</script>
@endsection()

@section('content')
<template id="coursestemplate">
    <?php
        foreach ($courses as $course) {
            $value = strtoupper($course->department) . " " . strtoupper($course->number);
            echo "<option value='$value'>";
        }
    ?>
</template>
<input id="search" type="text" name="search" list="courses" class="search_center" placeholder="Eg. CMPT 470"/>
<datalist id="courses">
</datalist>
@endsection

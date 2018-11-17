@extends('layouts.app')

@section('styles')
    <style>
        .welcome-text {
          color: white;
        }
        .container-fluid, html {
          background-color: #A6192E;
        }
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
        var templateContent = document.getElementById('coursestemplate')
        search.addEventListener('keyup', e => {
            var input = new RegExp(search.value.trim(), 'i')
            var options = templateContent.cloneNode(true)
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
<div class='welcome-text'>
  <center>
    <h1>Welcome to SFU CS FriendFinder</h1>
    <h4>Select a course below to begin finding friends</h4>
  </center>
</div>
  <div id="coursestemplate" style="display:none;">
      <?php
          foreach ($courses as $course) {
              $value = strtoupper($course->department) . " " . strtoupper($course->number);
              echo "<option value='$value'>";
          }
      ?>
  </div>
  <input id="search" type="text" name="search" list="courses" class="search_center form-control" placeholder="Eg. CMPT 470"/>
  <datalist id="courses">
  </datalist>
@endsection

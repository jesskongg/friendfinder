<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>SFU Friend Finder</title>
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
        <script defer>
            window.onload = function() {
                var search = document.getElementById('search')
                var results = document.getElementById('courses')
                var templateContent = document.getElementById("coursestemplate").content
                search.addEventListener('keyup', function handler(event) {
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
            }
        </script>
    </head>
    <body style="height: 100%">
        <template id="coursestemplate">
            <?php
                foreach ($courses as $course) {
                    $value = strtoupper($course->department) . "-" . strtoupper($course->number);
                    echo "<option value='$value'>";
                }
            ?>
        </template>
        <input id="search" type="text" name="search" list="courses" class="search_center" placeholder="Eg. CMPT-470"/>
        <datalist id="courses">
        </datalist>
    </body>
</html>

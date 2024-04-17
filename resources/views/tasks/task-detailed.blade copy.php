@extends('layouts.app')

@section('content')
    <style>
        #tree-container {
            font-size: 1.5rem;
            color: var(--main-color);
            text-align: left;
        }
    </style>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="column-block"> 
                <p> Najprv stlačíš run, pre kontrolu či sa dá kód skompilovať. Toto musíš stlačiť pri každej zmene v kóde.</p>
                <p> Keď už máš výstup tvojho kódu a chceš ho otestovať, stlačíš tlačidlo Otestovať</p>
            </div>
        </div>
    </div>
  
    <div class="top-box">
        <div class="box glowing">
            <span><h1>{{ $task->name }}</h1></span>
        </div>  
    </div>

    <div class="task-detail-container">
        <div class="task-detail-column-first"> 
            <div class="column-block">
                <span><h1>{{ $task->description }}</h1></span>
                <div id="tree-container"></div>
            </div>
        </div>

        <div class="task-detail-column-second">
            <div class="column-block">
                <div class="asd" style="max-width: 100%; margin: 0 auto; text-align: left">
                    <code-runner language="c++"></code-runner>
                </div>
                <div id="error-message" style="display: none; color: red; text-align: center; margin-top: 10px"></div>
            </div>
        </div>
    </div>

    <div class="buttons-bottom">
        <div class="svg-wrapper">
            <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
                <rect id="showTuto" class="shape" height="60" width="320" />
                <!-- Text element in SVG -->
                <text x="160" y="35" text-anchor="middle" class="svg-text">Otestovať</text>
            </svg>
            <!-- Text outside SVG -->
            <div class="text">Ako spustiť?</div>
        </div>

        <div class="svg-wrapper">
            <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
                <rect id="compare" class="shape" height="60" width="320" />
                <!-- Text element in SVG -->
                <text x="160" y="35" text-anchor="middle" class="svg-text">Otestovať</text>
            </svg>
            <!-- Text outside SVG -->
            <div class="text">Otestovať</div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/MarketingPipeline/Code-Runner-Web-Component@main/dist/code-runner-wc.min.js" defer></script>
    <script> 
            function stringCompare(str1, str2) {
                // Rozdeliť reťazce na riadky
                const lines1 = str1.trim().split('\n');
                const lines2 = str2.trim().split('\n');

                // Porovnať počet riadkov
                if (lines1.length !== lines2.length) {
                    return false;
                }

                // Porovnať každý riadok samostatne
                for (let i = 0; i < lines1.length; i++) {
                    // Odstrániť medzery na začiatku a konci riadkov
                    const trimmedLine1 = lines1[i].trim();
                    const trimmedLine2 = lines2[i].trim();
                    
                    // Porovnať riadky
                    if (trimmedLine1 !== trimmedLine2) {
                        return false;
                    }
                }

                // Všetky riadky sú rovnaké
                return true;
            }

            function tree(riadky) {
            let stromcek = '';
            for (let i = 0; i < riadky; i++) {
                // Vytvoríme medzery
                for (let j = 0; j < riadky - i - 1; j++) {
                    stromcek += '&nbsp;'; // non-breaking space pre HTML
                }
                // Pridáme hviezdičky
                for (let k = 0; k < (2 * i + 1); k++) {
                    stromcek += '*';
                }
                // Pridáme nový riadok
                if (i < riadky - 1) {
                    stromcek += '<br>'; // HTML značka pre odriadkovanie
                }
            }
            return stromcek;
        }


        document.addEventListener('DOMContentLoaded', function() {
    const compareButton = document.getElementById('compare');
    const errorMessageDiv = document.getElementById('error-message'); 
    if ({{ $task->id }} == 20) {
        const treeOutput = tree(5); 
        document.getElementById('tree-container').innerHTML = treeOutput;
    }

    treeOutput =
    `    *
   ***
  *****
 *******
*********`;

    compareButton.addEventListener('click', function(event) {
        const userOutput = document.getElementById('result').textContent;
        console.log(userOutput);
        const expectedOutput = `{{ $task->result }}`;
        console.log(expectedOutput);

        if (stringCompare(userOutput, expectedOutput)) {
            fetch('/tasks/done', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    user_id: {{ Auth::user()->id }},
                    task_id: {{ $task->id }},
                    points: {{ $task->points }}
                })
            })
            .then(response => {
                if(response.ok) {
                    alert('Úloha bola zaznamenaná ako dokončená a boli ti pripísané body.');
                    return response.json();
                } else if(response.status === 409) {
                    throw new Error('Nemôžete odovzdať úlohu viackrát.');
                } else {
                    throw new Error('Došlo k chybe pri odosielaní úlohy.');
                }
            })
            .then(data => {
                if(data.success) {
                    console.log('Úloha bola zaznamenaná ako dokončená.');
                    const pointsElement = document.getElementById('user-points');
                    if (pointsElement) {
                        pointsElement.textContent = 'Body: ' + data.newTotalPoints;
                    }
                }
            })
            .catch((error) => {
                console.error('Chyba pri zápise úlohy:', error);
                if(errorMessageDiv) {
                    errorMessageDiv.textContent = error.message; 
                    errorMessageDiv.style.display = 'block';
                }
            });
        } else {
            alert('Nesprávny výstup.');
        }
    });
});


        var modal = document.getElementById("myModal");

        var btn = document.getElementById("showTuto");

        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
        modal.style.display = "block";
        }

        span.onclick = function() {
        modal.style.display = "none";
        }

        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <style>
        #tree-container {
            font-size: 1.5rem;
            color: var(--main-color);
            text-align: left;
        }
    </style>
  
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
        <div class="svg-wrapper">
            <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
                <rect id="compare" class="shape" height="60" width="320" />
                <text x="160" y="35" text-anchor="middle" class="svg-text">Otestovať</text>
            </svg>
            <div class="text">Otestovať</div>
        </div>
    </div>

    <div class="task-detail-column-second">
        <div class="column-block">
            <div class="asd" style="max-width: 100%; margin: 0 auto; text-align: left; background-color: var(--main-color); padding: 10px; border-radius: 5px;">
                <div style="display: flex;">
                    <div id="line-numbers" style="width: 30px;background-color:var(--main-color); color: #000; padding-right: 5px; border-right: 1px solid #fff; text-align: right; overflow-y: hidden;">
                    </div>
                    <textarea id="code-editor" spellcheck="false" style="flex: 1; width: calc(100% - 30px); height: 300px; background-color: #000; color: #fff; border: none; font-family: monospace; padding-left: 5px; line-height: 20px; overflow-y: scroll;"></textarea>
                </div>
            </div>
            <div id="error-message" style="display: none; color: red; text-align: center; margin-top: 10px"></div>
        </div>
        <div class="column-block" style="margin-top: 20px;">
            <div id="user-output-container" style="display: none; max-width: 100%; margin: 0 auto; background-color: #1e1e1e; padding: 10px; border-radius: 5px;">
                <div style="color: #ffffff; text-align: left; font-family: monospace;">
                    <strong>Output:</strong>
                    <pre id="user-output" style="margin-top: 10px; color: #76d275;"></pre>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script>
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
});
        const textarea = document.getElementById("code-editor");
        const lineNumbers = document.getElementById("line-numbers");

        textarea.addEventListener("input", updateLineNumbers);
        textarea.addEventListener("scroll", syncScroll);

        function updateLineNumbers() {
            const lineCount = textarea.value.split("\n").length;
            const lineHeight = 20; // Line height in px
            const linesInView = Math.ceil(textarea.clientHeight / lineHeight);
            const startLine = Math.floor(textarea.scrollTop / lineHeight) + 1;
            const endLine = startLine + linesInView;

            lineNumbers.innerHTML = "";
            for (let i = startLine; i < endLine; i++) {
                lineNumbers.innerHTML += (i <= lineCount) ? `<div style="line-height: ${lineHeight}px;">${i}</div>` : `<div style="line-height: ${lineHeight}px;">&nbsp;</div>`;
            }
        }

        function syncScroll() {
            updateLineNumbers();
        }

        updateLineNumbers();

        const expectedOutput = `{{ $task->result }}`;
        var userOutput = "";

        function stringCompare(str1, str2) {
                const lines1 = str1.trim().split('\n');
                const lines2 = str2.trim().split('\n');

                if (lines1.length !== lines2.length) {
                    return false;
                }

                for (let i = 0; i < lines1.length; i++) {
                    const trimmedLine1 = lines1[i].trim();
                    const trimmedLine2 = lines2[i].trim();
                    
                    if (trimmedLine1 !== trimmedLine2) {
                        return false;
                    }
                }
                return true;
            }

        document.querySelector(".svg-wrapper svg").addEventListener("click", function() {
            const codeContent = document.getElementById("code-editor").value;
            
            // Define the payload with the specific format
            const payload = {
                code: codeContent,
                language: "cpp",
                input: ""
            };

            fetch('http://localhost:3000/', {
                method: 'POST', 
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload) // Convert the payload into a JSON string
            })
            .then(response => response.json()) // Parse the JSON response
            .then(data => {
                if (data.output){
                    userOutput = data.output;
                } else {
                    userOutput = "";
                }
                if (userOutput.trim() !== "") {
                    document.getElementById("user-output").textContent = userOutput;
                    document.getElementById("user-output-container").style.display = "block"; // Show the output container
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
                } else {
                    document.getElementById("user-output-container").style.display = "none"; // Hide if empty
                }
                console.log(userOutput);
                console.log(expectedOutput);
                if (data.error){
                    document.getElementById("user-output").textContent = data.error;
                    document.getElementById("user-output-container").style.display = "block"; // Show the output container
                }
            })
            .catch((error) => {
                console.error('Error:', error); // Handle any errors

            });
        });
    </script>
@endsection

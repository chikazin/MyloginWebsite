<?php
    function statusHint($contentBeforeSeconds, $contentAfterSeconds, $url)
    {
        echo "<div id='hint' style='margin:20px'></div>
                    <script>
                    let seconds = 3;
                    function CountdownJump() {
                        document.getElementById('hint').innerText = '{$contentBeforeSeconds}'+seconds+'{$contentAfterSeconds}';
                        seconds--;
                        if(seconds === 0){
                            window.location.href = '{$url}';
                        }
                        setTimeout(CountdownJump, 1000);
                    }
                    CountdownJump();
                    </script>
                    ";
    }
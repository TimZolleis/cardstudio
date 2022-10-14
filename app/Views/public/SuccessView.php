<div class="mt-5 flex flex-col  w-full items-center justify-center gap-10 text-white">
    <canvas id="canvas" class="shadow shadow-xl rounded"></canvas>
    <button class="bg-card-blue p-3 rounded text-white" id="send_template_button">Abschicken</button>
</div>


<script type="text/javascript">


    function getCookie(name) {
        let cookie = {};
        document.cookie.split(';').forEach(element => {
            let [key, value] = element.split('=');
            cookie[key.trim()] = value;
        })
        return cookie[name]
    }


</script>


<?php
echo '<script type="text/javascript">
            </script>';
?>




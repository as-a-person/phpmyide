<?php
if ($_SERVER['HTTP_SEC_FETCH_DEST'] == 'iframe') {
    echo '<!DOCTYPE html><hr>';
    exit('<body style="background:rgb(75, 75, 100); 
    color: rgb(75, 175, 75); 
    font-family: Verdana, Geneva, Tahoma, sans-serif;">Choose a task in the taskbar.</body>');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Sets the title -->
        <title>Phpmyide</title>
        <!-- Sets the viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Sets the icon -->
        <link rel="shortcut icon" href="../local/res/favicon.ico">
        <!-- Sets the style -->
        <link rel="stylesheet" href="../local/res/main.css">
    </head>
    <body>
        <!-- Creates a container for everything in the page -->
        <div id="container" onclick="effect(this, 'hue');">
            <!-- Header container at the top the page (The task bar)-->
            <div id="header">
                <button onclick="set_dsi('dsi1', 0);">Exit</button>
                <button onclick="set_dsi('dsi1', 1);">Files</button>
                <button onclick="set_dsi('dsi1', 2)">Editor</button>
                <button onclick="set_dsi('dsi1', 3);">Input</button>
                <button onclick="set_dsi('dsi1', 4);">Output</button>
                <button onclick="set_dsi('dsi1', 5);">Execute</button>
                <button onclick="set_dsi('dsi1', 6);">Settings</button>
                <button onclick="set_dsi('dsi1', 7);">Other</button>
                <a>:DSI 1 (Controls the left box)</a>
                <br>
                <button onclick="set_dsi('dsi2', 0);">Exit</button>
                <button onclick="set_dsi('dsi2', 1);">Files</button>
                <button onclick="set_dsi('dsi2', 2);">Editor</button>
                <button onclick="set_dsi('dsi2', 3);">Input</button>
                <button onclick="set_dsi('dsi2', 4);">Output</button>
                <button onclick="set_dsi('dsi2', 5);">Execute</button>
                <button onclick="set_dsi('dsi2', 6);">Settings</button>
                <button onclick="set_dsi('dsi2', 7);">Other</button>
                <a>:DSI 2 (Controls the right box)</a>
            </div>
            <!-- Content container for the main stuff in the page (The DSI)-->
            <div id="content">
                <!-- DSI (Dual Screen Ide) -->
                <iframe id="dsi1" src="../local/index.php"></iframe>
                <hr>
                <iframe id="dsi2" src="../local/index.php"></iframe>
            </div>
            <!-- Footer container at the bottom of the page (Credits)-->
            <div id="footer">
                <p>
                    <a href="https://github.com/as-a-person/phpmyide" target="_blank">
                        Phpmyide
                        <img src="../local/res/favicon.ico" alt="A small stylized icon representing the Phpmyide application, set against a simple background, conveying a modern and professional tone">
                    </a>
                    is made by
                    <a href="https://github.com/as-a-person" target="_blank">
                        Aeiaaa94
                        <img src="../local/res/creator.png" alt="White bold text with a black outline displaying negative two seven six three centered on a solid brown background, conveying a playful and informal tone">
                    </a>
                </p>
            </div>
        </div>
        <!-- Sets the script -->
        <script src="../local/res/main.js">/*The core script*/</script>
    </body>
</html>
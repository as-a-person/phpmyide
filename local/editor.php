<?php
$file_path = '';
$file_content = '';
if (isset($_GET['file'])) {
    // The file path is relative to the 'idefs' directory
    $root_dir = realpath(__DIR__ . '/../idefs');
    $file_param = $_GET['file'];
    $full_path = realpath($root_dir . '/' . $file_param);

    // Ensure the file is within the root directory
    if ($full_path && strpos($full_path, $root_dir) === 0 && is_file($full_path)) {
        $file_path = $file_param;
        $file_content = file_get_contents($full_path);
    } else {
        $file_content = 'Error: File not found or access denied.';
    }
} else {
    $err = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="../local/res/main.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: sans-serif;
        }
        #editor-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        #file-path {
            padding: 10px;
            background-color: #f0f0f0;
            border-bottom: 1px solid #ccc;
        }
        textarea {
            width: 100%;
            height: 100%;
            border: none;
            padding: 10px;
            box-sizing: border-box;
            resize: none;
            font-family: monospace;
        }
        #editor-error {
            display: none;
        }
    </style>
</head>
<body>
    <div id="editor-container">
        <div id="file-path">
            <?php echo htmlspecialchars($file_path);
            if ($err == true) echo 'Choose a file in the file manager';?>
        </div>
        <textarea id="editor"><?=htmlspecialchars($file_content)?></textarea>
    </div>
    <div id="editor-error">This content is only available when it is attached to index.php</div>
    <script>
        if (window.self === window.parent) {
            document.getElementById('editor-container').style.display = 'none';
            document.getElementById('editor-error').style.display = 'block';
        }
    </script>
</body>
</html>

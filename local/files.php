<?php
// Define the root directory for the file manager.
// realpath() resolves any symbolic links and '..' path segments.
$root_dir = realpath(__DIR__ . '/../idefs');

// Get the current path from the query string, or default to the root.
// Checks if the path is within the root directory.
$current_path_param = isset($_GET['path']) ? $_GET['path'] : '';
$current_abs_path = realpath($root_dir . '/' . $current_path_param);

// Security check: If the resolved path is not inside the root directory, deny access.
if (!$current_abs_path || strpos($current_abs_path, $root_dir) !== 0) {
    // Originally was supposed show an error message.
    // But instead it resets to the root.
    $current_abs_path = $root_dir;
    $current_path_param = '';
}

// Get the relative path from the root_dir for display.
$relative_path = substr($current_abs_path, strlen($root_dir));
$relative_path = $relative_path ? $relative_path : '/';


// Scan the directory for files and folders.
$items = scandir($current_abs_path);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <link rel="stylesheet" href="../local/res/main.css">
    <link rel="stylesheet" href="../local/res/files.css">
    <link rel="shortcut icon" href="../local/res/favicon.ico" type="image/x-icon">
</head>
<body>

<div id="iframe-only-message">
    <p>This content is only available when it is attached to index.php</p>
</div>

<div id="file-manager-content">
    <h2>Current Path: <code class="current-path"><?php echo htmlspecialchars($relative_path); ?></code></h2>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Size (bytes)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Parent directory link ('..')
            if ($current_abs_path != $root_dir) {
                $parent_path = dirname($current_path_param);
                if ($parent_path == '.') $parent_path = '';
                echo '<tr>';
                echo '<td>&#128193;</td>'; // Folder emoji
                echo '<td><a href="?path=' . urlencode($parent_path) . '">..</a></td>';
                echo '<td></td>';
                echo '</tr>';
            }

            // Loop through items
            foreach ($items as $item) {
                // Skip current directory '.' and parent '..' links as it is handled above
                if ($item == '.' || $item == '..') {
                    continue;
                }

                $item_abs_path = $current_abs_path . '/' . $item;
                $item_rel_path = $current_path_param ? $current_path_param . '/' . $item : $item;
                
                $is_dir = is_dir($item_abs_path);
                $icon = $is_dir ? '&#128193;' : '&#128196;'; // Folder or File emoji
                $file_size = $is_dir ? '' : filesize($item_abs_path);

                echo '<tr>';
                echo '<td>' . $icon . '</td>';

                if ($is_dir) {
                    // Link to a directory
                    echo '<td><a href="?path=' . urlencode($item_rel_path) . '">' . htmlspecialchars($item) . '</a></td>';
                } else {
                    // Link to a file, opens in the editor
                    echo '<td><a onclick="openFile(\'' . htmlspecialchars($item_rel_path, ENT_QUOTES) . '\')">' . htmlspecialchars($item) . '</a></td>';
                }
                
                echo '<td>' . $file_size . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<script src="../local/res/files.js"></script>

</body>
</html>

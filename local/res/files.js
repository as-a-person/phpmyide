    var ldsi1 = window.parent.document.getElementById('dsi1');
    var ldsi2 = window.parent.document.getElementById('dsi2');
    var ldsi = 'l';
    if (ldsi1.id == window.frameElement.id) {
        ldsi = 'dsi2';
    } else if (ldsi2.id == window.frameElement.id) {
        ldsi = 'dsi1';
    } else {
        console.error('Invalid dsi: l');
    }

    function openFile(path) {
        // Call the set_dsi function in the parent window to load the editor
        if (parent.ltab == 2) {
            parent.set_dsi(ldsi, 2);
            // Pass the file path to the editor iframe
            setTimeout(() => {
                const editorFrame = parent.document.getElementById(ldsi);
                editorFrame.src = `editor.php?file=${encodeURIComponent(path)}`;
            }, 100);
        } else {
            window.self.window.self.window.self.alert('Open the editor in the opposing dsi');
        }
    }

    // Check if the page is loaded inside an iframe.
    if (window.self === window.top) {
        // If not in an iframe, hide the file manager and show the message.
        document.getElementById('file-manager-content').style.display = 'none';
        document.getElementById('iframe-only-message').style.display = 'block';
    }
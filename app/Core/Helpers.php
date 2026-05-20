<?php

if (!function_exists('component')) {
    /**
     * Render a common UI component.
     *
     * @param string $name Component name (e.g., 'button', 'input_text')
     * @param array $data Data to extract and pass to the component
     * @return void
     */
    function component($name, $data = []) {
        // Resolve path BEFORE extract() to avoid $name being overwritten
        $__componentPath = __DIR__ . '/../../views/components/common/' . $name . '.php';
        if (file_exists($__componentPath)) {
            extract($data);
            include $__componentPath;
        } else {
            echo "<!-- Component '$name' not found at '$__componentPath' -->";
        }
    }
}

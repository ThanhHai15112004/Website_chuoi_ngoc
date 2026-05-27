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

if (!function_exists('loadEnv')) {
    function loadEnv($path) {
        if (!file_exists($path)) {
            return;
        }
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv(sprintf('%s=%s', $name, $value));
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}

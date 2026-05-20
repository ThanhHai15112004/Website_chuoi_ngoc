<?php
/**
 * Common Checkbox Component
 *
 * Props:
 * - $name: Input name attribute
 * - $id: Input id attribute (defaults to $name)
 * - $label: Checkbox label text
 * - $checked: boolean
 * - $required: boolean
 * - $class: Additional classes for the container
 */
$name = $name ?? '';
$id = $id ?? $name;
$label = $label ?? '';
$checked = isset($checked) && $checked ? 'checked' : '';
$required = isset($required) && $required ? 'required' : '';
$class = $class ?? '';
?>
<label class="flex items-center gap-2 cursor-pointer group <?= htmlspecialchars($class) ?>">
    <input type="checkbox" id="<?= $id ?>" name="<?= $name ?>" <?= $checked ?> <?= $required ?> class="w-4 h-4 rounded border-gray-300 text-crimson-600 focus:ring-crimson-600 cursor-pointer transition-colors accent-crimson-600">
    <?php if ($label): ?>
        <span class="text-xs text-gray-600 group-hover:text-gray-900 transition-colors"><?= htmlspecialchars($label) ?></span>
    <?php endif; ?>
</label>

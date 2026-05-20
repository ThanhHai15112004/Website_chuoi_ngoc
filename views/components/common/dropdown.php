<?php
/**
 * Common Dropdown Component
 *
 * Props:
 * - $name: Select name attribute
 * - $id: Select id attribute (defaults to $name)
 * - $label: Label text (optional)
 * - $options: Array of options. Format: ['value' => 'Label', 'value2' => 'Label2'] OR [['value'=>'v','label'=>'L']]
 * - $selected: Currently selected value
 * - $required: boolean
 * - $icon: Left icon (optional)
 * - $class: Additional classes
 */
$name = $name ?? '';
$id = $id ?? $name;
$label = $label ?? '';
$options = $options ?? [];
$selected = $selected ?? '';
$required = isset($required) && $required ? 'required' : '';
$icon = $icon ?? '';
$class = $class ?? '';

$baseClass = 'w-full pr-10 h-[46px] border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/15 focus:border-primary transition-all text-sm bg-white text-gray-900 appearance-none';
if ($icon) {
    $baseClass .= ' pl-11';
} else {
    $baseClass .= ' pl-4';
}
$finalClass = "$baseClass $class";
?>
<div class="mb-4 w-full">
    <?php if ($label): ?>
        <label for="<?= $id ?>" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">
            <?= htmlspecialchars($label) ?>
            <?php if ($required): ?><span class="text-red-500">*</span><?php endif; ?>
        </label>
    <?php endif; ?>
    <div class="relative">
        <?php if ($icon): ?>
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 iconify text-gray-400 text-lg" data-icon="<?= htmlspecialchars($icon) ?>"></span>
        <?php endif; ?>
        
        <select id="<?= $id ?>" name="<?= $name ?>" <?= $required ?> class="<?= $finalClass ?>">
            <?php foreach ($options as $key => $opt): 
                $val = is_array($opt) ? $opt['value'] : $key;
                $text = is_array($opt) ? $opt['label'] : $opt;
                $selAttr = ((string)$val === (string)$selected) ? 'selected' : '';
            ?>
                <option value="<?= htmlspecialchars($val) ?>" <?= $selAttr ?>><?= htmlspecialchars($text) ?></option>
            <?php endforeach; ?>
        </select>
        
        <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
            <span class="iconify text-gray-400 text-xl" data-icon="mdi:chevron-down"></span>
        </div>
    </div>
</div>

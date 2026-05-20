<?php
/**
 * Common Text Input Component
 *
 * Props:
 * - $name: Input name attribute
 * - $id: Input id attribute (defaults to $name)
 * - $label: Label text (optional)
 * - $type: Input type (default 'text')
 * - $placeholder: Placeholder text
 * - $value: Input value
 * - $required: boolean (default false)
 * - $icon: Left icon (iconify name)
 * - $rightIcon: Right icon (iconify name)
 * - $class: Additional CSS classes for input
 * - $togglePassword: boolean, if true adds an eye icon to toggle visibility (for type='password')
 */
$name = $name ?? '';
$id = $id ?? $name;
$label = $label ?? '';
$type = $type ?? 'text';
$placeholder = $placeholder ?? '';
$value = $value ?? '';
$required = isset($required) && $required ? 'required' : '';
$icon = $icon ?? '';
$rightIcon = $rightIcon ?? '';
$class = $class ?? '';
$togglePassword = isset($togglePassword) && $togglePassword;

$wrapperClass = $wrapperClass ?? 'mb-2';

$baseClass = 'w-full px-4 h-[46px] border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-crimson-200 focus:border-crimson-600 transition-all text-sm placeholder-gray-400 bg-white text-gray-900';
if ($icon) $baseClass .= ' pl-11';
if ($rightIcon || $togglePassword) $baseClass .= ' pr-11';

$finalClass = "$baseClass $class";
?>
<div class="<?= htmlspecialchars($wrapperClass) ?> w-full">
    <?php if ($label): ?>
        <label for="<?= $id ?>" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">
            <?= htmlspecialchars($label) ?>
            <?php if ($required): ?><span class="text-red-500">*</span><?php endif; ?>
        </label>
    <?php endif; ?>
    <div class="relative">
        <?php if ($icon): ?>
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                <iconify-icon icon="<?= htmlspecialchars($icon) ?>" class="text-gray-400 text-[19px]"></iconify-icon>
            </div>
        <?php endif; ?>
        
        <input type="<?= $type ?>" id="<?= $id ?>" name="<?= $name ?>" placeholder="<?= htmlspecialchars($placeholder) ?>" value="<?= htmlspecialchars($value) ?>" <?= $required ?> class="<?= $finalClass ?>">
        
        <?php if ($togglePassword && $type === 'password'): ?>
            <button type="button" onclick="const input = document.getElementById('<?= $id ?>'); const icon = this.querySelector('iconify-icon'); if(input.type === 'password') { input.type = 'text'; icon.setAttribute('icon', 'mdi:eye-off-outline'); } else { input.type = 'password'; icon.setAttribute('icon', 'mdi:eye-outline'); }" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-crimson-600 transition-colors focus:outline-none">
                <iconify-icon icon="mdi:eye-outline" class="text-[19px]"></iconify-icon>
            </button>
        <?php elseif ($rightIcon): ?>
            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
                <iconify-icon icon="<?= htmlspecialchars($rightIcon) ?>" class="text-gray-400 text-[19px]"></iconify-icon>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * Common Button Component
 * 
 * Props:
 * - $text: Text of the button (required unless icon only)
 * - $type: Button type (submit, button, reset) - default 'button'
 * - $variant: primary, secondary, danger, outline - default 'primary'
 * - $class: Additional CSS classes
 * - $icon: Iconify icon name (optional)
 * - $id: Element ID (optional)
 * - $onclick: onclick handler (optional)
 * - $disabled: boolean (optional)
 */
$type = $type ?? 'button';
$variant = $variant ?? 'primary';
$text = $text ?? '';
$class = $class ?? '';
$icon = $icon ?? '';
$id = isset($id) ? "id=\"$id\"" : '';
$onclick = isset($onclick) ? "onclick=\"$onclick\"" : '';
$disabledAttr = isset($disabled) && $disabled ? 'disabled' : '';

// Define base styles and variants using semantic CSS variables/classes
$baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold rounded-xl transition-all shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-1 disabled:opacity-50 disabled:cursor-not-allowed';

$variantClasses = '';
switch ($variant) {
    case 'primary':
        $variantClasses = 'bg-crimson-600 text-white hover:bg-crimson-700 focus:ring-crimson-400/50 shadow-md hover:shadow-lg';
        break;
    case 'secondary':
        $variantClasses = 'bg-gray-100 text-gray-800 hover:bg-gray-200 border border-transparent focus:ring-gray-300';
        break;
    case 'danger':
        $variantClasses = 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500';
        break;
    case 'outline':
        $variantClasses = 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-gray-200';
        break;
}
// Merge classes
$finalClass = "$baseClasses $variantClasses $class";
?>
<button type="<?= $type ?>" <?= $id ?> <?= $onclick ?> <?= $disabledAttr ?> class="<?= $finalClass ?>">
    <?php if ($text): ?>
        <span><?= htmlspecialchars($text) ?></span>
    <?php endif; ?>
    <?php if ($icon): ?>
        <span class="iconify" data-icon="<?= htmlspecialchars($icon) ?>"></span>
    <?php endif; ?>
</button>

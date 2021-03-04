@props(['type' => 'green', 'message'])

<div {{ $attributes->merge(['class' => 'p-2 mb-2 max-w-lg rounded border border-'. $type .'-600 bg-'. $type .'-200 text-'. $type .'-900']) }}>
    {{ $message }}
</div>
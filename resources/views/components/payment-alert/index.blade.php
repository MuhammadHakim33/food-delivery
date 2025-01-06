<div {{ $attributes->merge(['class' => 'border rounded p-4']) }} role="alert" tabindex="-1" aria-labelledby="hs-actions-label">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-start gap-3">
        {{ $slot }}
    </div>
</div>
<div
    x-data="scoreComponent({{ $score }})"
    x-init="init()"
    x-effect="update({{ $score }})"
>
    <span
        x-ref="number"
        class="{{ $color }} font-black leading-none select-none"
        x-text="display">
    </span>
</div>
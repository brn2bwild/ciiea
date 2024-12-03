<template>
    <div
        class="relative flex h-[380px] justify-center overflow-hidden rounded-2xl bg-neutral-950"
    >
        <div class="absolute left-0 top-0 h-full w-full opacity-55">
            <slot name="thumbnail" />
        </div>

        <div class="absolute left-0 top-0 h-full w-full opacity-80">
            <slot name="custom-thumbnail" />
        </div>

        <div class="absolute bottom-2 overflow-hidden rounded-2xl px-3 flex flex-col gap-2 w-full">
            <div>
                <slot name="title" />
            </div>
            <div>
                <slot name="content" />
            </div>
        </div>
    </div>
</template>

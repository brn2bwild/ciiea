<template>
    <div class="relative h-[380px] overflow-hidden rounded-2xl flex justify-center">
        <div class="absolute left-0 top-0 h-full w-full">
            <slot name="thumbnail" />
        </div>
        <div class="absolute bottom-2 p-2">
            <div
                class="border-1 flex h-[160px] w-[270px] flex-col justify-between rounded-2xl border-indigo-900 bg-indigo-900 bg-opacity-95 p-2"
            >
                <slot name="content" />
            </div>
        </div>
    </div>
</template>

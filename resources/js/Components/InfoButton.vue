<script setup>
import { faFile } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>

<template>
    <button
        class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-cyan-700 transition-all duration-200 hover:bg-cyan-600"
    >
        <FontAwesomeIcon
            :icon="faFile"
            class="p-4 text-xl text-neutral-50"
        />
    </button>
</template>

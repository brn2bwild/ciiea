<script setup>
import { faPenToSquare } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>

<template>
    <button
        class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-orange-700 transition-all duration-200 hover:bg-orange-600"
    >
        <FontAwesomeIcon
            :icon="faPenToSquare"
            class="p-2 text-xl text-neutral-50"
        />
    </button>
</template>

<script setup>
import { faTrash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
</script>

<template>
    <button
        class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-red-700 transition-all duration-200 hover:bg-red-600"
    >
        <FontAwesomeIcon
            :icon="faTrash"
            class="p-2 text-xl text-neutral-50"
        />
    </button>
</template>

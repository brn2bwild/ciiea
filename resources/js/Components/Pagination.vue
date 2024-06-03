<script setup>
const props = defineProps({
    links: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <template v-for="link in $props.links" :key="link.index">
            <Link
                v-if="link.url"
                :href="link.url"
                class="mx-1 rounded-lg px-3 py-2 font-bold text-neutral-950 shadow-md"
                :class="link.active ? 'bg-sky-500 text-white' : ''"
                >{{ link.label }}</Link
            >
            <span
                v-else
                class="mx-1 rounded-lg px-3 py-2 font-bold text-neutral-500 shadow-md"
                >{{ link.label }}</span
            >
        </template>
    </div>
</template>

<script setup>
const props = defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <div>
        <template v-for="link in $props.links">
            <Link
                v-if="link.url"
                :href="link.url"
                class="mx-1 rounded-lg px-3 py-2 font-bold text-neutral-950"
                :class="link.active ? 'bg-neutral-200' : ''"
                >{{ link.label }}</Link
            >
            <span
                v-else
                class="mx-1 rounded-lg px-3 py-2 font-bold text-neutral-500"
                >{{ link.label }}</span
            >
        </template>
    </div>
</template>

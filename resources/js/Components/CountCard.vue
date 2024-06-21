<script setup>
import { faCamera } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    route: {
        type: String,
        required: true,
    },
    count: {
        type: Number,
        required: true,
        default: 0,
    },
    text: {
        type: String,
        required: true,
        default: "Card",
    },
    icon: {
        type: String,
        default: "user",
    },
});
</script>
<template>
    <Link
        :href="route"
        class="flex h-40 flex-col justify-between rounded-lg bg-white px-8 py-6 transition duration-200 hover:bg-neutral-200"
    >
        <div class="text-xl font-medium leading-tight text-neutral-700">
            {{ text }}
        </div>
        <div class="flex items-end justify-between text-neutral-700">
            <span class="text-3xl">{{ count }}</span>
            <FontAwesomeIcon
                :icon="faCamera"
                class="pr-4 text-6xl text-neutral-700"
            />
        </div>
    </Link>
</template>

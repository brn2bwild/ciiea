<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    events: {
        type: Object,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    showModal: {
        type: Boolean,
        default: false,
    },
});

const modalImageUrl = ref("");
</script>

<template>
    <Head title="Galería" />
    <section class="w-full px-12 pt-10">
        <h1 class="text-xl font-bold text-neutral-600">Eventos</h1>
    </section>
    <div
        class="grid w-full grid-cols-1 gap-4 px-4 pt-8 sm:grid-cols-5 sm:gap-6 sm:px-12 sm:pb-12 sm:pt-8"
    >
        <div
            class="group"
            v-for="event in props.events.data"
            :key="event.index"
        >
            <div
                class="relative block overflow-hidden rounded-lg bg-neutral-50 transition-all duration-300 ease-in-out"
            >
                <img
                    loading="lazy"
                    class="z-0 h-80 object-cover"
                    src="/storage/images/gallery-index.jpeg"
                    alt="foro-1"
                />
                <div
                    class="absolute left-0 top-0 flex h-full w-full items-center justify-evenly bg-neutral-900 text-neutral-800 opacity-80 transition-all duration-150 group-hover:opacity-60"
                ></div>
                <div
                    class="absolute left-0 top-0 z-10 flex h-full w-full flex-col items-center justify-evenly px-3 text-neutral-50"
                >
                    <span class="text-center">{{ event.name }}</span>
                    <Link
                        class="cursor-pointer rounded-lg bg-sky-500 px-3 py-2"
                        :href="route('guest.gallery.show', event.slug)"
                        >Ver evento</Link
                    >
                </div>
            </div>
        </div>
    </div>

    <Modal @close="showModal = false" :show="showModal" :maxWidth="'7xl'">
        <img
            class="object-cover"
            loading="lazy"
            :src="modalImageUrl"
            alt="image"
        />
    </Modal>
</template>

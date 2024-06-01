<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    images: {
        type: Object,
        required: true,
    },
});

const modalImageUrl = ref("");
const showModal = ref(false);
</script>

<template>
    <Head title="Galería" />

    <section
        v-if="Object.keys(images).length !== 0"
        class="grid w-full grid-cols-1 gap-10 p-8 md:grid-cols-5"
    >
        <div
            class="flex w-full cursor-pointer flex-col items-start justify-start overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            v-for="image in images"
            :key="image.index"
        >
            <div
                @click="
                    showModal = true;
                    modalImageUrl = '/storage/' + image.path;
                "
            >
                <img
                    class="object-cover"
                    :src="'/storage/' + image.path"
                    alt="image"
                />
            </div>
        </div>
    </section>
    <section
        v-else
        class="flex min-h-screen w-full items-center justify-center px-8"
    >
        <h2>No hay imágenes agregadas para este evento</h2>
    </section>

    <Modal @close="showModal = false" :show="showModal" :maxWidth="'3xl'">
        <img
            class="object-cover"
            loading="lazy"
            :src="modalImageUrl"
            alt="image"
        />
    </Modal>
</template>

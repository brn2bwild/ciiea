<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
});

const modalImageUrl = ref("");
const showModal = ref(false);
</script>

<template>
    <Head title="Galería" />

    <h1 class="ml-8 mt-8 font-medium">{{ props.event.name }}</h1>
    <section
        v-if="Object.keys(props.event.images).length !== 0"
        class="grid w-full grid-cols-1 gap-10 p-8 md:grid-cols-5"
    >
        <div
            class="flex w-full cursor-pointer flex-col items-start justify-start overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            v-for="image in props.event.images"
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
        class="flex min-h-screen w-full flex-col items-center justify-center px-8"
    >
        <h2>No hay imágenes agregadas para este evento</h2>
        <Link
            :href="route('guest.gallery.index')"
            class="mt-4 rounded-lg bg-sky-500 px-3 py-2 text-neutral-50"
            >Regresar</Link
        >
    </section>

    <Modal @close="showModal = false" :show="showModal" :maxWidth="'3xl'">
        <div class="relative">
            <button
                @click="showModal = false"
                class="absolute right-2 top-2 rounded-full bg-neutral-800 bg-opacity-60 px-4 py-3"
            >
                <font-awesome-icon
                    class="text-2xl text-neutral-50"
                    :icon="{
                        prefix: 'fa',
                        iconName: 'xmark',
                    }"
                />
            </button>
            <img
                class="object-cover"
                loading="lazy"
                :src="modalImageUrl"
                alt="image"
            />
        </div>
    </Modal>
</template>

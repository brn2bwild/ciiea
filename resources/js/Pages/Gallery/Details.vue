<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faXmark } from "@fortawesome/free-solid-svg-icons";

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

    <h1 class="ml-8 pt-24 font-medium">{{ props.event.name }}</h1>
    <section
        v-if="Object.keys(props.event.images).length !== 0"
        class="pt-8 grid w-full grid-cols-1 gap-10 p-8 md:grid-cols-5"
    >
        <div
            class="flex h-[160px] w-full cursor-pointer flex-col items-center justify-center overflow-hidden rounded-2xl bg-neutral-700 shadow-lg shadow-slate-100"
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
        <h1 class="font-medium">No hay imágenes agregadas para este evento</h1>
        <Link
            :href="route('guest.gallery.index')"
            class="mt-4 rounded-lg bg-sky-900 px-3 py-2 text-neutral-50"
            >Regresar</Link
        >
    </section>

    <Modal @close="showModal = false" :show="showModal">
        <div
            class="relative flex w-full items-center justify-center bg-neutral-400"
        >
            <div
                @click="showModal = false"
                class="absolute right-2 top-2 flex h-10 w-10 cursor-pointer items-center justify-center overflow-hidden rounded-full bg-neutral-600 opacity-70 transition-all duration-200 hover:bg-neutral-700"
            >
                <FontAwesomeIcon class="p-2 text-neutral-50" :icon="faXmark" />
            </div>
            <img
                class="object-cover"
                loading="lazy"
                :src="modalImageUrl"
                alt="image"
            />
        </div>
    </Modal>
</template>

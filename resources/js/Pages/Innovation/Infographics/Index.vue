<script setup>
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    infographics: {
        type: Object,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const showImageModal = ref(false);
const urlToShow = ref("");

const handleOpenImageModal = (url) => {
    urlToShow.value = url;
    console.log(url);
    showImageModal.value = true;
};

const handleCloseImageModal = () => {
    showImageModal.value = false;
};
</script>
<template>
    <Head title="Infografías" />
    <div
        class="flex w-full flex-col items-center justify-center sm:px-60 sm:py-10"
    >
        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">Infografías</h1>
        </section>
        <section class="grid w-full grid-cols-1 gap-10 md:grid-cols-3">
            <div
                v-for="infographic in props.infographics.data"
                :key="infographic.index"
                class="flex w-full flex-col items-start justify-start overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div
                    class="mb-2 flex h-60 w-full justify-center overflow-hidden"
                >
                    <img
                        class="w-full object-cover"
                        :src="
                            '/storage/' +
                            (infographic.image
                                ? infographic.image.path
                                : 'images/bookshelve-optimized.jpg')
                        "
                        alt="book-cover"
                    />
                </div>
                <div
                    class="flex h-36 w-full flex-col items-start justify-between gap-0 p-4"
                >
                    <h1
                        class="font-sans text-lg font-extrabold text-neutral-700"
                    >
                        {{ infographic.title }}
                    </h1>
                    <button
                        v-if="infographic.image"
                        @click="handleOpenImageModal(infographic.image.path)"
                        class="rounded-xl bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                    >
                        Ver
                    </button>
                </div>
            </div>
        </section>
        <Pagination
            :links="props.infographics.meta.links"
            class="mt-8 flex justify-center"
        />
    </div>
    <Modal
        @close="handleCloseImageModal"
        :show="showImageModal"
        :max-width="'3xl'"
    >
        <img
            :src="'/storage/' + urlToShow"
            alt="infographic"
            class="max-h-screen"
        />
    </Modal>
</template>

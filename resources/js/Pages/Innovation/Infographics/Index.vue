<script setup>
import Card from "@/Components/Card.vue";
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
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
            <Card
                v-for="infographic in props.infographics.data"
                :key="infographic.index"
            >
                <template #thumbnail>
                    <img
                        class="object-cover object-center"
                        :src="
                            '/storage/' +
                            (infographic.image
                                ? infographic.image.path
                                : 'images/bookshelve-optimized.jpg')
                        "
                        alt="infographic"
                    />
                </template>
                <template #title>
                    <h1
                        class="line-clamp-3 font-sans text-lg font-extrabold text-neutral-50"
                    >
                        {{ infographic.title }}
                    </h1>
                </template>
                <template #content>
                    <div class="mt-2 flex items-center justify-center">
                        <button
                            v-if="infographic.image"
                            @click="
                                handleOpenImageModal(infographic.image.path)
                            "
                            class="rounded-lg bg-sky-900 px-4 py-2 text-sm font-bold text-neutral-50"
                        >
                            Ver más
                        </button>
                    </div>
                </template>
            </Card>
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

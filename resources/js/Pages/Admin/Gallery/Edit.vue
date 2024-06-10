<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
});

const modalImageUrl = ref("");
const modalImageAlt = ref("");
const showImageModal = ref(false);
const showDeleteModal = ref(false);

const imagesForm = useForm({
    id: props.event.id,
    images: null,
});

const imageForm = useForm({
    id: null,
});

const handleShowImageModal = (url, name) => {
    modalImageUrl.value = url;
    modalImageAlt.value = name;
    showImageModal.value = true;
};

const handleImagesChange = (event) => {
    const images = event.target.files;

    handleSubmitImages(images);
};

const handleShowDeleteModal = (id) => {
    imageForm.id = id;
    showDeleteModal.value = true;
};

const handleDeleteImage = () => {
    imageForm.delete(route("admin.gallery.delete-images"), {
        onSuccess: () => handleCloseDeleteModal(),
        onFinish: () => imageForm.reset("id"),
    });
};

const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};

const handleSubmitImages = (images) => {
    if (images) {
        imagesForm.images = images;

        imagesForm.post(route("admin.gallery.upload-images"), {});
    }
};
</script>

<template>
    <Head title="Galería" />
    <h1 class="pl-8 text-3xl font-bold">Galería evento {{ event.name }}</h1>
    <h2 class="pl-8 text-xl font-semibold">Fecha: {{ event.date }}</h2>
    <section class="w-full p-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <label
                for="upload-images-input"
                class="group flex h-40 cursor-pointer flex-col items-center justify-center rounded-xl bg-white p-6"
            >
                <form @submit.prevent="handleSubmitImages">
                    <input
                        @change="handleImagesChange"
                        type="file"
                        class="hidden"
                        id="upload-images-input"
                        accept="image/png, image/jpg, image/jpeg"
                        multiple
                    />
                </form>
                <font-awesome-icon
                    class="mb-2 text-4xl text-neutral-300 transition duration-200 group-hover:text-neutral-400"
                    :icon="{ prefix: 'fa', iconName: 'plus-circle' }"
                />
                <h1 class="font-bold">Agregar imágenes</h1>
            </label>
            <div
                v-for="image in event.images"
                :key="image.index"
                class="group relative h-40 cursor-pointer overflow-hidden rounded-xl bg-white"
            >
                <!-- {{ image.path }} -->
                <img
                    @click="
                        handleShowImageModal(
                            route('home') + '/storage/' + image.path,
                            image.title,
                        )
                    "
                    class="h-full w-full object-cover transition-all duration-200 group-hover:opacity-40"
                    :src="route('home') + '/storage/' + image.path"
                />
                <button
                    @click="handleShowDeleteModal(image.id)"
                    class="absolute right-4 top-4 block rounded-full text-5xl text-red-400 transition-all duration-200 hover:text-red-400 group-hover:block sm:hidden sm:text-red-300"
                >
                    <font-awesome-icon
                        :icon="{ prefix: 'fa', iconName: 'circle-xmark' }"
                    />
                </button>
            </div>
        </div>
    </section>
    <Modal
        @close="showImageModal = false"
        :show="showImageModal"
        :maxWidth="'5xl'"
    >
        <div class="flex items-center justify-center">
            <img loading="lazy" :src="modalImageUrl" :alt="modalImageAlt" />
        </div>
    </Modal>

    <Modal
        @close="showDeleteModal = false"
        :show="showDeleteModal"
        :maxWidth="'xl'"
    >
        <div class="p-8">
            <div class="flex w-full flex-col items-center justify-center">
                <h2 class="text-xl">¿Deseas eliminar la imágen?</h2>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteImage()"
                        >Eliminar</DangerButton
                    >
                    <SecondaryButton @click="handleCloseDeleteModal()"
                        >Cancelar</SecondaryButton
                    >
                </div>
            </div>
        </div>
    </Modal>
</template>

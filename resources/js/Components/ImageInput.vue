<script setup>
import { ref, onMounted, onUpdated } from "vue";
import DangerButton from "./DangerButton.vue";
import InputError from "./InputError.vue";
import { useForm } from "@inertiajs/vue3";
import Modal from "./Modal.vue";
import SecondaryButton from "./SecondaryButton.vue";
import DeleteButton from "./DeleteButton.vue";
import InfoButton from "./InfoButton.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faImage, faTriangleExclamation } from "@fortawesome/free-solid-svg-icons";

const props = defineProps({
    uploadImageRoute: {
        type: String,
        required: true,
    },
    deleteImageRoute: {
        type: String,
        required: true,
    },
    resourceId: {
        type: Number,
        required: true,
    },
    image: {
        type: Object,
    },
});

const resourceImageForm = useForm({
    id: props.resourceId,
    image: null,
});

const imageName = ref(null);
const imageSize = ref(null);
const showDeleteModal = ref(false);

onMounted(() => {
    if (props.image) {
        imageName.value = props.image.name;
        imageSize.value = (props.image.size_bytes / 1048576).toFixed(2) + " MB";

        resourceImageForm.image = props.image;
    }
});

onUpdated(() => {
    if (props.image) {
        imageName.value = props.image.name;
        imageSize.value = (props.image.size_bytes / 1048576).toFixed(2) + " MB";

        resourceImageForm.image = props.image;
    }
});

const handleImageChange = (event) => {
    // console.log(event.target.files[0])
    const image = event.target.files[0];

    handleSubmitImage(image);
};

const handleSubmitImage = (image) => {
    if (image) {
        resourceImageForm.image = image;
        resourceImageForm.post(props.uploadImageRoute, {
            onSuccess: () => {
                imageName.value = image.name;
                imageSize.value = (image.size / 1048576).toFixed(2) + " MB";
            },
        });
    }
};

const handleDeleteimage = () => {
    resourceImageForm.delete(props.deleteImageRoute, {
        onSuccess: () => handleCloseDeleteModal(),
        onFinish: () => {
            resourceImageForm.reset("image");
            imageName.value = null;
            imageSize.value = null;
        },
    });
    handleCloseDeleteModal();
};

const handleOpenDeleteModal = () => {
    showDeleteModal.value = true;
};

const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};
</script>

<template>
    <div class="flex items-center justify-center p-4">
        <div class="flex w-full flex-col items-center justify-center gap-y-2">
            <label
                for="upload-image-input"
                class="dark:hover:bg-bray-800 border-1 flex h-52 w-52 cursor-pointer flex-col items-center justify-center rounded-lg border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600"
            >
                <div
                    v-if="imageName || image"
                    class="flex h-full flex-col items-center justify-between text-ellipsis p-2"
                >
                    <FontAwesomeIcon
                        class="h-[50px] text-white"
                        :icon="faImage"
                    />
                    <div class="flex flex-col items-center">
                        <span
                            class="mb-2 break-all text-center text-sm font-semibold text-gray-500 dark:text-gray-400"
                        >
                            {{ imageName }}
                        </span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            ({{ imageSize }})
                        </p>
                    </div>
                    <div class="flex w-full items-center justify-center gap-6">
                        <DeleteButton @click="handleOpenDeleteModal" />
                    </div>
                </div>
                <div
                    v-else
                    class="flex h-full flex-col items-center justify-center gap-4 text-ellipsis p-4"
                >
                    <FontAwesomeIcon
                        class="h-[50px] text-white"
                        :icon="faImage"
                    />
                    <div class="flex flex-col items-center">
                        <span
                            class="mb-2 text-center text-sm font-semibold text-gray-500 dark:text-gray-400"
                        >
                            Click para buscar la imágen a subir
                        </span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Imágen (MAX. 2MB)
                        </p>
                    </div>
                </div>
                <form @submit.prevent="handleSubmitImage">
                    <input
                        @change="handleImageChange"
                        id="upload-image-input"
                        type="file"
                        class="hidden"
                        ref="resourceImageForm.image"
                        accept="image/*"
                    />
                </form>
            </label>
            <Transition
                enter-from-class="opacity-0"
                leave-to-class="opacity-0"
                class="transition ease-in-out"
            >
                <InputError
                    class="mt-2"
                    :message="resourceImageForm.errors.image"
                />
            </Transition>
        </div>

        <Modal
            @close="handleCloseDeleteModal"
            :show="showDeleteModal"
            :max-width="'lg'"
        >
            <div class="p-8">
                <div class="flex w-full flex-col items-center justify-center">
                    <FontAwesomeIcon
                        :icon="faTriangleExclamation"
                        class="mb-4 text-8xl text-neutral-900"
                    />
                    <h2 class="text-xl">¿Deseas eliminar el archivo?</h2>
                    <div class="mt-8 flex w-full justify-end gap-4">
                        <DangerButton @click="handleDeleteimage"
                            >Eliminar</DangerButton
                        >
                        <SecondaryButton @click="handleCloseDeleteModal"
                            >Cancelar</SecondaryButton
                        >
                    </div>
                </div>
            </div>
        </Modal>
    </div>
</template>

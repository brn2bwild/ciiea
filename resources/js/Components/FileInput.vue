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
import {
    faFile,
    faFileArrowUp,
    faTriangleExclamation,
} from "@fortawesome/free-solid-svg-icons";

const props = defineProps({
    uploadFileRoute: {
        type: String,
        required: true,
    },
    deleteFileRoute: {
        type: String,
        required: true,
    },
    resourceId: {
        type: Number,
        required: true,
    },
    file: {
        type: Object,
    },
});

const resourceFileForm = useForm({
    id: props.resourceId,
    file: null,
});

const fileName = ref(null);
const fileSize = ref(null);
const showDeleteModal = ref(false);

onMounted(() => {
    if (props.file) {
        fileName.value = props.file.name;
        fileSize.value = (props.file.size_bytes / 1048576).toFixed(2) + " MB";

        resourceFileForm.file = props.file;
    }
});

onUpdated(() => {
    if (props.file) {
        fileName.value = props.file.name;
        fileSize.value = (props.file.size_bytes / 1048576).toFixed(2) + " MB";

        resourceFileForm.file = props.file;
    }
});

const handleFileChange = (event) => {
    const file = event.target.files[0];

    handleSubmitFile(file);
};

const handleSubmitFile = (file) => {
    if (file) {
        resourceFileForm.file = file;

        resourceFileForm.post(props.uploadFileRoute, {
            onSuccess: () => {
                fileName.value = file.name;
                fileSize.value = (file.size / 1048576).toFixed(2) + " MB";
            },
        });
    }
};

const handleDeleteFile = () => {
    resourceFileForm.delete(props.deleteFileRoute, {
        onSuccess: () => handleCloseDeleteModal(),
        onFinish: () => {
            resourceFileForm.reset("file");
            fileName.value = null;
            fileSize.value = null;
        },
    });
    handleCloseDeleteModal();
};

const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};

const handleOpenDeleteModal = () => {
    showDeleteModal.value = true;
};
</script>

<template>
    <div class="flex items-center justify-center p-4">
        <div class="flex w-full flex-col items-center justify-center gap-y-2">
            <label
                for="upload-file-input"
                class="dark:hover:bg-bray-800 border-1 flex h-52 w-52 cursor-pointer flex-col items-center justify-center rounded-lg border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600"
            >
                <div
                    v-if="fileName || file"
                    class="flex h-full flex-col items-center justify-between text-ellipsis p-2"
                >
                    <FontAwesomeIcon
                        class="h-[50px] text-white"
                        :icon="faFile"
                    />
                    <div class="flex flex-col items-center">
                        <p
                            class="mb-2 break-all text-center text-sm font-semibold text-gray-500 dark:text-gray-400"
                        >
                            <span class="font-semibold">{{ fileName }}</span>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ "(" + fileSize + ")" }}
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
                        :icon="faFileArrowUp"
                    />
                    <div class="flex flex-col items-center">
                        <p
                            class="text-center text-sm text-gray-500 dark:text-gray-400"
                        >
                            <span class="font-semibold">Click para buscar</span>
                            el archivo a subir
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ fileType }} (MAX. 2MB)
                        </p>
                    </div>
                </div>
                <form @submit.prevent="handleSubmitFile">
                    <input
                        @change="handleFileChange"
                        id="upload-file-input"
                        type="file"
                        class="hidden"
                        ref="resourceFileForm.file"
                        accept=".pdf"
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
                    :message="resourceFileForm.errors.file"
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
                        <DangerButton @click="handleDeleteFile"
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

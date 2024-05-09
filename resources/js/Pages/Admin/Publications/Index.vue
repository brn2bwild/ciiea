<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ResourceCard from "@/Components/ResourceCard.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import PdfThumbnail from "@/Components/PdfThumbnail.vue";
import Pagination from "@/Components/Pagination.vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    publications: {
        type: Object,
        required: true,
    },
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const publicationCreateForm = useForm({
    title: "",
    publicated_at: "",
});
const publicationDeleteForm = useForm({
    id: null,
});

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};

const handleCreatePublication = () => {
    publicationCreateForm.post(route("admin.historical-publications.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () => publicationCreateForm.reset("title", "publicated_at"),
    });
};

const handleOpenDeleteModal = (id) => {
    publicationDeleteForm.id = id;
    showDeleteModal.value = true;
};

const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};

const handleDeletePublication = () => {
    publicationDeleteForm.delete(
        route("admin.historical-publications.destroy"),
        {
            onSuccess: () => handleCloseDeleteModal(),
            onFinish: () => publicationDeleteForm.reset("id"),
        }
    );
};
</script>
<template>
    <Head title="Publicaciones históricas" />
    <div class="flex justify-between px-8">
        <h1 class="text-3xl font-bold">Publicaciones Históricas</h1>
        <button
            @click="showCreateModal = true"
            class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200"
        >
            Nueva publicación
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <ResourceCard
                v-for="publication in publications.data"
                :key="publication.index"
                @open-delete-modal="handleOpenDeleteModal(publication.id)"
                :edit-route="
                    route('admin.historical-publications.edit', publication.id)
                "
            >
                <template #image>
                    <PdfThumbnail
                        v-if="publication.file"
                        :url="publication.file.path"
                        :scale="0.5"
                    />
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="default-image"
                        class="w-full"
                    />
                </template>
                <template #title>{{ publication.title }}...</template>
                <template #subtitle>{{ publication.publicated_at }}</template>
                <template #content>
                    <div class="flex justify-center gap-2">
                        <span class="px-1 bg-sky-200 rounded-full"
                            >Ciencia</span
                        >
                        <span class="px-1 bg-sky-200 rounded-full"
                            >Educación</span
                        >
                    </div>
                </template>
            </ResourceCard>
        </section>
        <Pagination :links="props.publications.links" class="mt-8 flex justify-center" />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreatePublication()">
                <div class="mt-4">
                    <InputLabel for="title" value="Nombre de la publicación" />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="publicationCreateForm.title"
                        required
                        autocomplete="title"
                    />
                    <InputError
                        class="mt-2"
                        :message="publicationCreateForm.errors.title"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel
                        for="publicated_at"
                        value="Fecha de publicación"
                    />
                    <TextInput
                        id="publicated_at"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="publicationCreateForm.publicated_at"
                        required
                        autocomplete="publicated_at"
                    />
                    <InputError
                        class="mt-2"
                        :message="publicationCreateForm.errors.publicated_at"
                    />
                </div>
                <div class="w-full flex justify-end mt-8 gap-4">
                    <PrimaryButton
                        :class="{
                            'opacity-25': publicationCreateForm.processing,
                        }"
                        :disabled="publicationCreateForm.processing"
                    >
                        Guardar
                    </PrimaryButton>
                    <SecondaryButton @click="handleCloseCreateModal()">
                        Cancelar
                    </SecondaryButton>
                </div>
            </form>
        </div>
    </Modal>

    <Modal
        @close="handleCloseDeleteModal"
        :show="showDeleteModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <div class="w-full flex flex-col justify-center items-center">
                <font-awesome-icon
                    :icon="['fa', 'triangle-exclamation']"
                    class="text-neutral-900 text-8xl mb-4"
                />
                <h2 class="text-xl">¿Deseas eliminar la publicación?</h2>
                <div class="w-full flex justify-end mt-4 gap-4">
                    <DangerButton @click="handleDeletePublication()"
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

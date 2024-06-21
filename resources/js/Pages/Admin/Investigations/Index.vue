<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
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
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faTriangleExclamation } from "@fortawesome/free-solid-svg-icons";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    investigations: {
        type: Object,
        required: true,
    },
});

const investigationDeleteForm = useForm({
    id: null,
});
const investigationCreateForm = useForm({
    title: "",
    authors: "",
    short_description: "",
    publicated_at: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};

const handleCreateInvestigation = () => {
    investigationCreateForm.post(route("admin.investigations.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () =>
            investigationCreateForm.reset(
                "title",
                "authors",
                "short_description",
                "publicated_at",
            ),
    });
};

const handleOpenDeleteModal = (id) => {
    investigationDeleteForm.id = id;
    showDeleteModal.value = true;
};

const handleCloseModal = () => {
    showDeleteModal.value = false;
};

const handleDeleteInvestigation = () => {
    investigationDeleteForm.delete(route("admin.investigations.destroy"), {
        onSuccess: () => handleCloseModal(),
        onFinish: () => investigationDeleteForm.reset("id"),
    });
};
</script>
<template>
    <Head title="Investigaciones" />
    <div class="flex justify-between px-8">
        <h1 class="text-3xl font-bold">Investigaciones</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nueva investigación
        </button>
    </div>
    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <ResourceCard
                v-for="investigation in investigations.data"
                :key="investigation.index"
                @open-delete-modal="handleOpenDeleteModal(investigation.id)"
                :edit-route="
                    route('admin.investigations.edit', investigation.id)
                "
            >
                <template #image>
                    <PdfThumbnail
                        v-if="investigation.file"
                        :url="investigation.file.path"
                        :scale="0.5"
                    />
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="default-image"
                        class="w-full"
                    />
                </template>
                <template #title>{{ investigation.title }}...</template>
                <template #subtitle>{{ investigation.publicated_at }}</template>
                <template #content>{{ investigation.authors }} </template>
            </ResourceCard>
        </section>
        <Pagination
            :links="props.investigations.links"
            class="mt-8 flex justify-center"
        />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateInvestigation()">
                <div class="mt-4">
                    <InputLabel
                        for="title"
                        value="Título de la investigación"
                    />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="investigationCreateForm.title"
                        required
                        autocomplete="title"
                    />
                    <InputError
                        class="mt-2"
                        :message="investigationCreateForm.errors.title"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel
                        for="authors"
                        value="Autor(es) de la investigación"
                    />
                    <TextInput
                        id="authors"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="investigationCreateForm.authors"
                        required
                        autocomplete="authors"
                    />
                    <InputError
                        class="mt-2"
                        :message="investigationCreateForm.errors.authors"
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
                        v-model="investigationCreateForm.publicated_at"
                        required
                        autocomplete="publicated_at"
                    />
                    <InputError
                        class="mt-2"
                        :message="investigationCreateForm.errors.publicated_at"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel
                        for="short_description"
                        value="Descripción breve"
                    />
                    <TextInput
                        id="short_description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="investigationCreateForm.short_description"
                        required
                        autocomplete="short_description"
                    />
                    <InputError
                        class="mt-2"
                        :message="
                            investigationCreateForm.errors.short_description
                        "
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{
                            'opacity-25': investigationCreateForm.processing,
                        }"
                        :disabled="investigationCreateForm.processing"
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

    <Modal @close="handleCloseModal" :show="showDeleteModal" :max-width="'lg'">
        <div class="p-4">
            <div class="flex w-full flex-col items-center justify-center">
                <FontAwesomeIcon
                    :icon="faTriangleExclamation"
                    class="mb-4 text-8xl text-neutral-900"
                />
                <h2 class="text-xl">¿Deseas eliminar la investigación?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteInvestigation"
                        >Eliminar</DangerButton
                    >
                    <SecondaryButton @click="handleCloseModal"
                        >Cancelar</SecondaryButton
                    >
                </div>
            </div>
        </div>
    </Modal>
</template>

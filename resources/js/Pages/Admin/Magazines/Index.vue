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

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    magazines: {
        type: Object,
        required: true,
    },
});

const magazineDeleteForm = useForm({
    id: null,
});

const magazineCreateForm = useForm({
    name: "",
    publicated_at: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};

const handleCreateMagazine = () => {
    magazineCreateForm.post(route("admin.magazines.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () => magazineCreateForm.reset("name", "publicated_at"),
    });
};

const handleOpenDeleteModal = (id) => {
    magazineDeleteForm.id = id;
    showDeleteModal.value = true;
};

const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};

const handleDeleteMagazine = () => {
    magazineDeleteForm.delete(route("admin.magazines.destroy"), {
        onSuccess: () => handleCloseDeleteModal(),
        onFinish: () => magazineDeleteForm.reset("id"),
    });
};
</script>

<template>
    <Head title="Revistas" />
    <div class="flex justify-between px-8">
        <h1 class="text-3xl font-bold">Revistas</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nueva revista
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <ResourceCard
                v-for="magazine in magazines.data"
                :key="magazine.index"
                @open-delete-modal="handleOpenDeleteModal(magazine.id)"
                :edit-route="route('admin.magazines.edit', magazine.id)"
            >
                <template #image>
                    <PdfThumbnail
                        v-if="magazine.file"
                        :url="magazine.file.path"
                        :scale="0.5"
                    />
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="default-image"
                        class="w-full"
                    />
                </template>
                <template #title>{{ magazine.name }}...</template>
                <template #subtitle>{{ magazine.publicated_at }}</template>
                <template #content>
                    <div class="flex justify-center gap-2">
                        <span class="rounded-full bg-sky-200 px-1"
                            >Ciencia</span
                        >
                        <span class="rounded-full bg-sky-200 px-1"
                            >Educación</span
                        >
                    </div>
                </template>
            </ResourceCard>
        </section>
        <Pagination
            :links="$props.magazines.links"
            class="mt-8 flex justify-center"
        />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateMagazine()">
                <div class="mt-4">
                    <InputLabel for="name" value="Nombre de la revista" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="magazineCreateForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError
                        class="mt-2"
                        :message="magazineCreateForm.errors.name"
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
                        v-model="magazineCreateForm.publicated_at"
                        required
                        autocomplete="publicated_at"
                    />
                    <InputError
                        class="mt-2"
                        :message="magazineCreateForm.errors.publicated_at"
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': magazineCreateForm.processing }"
                        :disabled="magazineCreateForm.processing"
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
            <div class="flex w-full flex-col items-center justify-center">
                <font-awesome-icon
                    :icon="['fa', 'triangle-exclamation']"
                    class="mb-4 text-8xl text-neutral-900"
                />
                <h2 class="text-xl">¿Deseas eliminar la revista?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteMagazine()"
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

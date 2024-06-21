<script setup>
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ResourceCard from "@/Components/ResourceCard.vue";
import { ref } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faTriangleExclamation } from "@fortawesome/free-solid-svg-icons";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    software_resources: {
        type: Object,
        required: true,
    },
});

const softwareForm = useForm({
    id: null,
});
const softwareCreateForm = useForm({
    name: "",
    description: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};
const handleCreateSoftware = () => {
    softwareCreateForm.post(route("admin.software.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () => softwareCreateForm.reset("name", "description"),
    });
};

const handleOpenDeleteModal = (id) => {
    softwareForm.id = id;
    showDeleteModal.value = true;
};
const handleCloseModal = () => {
    showDeleteModal.value = false;
};
const handleDeleteSoftware = () => {
    softwareForm.delete(route("admin.software.destroy"), {
        onSuccess: () => handleCloseModal(),
        onFinish: () => softwareForm.reset("id"),
    });
};
</script>
<template>
    <Head title="Software Educativo" />
    <div class="flex items-center justify-between px-8">
        <h1 class="text-3xl font-bold">Software Educativo</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nuevo software
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <ResourceCard
                v-for="software_resource in software_resources.data"
                :key="software_resource.index"
                @open-delete-modal="handleOpenDeleteModal(software_resource.id)"
                :edit-route="route('admin.software.edit', software_resource.id)"
                :image-path="
                    software_resource.image !== null
                        ? software_resource.image.path
                        : null
                "
            >
                <template #image>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-24 w-24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"
                        />
                    </svg>
                </template>
                <template #title>{{ software_resource.name }}</template>
                <template #subtitle></template>
                <template #content>{{
                    software_resource.description
                }}</template>
            </ResourceCard>
        </section>
        <Pagination
            :links="props.software_resources.links"
            class="mt-8 flex justify-center"
        />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateSoftware()">
                <div class="mt-4">
                    <InputLabel for="name" value="Nombre del software" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="softwareCreateForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError
                        class="mt-2"
                        :message="softwareCreateForm.errors.name"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="description" value="Descripción" />
                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="softwareCreateForm.description"
                        required
                        autocomplete="description"
                    />
                    <InputError
                        class="mt-2"
                        :message="softwareCreateForm.errors.description"
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': softwareCreateForm.processing }"
                        :disabled="softwareCreateForm.processing"
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
                <h2 class="text-xl">¿Deseas eliminar el software?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteSoftware()">
                        Eliminar
                    </DangerButton>
                    <SecondaryButton @click="handleCloseModal()">
                        Cancelar
                    </SecondaryButton>
                </div>
            </div>
        </div>
    </Modal>
</template>

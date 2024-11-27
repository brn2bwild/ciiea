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
    resources: {
        type: Object,
        required: true,
    },
});

const resourceForm = useForm({
    id: null,
});
const resourceCreateForm = useForm({
    name: "",
    description: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};
const handleCreateSoftware = () => {
    resourceCreateForm.post(route("admin.vinculation-documents.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () => resourceCreateForm.reset("name", "description"),
    });
};

const handleOpenDeleteModal = (id) => {
    resourceForm.id = id;
    showDeleteModal.value = true;
};
const handleCloseModal = () => {
    showDeleteModal.value = false;
};
const handleDeleteresource = () => {
    resourceForm.delete(route("admin.vinculation-documents.destroy"), {
        onSuccess: () => handleCloseModal(),
        onFinish: () => resourceForm.reset("id"),
    });
};
</script>
<template>
    <Head title="Infografías" />
    <div class="flex items-center justify-between px-8">
        <h1 class="text-3xl font-bold">Infografías</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nuevo recurso
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <ResourceCard
                v-for="resource in resources.data"
                :key="resource.index"
                @open-delete-modal="handleOpenDeleteModal(resource.id)"
                :edit-route="
                    route('admin.vinculation-documents.edit', resource.id)
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
                            d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13"
                        />
                    </svg>
                </template>
                <template #title>{{ resource.name }}</template>
                <template #subtitle></template>
                <template #content>{{ resource.description }}</template>
            </ResourceCard>
        </section>
        <Pagination
            :links="props.resources.links"
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
                    <InputLabel for="name" value="Nombre del recurso" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="resourceCreateForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError
                        class="mt-2"
                        :message="resourceCreateForm.errors.name"
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': resourceCreateForm.processing }"
                        :disabled="resourceCreateForm.processing"
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
                <h2 class="text-xl">¿Deseas eliminar el recurso?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteresource()">
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

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
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

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    infographics: {
        type: Object,
        required: true,
    },
});

const infographicForm = useForm({
    id: null,
});
const infographicCreateForm = useForm({
    name: "",
    description: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};
const handleCreateSoftware = () => {
    infographicCreateForm.post(route("admin.infographics.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () => infographicCreateForm.reset("name", "description"),
    });
};

const handleOpenDeleteModal = (id) => {
    infographicForm.id = id;
    showDeleteModal.value = true;
};
const handleCloseModal = () => {
    showDeleteModal.value = false;
};
const handleDeleteInfographic = () => {
    infographicForm.delete(route("admin.infographics.destroy"), {
        onSuccess: () => handleCloseModal(),
        onFinish: () => infographicForm.reset("id"),
    });
};
</script>
<template>
    <Head title="Infografías" />
    <div class="flex justify-between items-center px-8">
        <h1 class="text-3xl font-bold">Infografías</h1>
        <button
            @click="showCreateModal = true"
            class="bg-sky-500 rounded-full px-4 py-2 text-neutral-50 font-medium hover:bg-sky-700 transition-all duration-200"
        >
            Nueva infografía
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <ResourceCard
                v-for="infographic in infographics.data"
                :key="infographic.index"
                @open-delete-modal="handleOpenDeleteModal(infographic.id)"
                :edit-route="route('admin.infographics.edit', infographic.id)"
                :image-path="
                    infographic.image !== null ? infographic.image.path : null
                "
            >
                <template #image>
                    <img
                        v-if="infographic.image"
                        :src="infographic.image.path"
                        alt="convocation-image"
                    />
                    <img
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="default-image"
                        class="w-full"
                    />
                </template>
                <template #title class="truncate">{{
                    infographic.title
                }}</template>
                <template #subtitle></template>
                <template #content></template>
            </ResourceCard>
        </section>
        <Pagination :links="props.infographics.links" class="mt-8 flex justify-center" />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateSoftware()">
                <div class="mt-4">
                    <InputLabel for="title" value="Título de la infografía" />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="infographicCreateForm.title"
                        required
                        autocomplete="title"
                    />
                    <InputError
                        class="mt-2"
                        :message="infographicCreateForm.errors.title"
                    />
                </div>
                <div class="w-full flex justify-end mt-8 gap-4">
                    <PrimaryButton
                        :class="{
                            'opacity-25': infographicCreateForm.processing,
                        }"
                        :disabled="infographicCreateForm.processing"
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
            <div class="w-full flex flex-col justify-center items-center">
                <font-awesome-icon
                    :icon="['fa', 'triangle-exclamation']"
                    class="text-neutral-900 text-8xl mb-4"
                />
                <h2 class="text-xl">¿Deseas eliminar la infografía?</h2>
                <div class="w-full flex justify-end mt-4 gap-4">
                    <DangerButton @click="handleDeleteInfographic()">
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

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
    infographics: {
        type: Object,
        required: true,
    },
});

const infographicForm = useForm({
    id: null,
});
const infographicCreateForm = useForm({
    title: "",
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
    <div class="flex items-center justify-between px-8">
        <h1 class="text-3xl font-bold">Infografías</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nueva infografía
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
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
                        class="h-full w-full"
                        :src="
                            '/storage/' +
                            (infographic.image
                                ? infographic.image.path
                                : 'images/bookshelve-optimized.jpg')
                        "
                        alt="infographics-image"
                    />
                </template>
                <template #title>{{ infographic.title }}</template>
                <template #subtitle></template>
                <template #content></template>
            </ResourceCard>
        </section>
        <Pagination
            :links="props.infographics.links"
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
                <div class="mt-8 flex w-full justify-end gap-4">
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
            <div class="flex w-full flex-col items-center justify-center">
                <FontAwesomeIcon
                    :icon="faTriangleExclamation"
                    class="mb-4 text-8xl text-neutral-900"
                />
                <h2 class="text-xl">¿Deseas eliminar la infografía?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
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

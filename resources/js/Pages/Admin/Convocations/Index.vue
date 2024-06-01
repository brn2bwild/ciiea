<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref } from "vue";
import { Head, useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ResourceCard from "@/Components/ResourceCard.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/Components/Pagination.vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    convocations: {
        type: Object,
        required: true,
    },
});

const convocationForm = useForm({
    id: null,
});
const convocationCreateForm = useForm({
    name: "",
    date: "",
    time: "",
    location: "",
    description: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};

const handleCreateConvocation = () => {
    convocationCreateForm.post(route("admin.convocations.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () =>
            convocationCreateForm.reset(
                "name",
                "location",
                "date",
                "time",
                "description",
            ),
    });
};

const handleOpenDeleteModal = (id) => {
    convocationForm.id = id;
    showDeleteModal.value = true;
};

const handleCloseModal = () => {
    showDeleteModal.value = false;
};

const handleDeleteConvocation = () => {
    convocationForm.delete(route("admin.convocations.destroy"), {
        onSuccess: () => handleCloseModal(),
        onFinish: () => convocationForm.reset("id"),
    });
};
</script>
<template>
    <Head title="Convocatorias" />
    <div class="flex justify-between px-8">
        <h1 class="text-3xl font-bold">Convocatorias</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nueva convocatoria
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <ResourceCard
                v-for="convocation in convocations.data"
                :key="convocation.index"
                @open-delete-modal="handleOpenDeleteModal(convocation.id)"
                :edit-route="route('admin.convocations.edit', convocation.id)"
                :image-path="
                    convocation.image !== null ? convocation.image.path : null
                "
            >
                <template #image>
                    <img
                        class="h-full w-full object-cover"
                        :src="
                            '/storage/' +
                            (convocation.image
                                ? convocation.image.path
                                : 'images/bookshelve-optimized.jpg')
                        "
                        alt="convocation-image"
                    />
                </template>
                <template #title>{{ convocation.name }}...</template>
                <template #subtitle>{{ convocation.date }}</template>
                <template #content
                    >{{ convocation.location.substr(1, 20) }}...
                </template>
            </ResourceCard>
        </section>
        <Pagination
            :links="props.convocations.links"
            class="mt-8 flex justify-center"
        />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateConvocation()">
                <div class="mt-4">
                    <InputLabel for="name" value="Nombre de la convocatoria" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="convocationCreateForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationCreateForm.errors.name"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="location" value="Ubicación" />
                    <TextInput
                        id="location"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="convocationCreateForm.location"
                        required
                        autocomplete="location"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationCreateForm.errors.location"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="date" value="Fecha de la convocatoria" />
                    <TextInput
                        id="date"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="convocationCreateForm.date"
                        required
                        autocomplete="date"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationCreateForm.errors.date"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="time" value="Hora de la convocatoria" />
                    <TextInput
                        id="time"
                        type="time"
                        class="mt-1 block w-full"
                        v-model="convocationCreateForm.time"
                        required
                        autocomplete="time"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationCreateForm.errors.time"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="description" value="Descripción breve" />
                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="convocationCreateForm.description"
                        required
                        autocomplete="description"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationCreateForm.errors.description"
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{
                            'opacity-25': convocationCreateForm.processing,
                        }"
                        :disabled="convocationCreateForm.processing"
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
                <font-awesome-icon
                    :icon="['fa', 'triangle-exclamation']"
                    class="mb-4 text-8xl text-neutral-900"
                />
                <h2 class="text-xl">¿Deseas eliminar la convocatoria?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteConvocation()"
                        >Eliminar</DangerButton
                    >
                    <SecondaryButton @click="handleCloseModal()"
                        >Cancelar</SecondaryButton
                    >
                </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
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
import UserCard from "@/Components/UserCard.vue";
import Pagination from "@/Components/Pagination.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faTriangleExclamation } from "@fortawesome/free-solid-svg-icons";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    administrators: {
        type: Object,
        required: true,
    },
});

const administratorCreateForm = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const administratorDeleteForm = useForm({
    id: null,
});

const showCreateModal = ref(false);
const showDeleteModal = ref(false);

const handleOpenDeleteModal = (id) => {
    administratorDeleteForm.id = id;
    showDeleteModal.value = true;
};

const handleDeleteAdministrator = () => {
    administratorDeleteForm.delete(route("admin.administrators.destroy"), {
        onSuccess: () => handleCloseDeleteModal(),
        onFinish: () => administratorDeleteForm.reset("id"),
    });
};

const handleCreateAdministrator = () => {
    administratorCreateForm.post(route("admin.administrators.store"), {
        onSuccess: () => {
            showCreateModal.value = false;
            administratorCreateForm.reset(
                "name",
                "email",
                "password",
                "password_confirmation",
            );
        },
    });
};

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};
const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};
</script>

<template>
    <Head title="Administradores" />
    <div class="flex items-center justify-between px-8">
        <h1 class="text-3xl font-bold">Administradores</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nuevo administrador
        </button>
    </div>

    <div class="w-full p-8">
        <section class="flex w-full flex-col gap-4">
            <UserCard
                v-for="administrator in props.administrators.data"
                :key="administrator.index"
                @open-delete-modal="handleOpenDeleteModal(administrator.id)"
                :edit-route="
                    route('admin.administrators.edit', administrator.id)
                "
                :avartar-url="
                    administrator.image
                        ? route('profile-images.show', administrator.image.name)
                        : null
                "
            >
                <template #name>{{ administrator.name }}</template>
                <template #data>{{ administrator.email }}</template>
                <template #contact>{{ administrator.mobile }}</template>
            </UserCard>
        </section>
        <Pagination
            :links="props.administrators.links"
            class="mt-8 flex justify-center"
        />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateAdministrator()">
                <div class="mt-4">
                    <InputLabel for="name" value="Nombre del administrador" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="administratorCreateForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorCreateForm.errors.name"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="email" value="Correo electrónico" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="administratorCreateForm.email"
                        required
                        autocomplete="email"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorCreateForm.errors.email"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="administratorCreateForm.password"
                        required
                        autocomplete="password"
                    />
                    <InputError
                        class="mt-2"
                        :message="administratorCreateForm.errors.password"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirmar contraseña"
                    />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="administratorCreateForm.password_confirmation"
                        required
                        autocomplete="password_confirmation"
                    />
                    <InputError
                        class="mt-2"
                        :message="
                            administratorCreateForm.errors.password_confirmation
                        "
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{
                            'opacity-25': administratorCreateForm.processing,
                        }"
                        :disabled="administratorCreateForm.processing"
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
                <FontAwesomeIcon
                    :icon="faTriangleExclamation"
                    class="mb-4 text-8xl text-neutral-900"
                />
                <h2 class="text-xl">¿Deseas eliminar el usuario?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteAdministrator()">
                        Eliminar
                    </DangerButton>
                    <SecondaryButton @click="handleCloseDeleteModal()">
                        Cancelar
                    </SecondaryButton>
                </div>
            </div>
        </div>
    </Modal>
</template>

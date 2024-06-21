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
import PdfThumbnail from "@/Components/PdfThumbnail.vue";
import Pagination from "@/Components/Pagination.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faTriangleExclamation } from "@fortawesome/free-solid-svg-icons";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    books: {
        type: Object,
        required: true,
    },
});

const bookDeleteForm = useForm({
    id: null,
});

const bookCreateForm = useForm({
    title: "",
    authors: "",
    isbn: "",
    publicated_at: "",
});

const showDeleteModal = ref(false);
const showCreateModal = ref(false);

const handleCloseCreateModal = () => {
    showCreateModal.value = false;
};

const handleCreateBook = () => {
    bookCreateForm.post(route("admin.books.store"), {
        onSuccess: () => (showCreateModal.value = false),
        onFinish: () =>
            bookCreateForm.reset("name", "authors", "isbn", "publicated_at"),
    });
};

const handleOpenDeleteModal = (id) => {
    bookDeleteForm.id = id;
    showDeleteModal.value = true;
};

const handleCloseDeleteModal = () => {
    showDeleteModal.value = false;
};

const handleDeleteBook = () => {
    bookDeleteForm.delete(route("admin.books.destroy"), {
        onSuccess: () => handleCloseDeleteModal(),
        onFinish: () => bookDeleteForm.reset("id"),
    });
};
</script>

<template>
    <Head title="Libros" />
    <div class="flex items-center justify-between px-8">
        <h1 class="text-3xl font-bold">Libros</h1>
        <button
            @click="showCreateModal = true"
            class="rounded-full bg-sky-500 px-4 py-2 font-medium text-neutral-50 transition-all duration-200 hover:bg-sky-700"
        >
            Nuevo libro
        </button>
    </div>

    <div class="w-full p-8">
        <section class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <ResourceCard
                v-for="book in books.data"
                :key="book.index"
                @open-delete-modal="handleOpenDeleteModal(book.id)"
                :edit-route="route('admin.books.edit', book.id)"
            >
                <template #image>
                    <PdfThumbnail
                        v-if="book.file"
                        :url="book.file.path"
                        :scale="0.5"
                    />
                    <img
                        class="w-full"
                        v-else
                        src="/storage/images/bookshelve-optimized.jpg"
                        alt="book-image"
                    />
                </template>
                <template #title>{{ book.title }}</template>
                <template #subtitle>{{ book.authors }}</template>
                <template #content>{{ book.publicated_at }}</template>
            </ResourceCard>
        </section>
        <Pagination
            :links="$props.books.links"
            class="mt-8 flex justify-center"
        />
    </div>

    <Modal
        @close="handleCloseCreateModal"
        :show="showCreateModal"
        :max-width="'lg'"
    >
        <div class="p-4">
            <form @submit.prevent="handleCreateBook()">
                <div class="mt-4">
                    <InputLabel for="title" value="Nombre del libro" />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="bookCreateForm.title"
                        required
                        autocomplete="title"
                    />
                    <InputError
                        class="mt-2"
                        :message="bookCreateForm.errors.title"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="authors" value="Autor(es) del libro" />
                    <TextInput
                        id="authors"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="bookCreateForm.authors"
                        required
                        autocomplete="authors"
                    />
                    <InputError
                        class="mt-2"
                        :message="bookCreateForm.errors.authors"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="isbn" value="ISBN" />
                    <TextInput
                        id="isbn"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="bookCreateForm.isbn"
                        required
                        autocomplete="isbn"
                    />
                    <InputError
                        class="mt-2"
                        :message="bookCreateForm.errors.isbn"
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
                        v-model="bookCreateForm.publicated_at"
                        required
                        autocomplete="publicated_at"
                    />
                    <InputError
                        class="mt-2"
                        :message="bookCreateForm.errors.publicated_at"
                    />
                </div>
                <div class="mt-8 flex w-full justify-end gap-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': bookCreateForm.processing }"
                        :disabled="bookCreateForm.processing"
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
                <h2 class="text-xl">¿Deseas eliminar el libro?</h2>
                <div class="mt-4 flex w-full justify-end gap-4">
                    <DangerButton @click="handleDeleteBook()">
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

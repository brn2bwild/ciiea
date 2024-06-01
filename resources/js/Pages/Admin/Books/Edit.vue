<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import FileInput from "@/Components/FileInput.vue";
import InputError from "@/Components/InputError.vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    book: {
        type: Object,
        required: true,
    },
});

const bookForm = useForm({
    id: props.book.id,
    title: props.book.title,
    authors: props.book.authors,
    isbn: props.book.isbn,
    publicated_at: props.book.publicated_at,
});

const handleUpdateBook = () => {
    bookForm.patch(route("admin.books.update"));
};
</script>

<template>
    <Head title="Libro" />
    <h1 class="pl-8 text-3xl font-bold">Editar libro</h1>
    <div class="w-full p-8">
        <section class="flex w-full justify-between rounded bg-white p-8">
            <form @submit.prevent="handleUpdateBook" class="w-3/4">
                <div>
                    <InputLabel for="title" value="Título del libro" />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="bookForm.title"
                        required
                        autofocus
                        autocomplete="book_title"
                    />
                    <InputError class="mt-2" :message="bookForm.errors.title" />
                </div>
                <div class="mt-4">
                    <InputLabel for="authors" value="Autor(es)" />
                    <TextInput
                        id="book_authors"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="bookForm.authors"
                        required
                        autocomplete="authors"
                    />
                    <InputError
                        class="mt-2"
                        :message="bookForm.errors.authors"
                    />
                </div>
                <div class="mt-4 flex justify-between gap-x-4">
                    <div class="w-1/2">
                        <InputLabel for="isbn" value="ISBN" />
                        <TextInput
                            id="book_isbn"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="bookForm.isbn"
                            required
                            autocomplete="isbn"
                        />
                        <InputError
                            class="mt-2"
                            :message="bookForm.errors.isbn"
                        />
                    </div>
                    <div class="w-1/2">
                        <InputLabel
                            for="publicated_at"
                            value="Fecha de publicación"
                        />
                        <TextInput
                            id="book_publicated_at"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="bookForm.publicated_at"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="bookForm.errors.publicated_at"
                        />
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <PrimaryButton :disabled="bookForm.processing"
                        >Guardar</PrimaryButton
                    >
                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="bookForm.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Guardado.
                        </p>
                    </Transition>
                </div>
            </form>
            <FileInput
                :resource-id="book.id"
                :file="book.file"
                :upload-file-route="route('admin.books.upload-file')"
                :delete-file-route="route('admin.books.delete-file')"
                class="w-1/4"
            />
            <!-- <PdfViewer :url="book.file.path" /> -->
        </section>
    </div>
</template>

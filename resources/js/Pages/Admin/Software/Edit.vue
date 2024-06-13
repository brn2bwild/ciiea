<script setup>
import FileInput from "@/Components/FileInput.vue";
import ImageInput from "@/Components/ImageInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    software: {
        type: Object,
        required: true,
    },
});

const softwareForm = useForm({
    id: props.software.data.id,
    name: props.software.data.name,
    url: props.software.data.url,
    description: props.software.data.description,
});

const handleUpdateSoftware = () => {
    softwareForm.patch(route("admin.software.update"));
};
</script>
<template>
    <Head title="Software Educativo" />
    <h1 class="pl-8 text-3xl font-bold">Editar software</h1>
    <div class="w-full p-8">
        <section class="flex w-full justify-evenly">
            <ImageInput
                :resource-id="props.software.data.id"
                :image="props.software.data.image"
                :upload-image-route="route('admin.software.upload-image')"
                :delete-image-route="route('admin.software.delete-image')"
                class="w-1/4"
            />
            <FileInput
                :resource-id="props.software.data.id"
                :file="props.software.data.file"
                :upload-file-route="route('admin.software.upload-file')"
                :delete-file-route="route('admin.software.delete-file')"
            />
        </section>
    </div>
    <section class="flex w-full justify-between rounded bg-white p-8">
        <form @submit.prevent="handleUpdateSoftware" class="w-full">
            <div>
                <InputLabel for="name" value="Nombre del software" />
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="softwareForm.name"
                    required
                    autofocus
                    autocomplete="software_name"
                />
                <InputError class="mt-2" :message="softwareForm.errors.name" />
            </div>
            <div class="mt-4">
                <InputLabel for="description" value="Descripción" />
                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="softwareForm.description"
                    required
                    autofocus
                    autocomplete="software_description"
                />
                <InputError
                    class="mt-2"
                    :message="softwareForm.errors.description"
                />
            </div>
            <div class="mt-4">
                <InputLabel for="url" value="Link de descarga" />
                <TextInput
                    id="url"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="softwareForm.url"
                    required
                    autofocus
                    autocomplete="software_url"
                />
                <InputError class="mt-2" :message="softwareForm.errors.url" />
            </div>
            <div class="mt-4 flex items-center gap-4">
                <PrimaryButton :disabled="softwareForm.processing"
                    >Guardar</PrimaryButton
                >
                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="softwareForm.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Guardado.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>

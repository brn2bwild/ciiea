<script setup>
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import FileInput from "@/Components/FileInput.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    resource: {
        type: Object,
        required: true,
    },
});

const resourceForm = useForm({
    id: props.resource.id,
    name: props.resource.name,
    description: props.resource.description,
});

const handleUpdateResource = () => {
    resourceForm.patch(route("admin.vinculation-documents.update"));
};
</script>
<template>
    <Head title="Recursos" />
    <h1 class="pl-8 text-3xl font-bold">Editar recurso</h1>
    <div class="w-full p-8">
        <section class="flex w-full justify-between rounded bg-white p-8">
            <form @submit.prevent="handleUpdateResource" class="w-3/4">
                <div>
                    <InputLabel for="name" value="Nombre del recurso" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="resourceForm.name"
                        required
                        autofocus
                        autocomplete="software_name"
                    />
                    <InputError
                        class="mt-2"
                        :message="resourceForm.errors.name"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="description" value="Descripción" />
                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="resourceForm.description"
                        required
                        autofocus
                        autocomplete="convocation_description"
                    />
                    <InputError
                        class="mt-2"
                        :message="resourceForm.errors.description"
                    />
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <PrimaryButton :disabled="resourceForm.processing"
                        >Guardar</PrimaryButton
                    >
                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="resourceForm.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Guardado.
                        </p>
                    </Transition>
                </div>
            </form>
            <FileInput
                :resource-id="resource.id"
                :file="resource.file"
                :upload-file-route="
                    route('admin.vinculation-documents.upload-file')
                "
                :delete-file-route="
                    route('admin.vinculation-documents.delete-file')
                "
                class="w-1/4"
            />
        </section>
    </div>
</template>

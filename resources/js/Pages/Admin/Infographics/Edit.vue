<script setup>
import ImageInput from "@/Components/ImageInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    infographic: {
        type: Object,
        required: true,
    },
});

const infographicForm = useForm({
    id: props.infographic.id,
    title: props.infographic.title,
});

const handleUpdateInfographic = () => {
    infographicForm.patch(route("admin.infographics.update"));
};
</script>
<template>
    <Head title="Infografías" />
    <h1 class="pl-8 text-3xl font-bold">Editar infografía</h1>
    <div class="w-full p-8">
        <section class="flex w-full justify-between rounded bg-white p-8">
            <form @submit.prevent="handleUpdateInfographic" class="w-3/4">
                <div>
                    <InputLabel for="title" value="Título de la infografía" />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="infographicForm.title"
                        required
                        autofocus
                        autocomplete="software_title"
                    />
                    <InputError
                        class="mt-2"
                        :message="infographicForm.errors.title"
                    />
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <PrimaryButton :disabled="infographicForm.processing"
                        >Guardar</PrimaryButton
                    >
                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="infographicForm.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Guardado.
                        </p>
                    </Transition>
                </div>
            </form>
            <ImageInput
                :image="infographic.image"
                :resource-id="infographic.id"
                :upload-image-route="route('admin.infographics.upload-image')"
                :delete-image-route="route('admin.infographics.delete-image')"
                class="w-1/4"
            />
        </section>
    </div>
</template>

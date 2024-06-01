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
    convocation: {
        type: Object,
        required: true,
    },
});

const convocationForm = useForm({
    id: props.convocation.id,
    name: props.convocation.name,
    date: new Date(props.convocation.date_time).toISOString().substring(-1, 10),
    time: new Date(props.convocation.date_time)
        .toLocaleTimeString()
        .substring(-1, 5),
    location: props.convocation.location,
    description: props.convocation.description,
});

const handleUpdateConvocation = () => {
    convocationForm.patch(route("admin.convocations.update"));
};
</script>
<template>
    <Head title="Convocatoria" />
    <h1 class="pl-8 text-3xl font-bold">Editar revista</h1>
    <div class="w-full p-8">
        <section class="flex w-full justify-between rounded bg-white p-8">
            <form @submit.prevent="handleUpdateConvocation" class="w-3/4">
                <div>
                    <InputLabel for="name" value="Nombre de la convocatoria" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="convocationForm.name"
                        required
                        autofocus
                        autocomplete="convocation_name"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationForm.errors.name"
                    />
                </div>
                <div class="mt-4 flex justify-between gap-x-4">
                    <div class="w-1/2">
                        <InputLabel for="date" value="Fecha" />
                        <TextInput
                            id="convocation_date"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="convocationForm.date"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="convocationForm.errors.date"
                        />
                    </div>
                    <div class="w-1/2">
                        <InputLabel for="time" value="Hora" />
                        <TextInput
                            id="convocation_time"
                            type="time"
                            class="mt-1 block w-full"
                            v-model="convocationForm.time"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="convocationForm.errors.time"
                        />
                    </div>
                </div>
                <div class="mt-4">
                    <InputLabel for="location" value="Locación" />
                    <TextInput
                        id="location"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="convocationForm.location"
                        required
                        autofocus
                        autocomplete="convocation_location"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationForm.errors.location"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="description" value="Descripción" />
                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="convocationForm.description"
                        required
                        autofocus
                        autocomplete="convocation_description"
                    />
                    <InputError
                        class="mt-2"
                        :message="convocationForm.errors.description"
                    />
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <PrimaryButton :disabled="convocationForm.processing"
                        >Guardar</PrimaryButton
                    >
                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="convocationForm.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Guardado.
                        </p>
                    </Transition>
                </div>
            </form>
            <ImageInput
                :image="convocation.image"
                :resource-id="convocation.id"
                :upload-image-route="route('admin.convocations.upload-image')"
                :delete-image-route="route('admin.convocations.delete-image')"
                class="w-1/4"
            />
        </section>
    </div>
</template>

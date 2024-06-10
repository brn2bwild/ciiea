<script setup>
import AvatarInput from "@/Components/AvatarInput.vue";
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
    user: {
        type: Object,
        required: true,
    },
});

const userForm = useForm({
    id: props.user.id,
    name: props.user.name,
    email: props.user.email,
    mobile: props.user.mobile,
    long_description: props.user.long_description,
});

const handleUpdateUser = () => {};
</script>
<template>
    <Head title="Usuario" />
    <h1 class="pl-8 text-3xl font-bold">Editar usuario</h1>
    <div class="flex w-full p-8">
        <section class="flex w-full justify-between rounded bg-white p-8">
            <form @submit.prevent="handleUpdateUser()" class="w-full">
                <div>
                    <InputLabel for="name" value="Nombre del administrador" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="userForm.name"
                        required
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="userForm.errors.name" />
                </div>
                <div class="mt-4">
                    <InputLabel for="email" value="Correo electrónico" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="userForm.email"
                        required
                        autocomplete="email"
                    />
                    <InputError class="mt-2" :message="userForm.errors.email" />
                </div>
                <div class="mt-4">
                    <InputLabel for="mobile" value="Número telefónico" />
                    <TextInput
                        id="mobile"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="userForm.mobile"
                        required
                        autocomplete="mobile"
                    />
                    <InputError
                        class="mt-2"
                        :message="userForm.errors.mobile"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="long_description" value="Descripción" />
                    <TextInput
                        id="long_description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="userForm.long_description"
                        autocomplete="long_description"
                    />
                    <InputError
                        class="mt-2"
                        :message="userForm.errors.long_description"
                    />
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <PrimaryButton :disabled="userForm.processing"
                        >Guardar</PrimaryButton
                    >
                    <Transition
                        enter-from-class="opacity-0"
                        leave-to-class="opacity-0"
                        class="transition ease-in-out"
                    >
                        <p
                            v-if="userForm.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Guardado.
                        </p>
                    </Transition>
                </div>
            </form>
            <AvatarInput
                :avatar-url="
                    props.user.image
                        ? route('profile-images.show', props.user.image.name)
                        : null
                "
                :user-id="props.user.id"
                :upload-image-route="route('admin.users.upload-image')"
                class="ml-8 w-full md:w-1/2"
            />
        </section>
    </div>
</template>

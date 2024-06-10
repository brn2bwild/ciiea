<script setup>
import Pagination from "@/Components/Pagination.vue";
import UserCard from "@/Components/UserCard.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
    layout: AdminLayout,
});

const props = defineProps({
    users: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    <Head title="Usuarios" />
    <div class="flex justify-between px-8">
        <h1 class="text-3xl font-bold">Usuarios</h1>
    </div>
    <div class="w-full p-8">
        <section class="flex w-full flex-col gap-4">
            <UserCard
                v-for="user in props.users.data"
                :key="user.index"
                @open-delete-modal="handleOpenDeleteModal(user.id)"
                :edit-route="route('admin.users.edit', user.id)"
                :avartar-url="user.image ? route('profile-images.show', user.image.name) : null"
            >
                <template #name>{{ user.name }}</template>
                <template #data>{{ user.email }}</template>
                <template #contact>{{ user.mobile }}</template>
            </UserCard>
        </section>
        <Pagination
            :links="props.users.links"
            class="mt-8 flex justify-center"
        />
    </div>
</template>

<script setup>
const props = defineProps({
    editRoute: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["openDeleteModal"]);

const openModal = (event) => {
    event.preventDefault();
    emit("openDeleteModal");
};
</script>

<template>
    <div class="rounded-lg border border-gray-300 bg-white p-4">
        <slot name="name" />
        <a :href="props.editRoute">Editar</a>
        <button @click="openModal">Eliminar</button>
    </div>
</template>

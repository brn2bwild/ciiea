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
    <div class="bg-white border-gray-300 border p-4 rounded-lg">
        <slot name="name" />
        <a :href="props.editRoute">Editar</a>
        <button @click="openModal">Eliminar</button>
    </div>
</template>

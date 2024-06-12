<script setup>
import { defineProps, defineEmits } from "vue";
import DeleteButton from "./DeleteButton.vue";
import EditButton from "./EditButton.vue";

const props = defineProps({
    editRoute: {
        type: String,
        required: true,
    },
    imagePath: {
        type: String,
        required: false,
    },
});

const emit = defineEmits(["openDeleteModal"]);

const openModal = (event) => {
    event.preventDefault(); // Prevenir la acción por defecto del enlace
    emit("openDeleteModal");
};
</script>

<template>
    <div class="group relative">
        <a :href="editRoute" class="block">
            <div
                class="flex h-60 overflow-hidden rounded-xl border-0 bg-white shadow-md transition-all duration-300 group-hover:ring-2"
            >
                <!-- Imagen de la card -->
                <div
                    class="flex w-1/2 items-center justify-center overflow-hidden bg-gray-200"
                >
                    <slot name="image" />
                </div>
                <div class="flex w-1/2 flex-col justify-between p-4">
                    <div class="truncate text-xl font-bold text-gray-800">
                        <!-- Título de la card -->
                        <slot name="title" />
                    </div>
                    <div class="text-md mb-4 truncate text-gray-600">
                        <!-- Subtítulo de la card -->
                        <slot name="subtitle" />
                    </div>
                    <div class="truncate text-sm text-gray-700">
                        <!-- Contenido de la card -->
                        <slot name="content" />
                    </div>
                    <div class="flex w-full items-center justify-end gap-4">
                        <Link :href="editRoute">
                            <EditButton />
                        </Link>
                        <DeleteButton @click="openModal" />
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

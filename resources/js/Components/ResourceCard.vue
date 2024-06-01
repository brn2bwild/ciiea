<script setup>
import { defineProps, defineEmits } from "vue";

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
                    <slot name="image"></slot>
                </div>
                <div class="flex w-1/2 flex-col justify-between p-4">
                    <div class="truncate text-xl font-bold text-gray-800">
                        <!-- Título de la card -->
                        <slot name="title"></slot>
                    </div>
                    <div class="text-md mb-4 truncate text-gray-600">
                        <!-- Subtítulo de la card -->
                        <slot name="subtitle"></slot>
                    </div>
                    <div class="truncate text-sm text-gray-700">
                        <!-- Contenido de la card -->
                        <slot name="content"></slot>
                    </div>
                    <div class="flex w-full justify-end gap-6">
                        <Link
                            :href="editRoute"
                            class="block rounded-full text-2xl text-orange-500 transition-all duration-200 hover:text-orange-700"
                        >
                            <font-awesome-icon
                                :icon="{
                                    prefix: 'fa',
                                    iconName: 'pen-to-square',
                                }"
                            />
                        </Link>
                        <button
                            @click="openModal"
                            class="block rounded-full text-2xl text-red-500 transition-all duration-200 hover:text-red-700"
                        >
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'trash' }"
                            />
                        </button>
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

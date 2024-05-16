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
    <div class="relative group">
        <a :href="editRoute" class="block">
            <div
                class="bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 group-hover:ring-2 border-0 flex h-60"
            >
                <!-- Imagen de la card -->
                <div
                    class="w-1/2 flex justify-center items-center bg-gray-200 overflow-hidden"
                >
                    <slot name="image"></slot>
                </div>
                <div class="w-1/2 p-4 flex flex-col justify-between">
                    <div class="text-xl font-bold text-gray-800 truncate">
                        <!-- Título de la card -->
                        <slot name="title"></slot>
                    </div>
                    <div class="text-md text-gray-600 mb-4 truncate">
                        <!-- Subtítulo de la card -->
                        <slot name="subtitle"></slot>
                    </div>
                    <div class="text-sm text-gray-700 truncate">
                        <!-- Contenido de la card -->
                        <slot name="content"></slot>
                    </div>
                    <div class="w-full flex justify-end gap-6">
                        <Link
                            :href="editRoute"
                            class="block transition-all duration-200 text-2xl text-orange-500 hover:text-orange-700 rounded-full"
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
                            class="block transition-all duration-200 text-2xl text-red-500 hover:text-red-700 rounded-full"
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

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
  editRoute: {
    type: String,
    required: true,
  },
});

const emit = defineEmits(['openDeleteModal']);

const openModal = (event) => {
  event.preventDefault(); // Prevenir la acción por defecto del enlace
  emit('openDeleteModal');
};
</script>

<template>
  
  <div class="relative group">
    <a :href="editRoute" class="block">
      <div class="bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 transform hover:scale-105 border border-gray-300">
        <!-- Imagen del libro -->
        <div class="h-60 bg-gray-200 flex items-center justify-center">
          <slot name="image">
            <svg class="w-24 h-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8.586a1 1 0 0 1 .707.293l2.828 2.828A1 1 0 0 0 17.415 7H21a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2zM15 3v4a1 1 0 0 0 1 1h4"></path>
            </svg>
          </slot>
        </div>
        <!-- Contenido del libro -->
        <div class="p-6">
          <h1 class="text-xl font-bold text-gray-800">
            <slot name="title">Título del Libro</slot>
          </h1>
          <h2 class="text-md text-gray-600 mb-4">
            <slot name="author">Autor</slot>
          </h2>
          <p class="text-sm text-gray-700 mb-10">
            <slot name="description">Descripción breve del libro.</slot>
          </p>
          <button @click="openModal" class="absolute bottom-2 right-6 z-20 flex items-center justify-center text-sm text-red-500 hover:text-red-600 focus:outline-none rounded-full p-2 bg-white border border-red-500 hover:bg-red-50 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </a>
  </div>
</template>

<style scoped>
  .relative {
    position: relative;
  }
  .absolute {
    position: absolute;
  }
  .z-0 {
    z-index: 0;
  }
  .z-10 {
    z-index: 10;
  }
</style>
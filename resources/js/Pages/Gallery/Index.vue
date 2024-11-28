<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import Pagination from "@/Components/Pagination.vue";
import { ref } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    events: {
        type: Object,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    showModal: {
        type: Boolean,
        default: false,
    },
});

const modalImageUrl = ref("");
</script>

<template>
    <Head title="Galería" />
    <div class="flex flex-col min-h-screen">
      
      <section class="w-full px-12 pt-10 flex-grow">
        <h1 class="ml-10 text-xl font-bold text-neutral-600 hidden sm:block">Eventos</h1>
      </section>
  
      <section class="flex w-full justify-center">
        <div
          class="grid w-[95%] grid-cols-1 gap-2 px-4 pt-8 sm:gap-4 sm:px-12 sm:pb-12 sm:pt-8 md:grid-cols-2 lg:grid-cols-3"
        >
          <div
            class="group relative flex h-40 flex-col items-center justify-center overflow-hidden rounded-3xl bg-neutral-50 transition-all duration-300 ease-in-out lg:h-full"
            v-for="event in props.events.data"
            :key="event.index"
          >
            <img
              loading="lazy"
              class="z-0 object-cover"
              src="/storage/images/gallery-index.jpeg"
              alt="event-cover"
            />
            <div
              class="absolute left-0 top-0 flex h-full w-full items-center justify-evenly bg-neutral-900 text-neutral-800 opacity-80 transition-all duration-150 group-hover:opacity-60"
            ></div>
            <div
              class="absolute left-0 top-0 z-10 flex h-full w-full flex-col items-center justify-center gap-6 px-5 text-neutral-50"
            >
              <span class="line-clamp-2 text-center">
                {{ event.name }}
              </span>
              <Link
                class="cursor-pointer rounded-lg bg-sky-900 px-3 py-2"
                :href="route('guest.gallery.show', event.slug)"
                >Ver evento</Link
              >
            </div>
          </div>
        </div>
      </section>

      <Pagination
          :links="props.events.meta.links"
          class="mt-8 mb-8 flex justify-center"
      />
     
      <!-- Modal -->
      <Modal @close="showModal = false" :show="showModal" :maxWidth="'7xl'">
        <img class="object-cover" loading="lazy" :src="modalImageUrl" alt="image" />
      </Modal>
  
      <!-- Footer, no se sobrepone gracias al flex-grow -->
      <footer class="white text-white py-6 mt-auto">
        <!-- <p class="text-center"></p> -->
      </footer>
    </div>
  </template>
  
  
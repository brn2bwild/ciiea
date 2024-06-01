<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Modal from "@/Components/Modal.vue";
import { Head } from "@inertiajs/vue3";
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
    <section class="w-full px-12 pt-10">
        <h1 class="text-xl font-bold text-neutral-600">Eventos</h1>
    </section>

    <div
        class="grid w-full grid-cols-1 gap-4 px-4 pt-8 sm:grid-cols-5 sm:gap-6 sm:px-12 sm:pb-12 sm:pt-8"
    >
        <!-- <div v-for=" event in events " :key=" event.index "
			@click="showModal = true; modalImageUrl = '/storage/gallery/foro-1.jpg'" class="group cursor-pointer"> -->
        <div
            class="group cursor-pointer"
            v-for="event in events"
            :key="event.index"
        >
            <Link :href="route('guest.gallery.show', event.id)">
                <div
                    class="relative block overflow-hidden rounded-lg bg-neutral-50 transition-all duration-300 ease-in-out"
                >
                    <img
                        loading="lazy"
                        class="z-0 h-80 object-cover"
                        src="/storage/images/gallery-index.jpeg"
                        alt="foro-1"
                    />
                    <div
                        class="absolute left-0 top-0 flex h-full w-full items-center justify-evenly bg-neutral-900 text-neutral-800 opacity-80 transition-all duration-150 group-hover:opacity-60"
                    ></div>
                    <div
                        class="absolute left-0 top-0 z-10 flex h-full w-full items-center justify-evenly px-3 text-neutral-50"
                    >
                        <span class="text-center">{{ event.name }}</span>
                    </div>
                </div>
            </Link>
        </div>

        <!-- <div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-1.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-1.jpg" alt="foro-1" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-2.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-2.jpg" alt="foro-2" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-3.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-3.jpg" alt="foro-3" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div>
		<div @click="showModal = true; modalImageUrl = '/storage/gallery/foro-4.jpg'" class="group cursor-pointer">
			<div
				class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900 overflow-hidden transition-all duration-300 ease-in-out relative">
				<img loading="lazy" class="h-80 z-0 object-cover" src="/storage/gallery/foro-4.jpg" alt="foro-4" />
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center text-neutral-800 bg-neutral-900 opacity-0 group-hover:opacity-80 transition-all duration-150">
				</div>
				<div
					class="absolute top-0 left-0 w-full h-full flex justify-evenly items-center opacity-0 group-hover:opacity-90 transition-all duration-150 z-10 text-neutral-50">
					<Link :href=" route( 'home' ) " class="hover:text-rose-500 text-6xl">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
					</Link>
				</div>
			</div>
		</div> -->
    </div>

    <Modal @close="showModal = false" :show="showModal" :maxWidth="'7xl'">
        <img
            class="object-cover"
            loading="lazy"
            :src="modalImageUrl"
            alt="image"
        />
    </Modal>
</template>

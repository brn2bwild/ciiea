<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import { computed, toRef } from "vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    administrators: {
        type: Object,
        required: true,
    },
});

// const socialMedia = toRef(() => {
// 	return JSON.parse(administrators)
// })
</script>

<template>
    <Head title="Contacto" />
    <section
        class="grid w-full grid-cols-1 gap-4 px-4 pt-20 sm:p-12 md:grid-cols-3"
    >
        <div
            v-for="administrator in administrators"
            :key="administrator.index"
            class="group relative mb-32 flex w-full rounded-sm bg-transparent"
        >
            <img
                class="z-20 h-32 w-32"
                src="/storage/images/default-contact.png"
                alt="default-contact"
            />
            <div
                class="absolute left-5 top-10 z-10 flex h-52 w-3/4 flex-col items-center justify-between rounded-xl bg-blue-950 p-4"
            >
                <div class="flex flex-col items-end pl-24">
                    <h1 class="text-lg font-bold text-white">
                        {{ administrator.name }}
                    </h1>
                    <h2 class="text-neutral-200">
                        {{ administrator.short_description }}
                    </h2>
                </div>
                <div>
                    <p class="mb-2 flex justify-start text-white">
                        <font-awesome-icon
                            :icon="['fa', 'phone']"
                            class="text-xl text-neutral-50"
                        />
                        <a href="https://whatsapp.com" class="ml-2">
                            {{ administrator.mobile }}
                        </a>
                    </p>
                    <p class="mb-2 flex justify-start text-white">
                        <font-awesome-icon
                            :icon="['fa', 'envelope']"
                            class="text-xl text-neutral-50"
                        />
                        <a href="https://outlook.com" class="ml-2">
                            {{ administrator.email }}
                        </a>
                    </p>
                    <p class="flex justify-start text-white">
                        <font-awesome-icon
                            :icon="['fab', 'twitter']"
                            class="text-xl text-neutral-50"
                        />
                        <a href="https://outlook.com" class="ml-2">
                            {{ administrator.social_media.twitter }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-32 w-32 z-20" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-blue-950 w-3/4 p-4 rounded-xl absolute top-10 left-5 z-10 h-52 flex flex-col justify-between items-center">
				<div class="flex flex-col items-end pl-24">
					<h1 class="text-white text-lg font-bold">
						Ing. Selene
					</h1>
					<h2 class="text-neutral-200">
						Encargada de sistemas
					</h2>
				</div>
				<div>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'phone' ] " class="text-neutral-50 text-xl" />
						<a href="https://whatsapp.com" class="ml-2">9321234352</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'envelope' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">sistemas@example.com</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" [ 'fab', 'twitter' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">@sistemas_ciiea</a>
					</p>
				</div>
			</div>
		</div>
		<div class="bg-transparent w-full rounded-sm flex relative group mb-32">
			<img class="h-32 w-32 z-20" src="/storage/images/default-contact.png" alt="default-contact">
			<div
				class="bg-blue-950 w-3/4 p-4 rounded-xl absolute top-10 left-5 z-10 h-52 flex flex-col justify-between items-center">
				<div class="flex flex-col items-end pl-24">
					<h1 class="text-white text-lg font-bold">
						Juan Carlos Rodríguez Méndez
					</h1>
					<h2 class="text-neutral-200">
						Planeación
					</h2>
				</div>
				<div>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'phone' ] " class="text-neutral-50 text-xl" />
						<a href="https://whatsapp.com" class="ml-2">932122164</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" [ 'fa', 'envelope' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">planeacion@example.com</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" [ 'fab', 'twitter' ] " class="text-neutral-50 text-xl" />
						<a href="https://outlook.com" class="ml-2">@planeacion_ciiea</a>
					</p>
				</div>
			</div>
		</div> -->
    </section>
    <section class="relative mb-10 px-4 pb-16 sm:px-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2328.054491828354!2d-92.93779457026712!3d17.562612384054674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85edb757e68858c3%3A0x9e0871be66d0e66c!2sCentro%20de%20Investigaci%C3%B3n%20E%20Innovaci%C3%B3n%20Para%20la%20Ense%C3%B1anza%20y%20El%20Aprendizaje%20Ciiea!5e0!3m2!1ses-419!2smx!4v1689117052692!5m2!1ses-419!2smx"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="h-96 w-full sm:h-[480px]"
        >
        </iframe>
        <div
            class="absolute bottom-10 flex w-full justify-center gap-8 bg-transparent"
        >
            <div
                class="flex w-full flex-col items-center justify-start overflow-hidden rounded-xl bg-neutral-50 p-4 text-center shadow-lg sm:w-1/5"
            >
                <span class="mb-4 text-lg font-bold text-neutral-600">
                    Dirección
                </span>
                <p class="text-neutral-600">
                    Carretera a Las Grutas S/N, Eureka y Belem, 86800 Teapa,
                    Tab.
                </p>
            </div>
            <div
                class="flex w-full flex-col items-center justify-start overflow-hidden rounded-xl bg-neutral-50 p-4 text-center shadow-lg sm:w-1/5"
            >
                <span class="mb-4 text-lg font-bold text-neutral-600">
                    Horario de atención
                </span>
                <p class="text-neutral-600">
                    Lunes a Viernes <br />
                    8:00 a.m. - 3:00 p.m.
                </p>
            </div>
            <div
                class="flex w-full flex-col items-center justify-start overflow-hidden rounded-xl bg-neutral-50 p-4 text-center shadow-lg sm:w-1/5"
            >
                <span class="mb-4 text-lg font-bold text-neutral-600">
                    Número telefónico
                </span>
                <p class="text-neutral-600">932 322 3381</p>
            </div>
        </div>
    </section>
</template>

<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { faAt, faEnvelope, faPhone } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
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
</script>

<template>
    <Head title="Contacto" />

    <section
        class="grid w-full grid-cols-1 gap-10 px-4 pt-20 sm:p-12 lg:grid-cols-3 "
    >
        <div
            v-for="administrator in administrators"
            :key="administrator.index"
            class="flex w-full items-center justify-center rounded-xl"
        >
            <div class="relative w-full h-full">
                <img
                    class="absolute -top-4 -left-4 z-20 h-32 w-32 rounded-full border-none"
                    :src="
                        administrator.image !== null
                            ? administrator.image.path
                            : '/storage/images/default-contact.png'
                    "
                    alt="default-contact"
                />
                <div
                    class="z-10 flex w-full flex-col items-start justify-between rounded-xl bg-indigo-200 p-4 lg:h-60"
                >
                    <div class="flex flex-col items-start pl-28">
                        <h1 class="line-clamp-2 text-lg font-bold text-sky-950">
                            {{ administrator.name }}
                        </h1>
                        <h2 class="text-sky-900">
                            {{ administrator.short_description }}
                        </h2>
                    </div>
                    <div class="flex flex-col items-start justify-start gap-2 w-full pl-28 mt-4">
                        <p
                            class="flex items-center justify-start text-sky-950"
                        >
                            <FontAwesomeIcon
                                :icon="faPhone"
                                class="text-xl text-sky-900"
                            />
                            <a href="https://whatsapp.com" class="ml-2">
                                {{ administrator.mobile }}
                            </a>
                        </p>
                        <p class="flex items-center justify-start text-sky-950">
                            <FontAwesomeIcon
                                :icon="faEnvelope"
                                class="text-xl text-sky-900"
                            />
                            <a href="https://outlook.com" class="ml-2">
                                {{ administrator.email }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-10 relative mb-20 px-4 pb-16 sm:px-0">
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
        class="mt-6 flex flex-col gap-4 sm:absolute sm:-bottom-5 sm:w-full sm:flex-row sm:justify-center"
    >
        <div
            class="flex w-full flex-col items-center justify-start overflow-hidden rounded-xl bg-indigo-200 p-4 text-center shadow-lg sm:w-1/4"
        >
            <span class="mb-4 text-lg font-bold text-sky-950">
                Dirección
            </span>
            <p class="text-sky-900">
                Carretera a Las Grutas S/N, Eureka y Belem, 86800 Teapa,
                Tab.
            </p>
        </div>
        <div
            class="flex w-full flex-col items-center justify-start overflow-hidden rounded-xl bg-indigo-200 p-4 text-center shadow-lg sm:w-1/4"
        >
            <span class="mb-4 text-lg font-bold text-sky-950">
                Horario de atención
            </span>
            <p class="text-sky-900">
                Lunes a Viernes <br />
                8:00 a.m. - 3:00 p.m.
            </p>
        </div>
        <div
            class="flex w-full flex-col items-center justify-start overflow-hidden rounded-xl bg-indigo-200 p-4 text-center shadow-lg sm:w-1/4"
        >
            <span class="mb-4 text-lg font-bold text-sky-950">
                Número telefónico
            </span>
            <p class="text-sky-900">932 322 3381</p>
        </div>
    </div>
</section>
</template>

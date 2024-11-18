<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

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
});
</script>

<template>
    <Head title="Inicio" />
    <section class="w-full overflow-hidden">
        <img
            v-lazy="'/storage/images/ciiea.jpeg'"
            class="object-contain object-center"
        />
    </section>
    <section
        class="flex w-full items-center justify-center bg-rose-900 py-24  text-center text-neutral-50"
    >
        <div class="w-2/3">
            <h1 class="w-full text-2xl font-bold">¿Qué es el CIIEA?</h1>
            <p
                class="text-md mt-4 w-full px-4 font-extralight leading-7 sm:px-20"
            >
                El CIIEA es un órgano descentralizado de la Secretaria de
                Educacion, que desarrolla funciones de investigación,
                innovación, servicios académicos, vinculación y difusión.
            </p>
        </div>
    </section>
    <section
        class="flex w-full items-center justify-center py-20 lg:px-28 px-8"
    >
        <div class="grid w-full grid-cols-1 gap-x-10 gap-6 md:grid-cols-3">
            <div
                class="flex min-h-full flex-col items-center justify-center rounded-2xl bg-neutral-50 px-8 py-6 text-center leading-7 text-neutral-900 shadow-sm shadow-gray-400"
            >
                <span class="text-2xl font-bold text-neutral-800"
                    >Objetivo</span
                >
                <p
                    class="text-md mt-4 font-extralight leading-6 text-neutral-700"
                >
                    Proponer y ejecutar las acciones necesarias, que contribuyan
                    a elevar la calidad de la educación en el estado de Tabasco.
                </p>
            </div>
            <div
                class="flex min-h-full flex-col items-center justify-center rounded-2xl bg-neutral-50 px-8 py-6 gap-6 text-center leading-7 text-neutral-900 shadow-sm shadow-gray-400"
            >
                <span class="text-2xl font-bold text-neutral-800">Misión</span>
                <p
                    class="text-md mt-4 font-extralight leading-6 text-neutral-700"
                >
                    Desarrollar un centro público de investigación dedicado a la
                    generación y divulgación de conocimientos especializados en
                    la educación, para elevar la calidad educativa, la formación
                    de recursos humanos, el fortalecimiento de los servicios
                    académicos y la vinculación con los sectores públicos y
                    privados.
                </p>
            </div>
            <div
                class="flex min-h-full flex-col items-center justify-center rounded-2xl bg-neutral-50 px-8 py-6 gap-6 text-center leading-7 text-neutral-900 shadow-sm shadow-gray-400"
            >
                <span class="text-2xl font-bold text-neutral-800">Visión</span>
                <p
                    class="text-md mt-4 font-extralight leading-6 text-neutral-700"
                >
                    Consolidar al CIIEA como una institución reconocida en la
                    generacion de investigación educativa, con la participacion
                    de profesionales que generen programas, proyectos y
                    productos de investigación que respondan a las necesidades
                    educativas del estado.
                </p>
            </div>
        </div>
    </section>
</template>

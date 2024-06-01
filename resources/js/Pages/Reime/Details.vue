<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

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
    <Head title="REIME" />
    <section
        class="flex h-[480px] w-full items-center justify-start bg-rose-900"
    >
        <img
            class="w-[65%]"
            src="/storage/images/reime-logo-blanco.png"
            alt="reime-logo"
        />
        <div
            class="flex h-full w-[35%] items-end justify-end px-8 py-8 text-right"
        >
            <Link :href="route('register')" class="text-xl text-white"
                >¿Quieres formar parte del REIME? Regístrate
            </Link>
        </div>
    </section>
    <section class="flex h-[560px] w-full items-center justify-between">
        <h1 class="w-1/3 text-right text-4xl font-medium">Historia</h1>
        <p class="w-2/3 px-32 text-lg leading-9">
            La riqueza de estas redes consiste en el intercambio de
            conocimientos, entre comunidades de diferentes estados o regiones,
            construyendo así, un proyecto educativo para atender las demandas
            más urgentes del sector educativo, con una visión más humanista que
            trascienda en la mejora de la calidad educativa en este caso del
            estado. De ahí la intención del Centro de Investigación e Innovación
            para la Enseñanza y el Aprendizaje, (CIIEA) de conformar una Red
            Estatal de Investigadores en Materia Educativa, REIME, que propicie
            el desarrollo de las capacidades científicas, tecnológicas,
            educativas, de investigación y de innovación, abordándolas con el
            conocimiento de diferentes grupos que fomenten el desarrollo de
            proyectos específicos de docencia, investigación, extensión,
            vinculación, cooperación y transferencia de conocimientos y saberes
            educativos.
        </p>
    </section>
    <section
        class="flex h-[320px] w-full items-center justify-between bg-rose-900 text-white"
    >
        <p class="w-2/3 px-32 text-lg leading-9">
            Conformar una Red Estatal de Investigadores en Materia Educativa,
            que realicen trabajo de investigación e innovación educativa, para
            la producción e intercambio del conocimiento en apoyo al sector
            educativo de Tabasco.
        </p>
        <h1 class="w-1/3 text-left text-4xl font-medium">Objetivo</h1>
    </section>
    <section
        class="mt-8 flex h-[320px] w-full items-center justify-between pb-8"
    >
        <div class="text-center">
            <h1 class="mb-6 text-4xl font-medium">Misión</h1>
            <p class="px-32 text-lg leading-9">
                Desarrollar un centro público de investigación dedicado a la
                generación y divulgación de conocimientos especializados en la
                educación para elevar la calidad educativa , la formación de
                recursos humanos, el fortalecimiento de los servicios académicos
                y la vinculación con los sectores públicos, privados.
            </p>
        </div>
        <div class="text-center">
            <h1 class="mb-6 text-4xl font-medium">Visión</h1>
            <p class="px-32 text-lg leading-9">
                Consolidar al CIIEA como una institución reconocida en la
                generación de investigación educativa, con la participación de
                profesionales que generen programas, proyectos y productos de
                investigación que respondan a las necesidades educativas del
                estado.
            </p>
        </div>
    </section>
</template>

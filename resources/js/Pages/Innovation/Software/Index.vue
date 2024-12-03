<script setup>
import Card from "@/Components/Card.vue";
import Pagination from "@/Components/Pagination.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    software_resources: {
        type: Object,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>
<template>
    <Head title="Software Educativo" />
    <div
        class="flex w-full flex-col items-center justify-center px-14 lg:px-60 sm:py-10"
    >
        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Software Educativo
            </h1>
        </section>

     

        <section class="mt-10 grid w-full grid-cols-1 gap-8 md:grid-cols-3">

            <Card class="group relative">
    <template #custom-thumbnail>
        <img
            class="h-full w-full object-fill object-center group-hover:opacity-30 transition-opacity duration-300"
            src="/storage/images/test1.jpg"
            alt="software-cover"
        />
    </template>
    <template #title>
        <h1 class="line-clamp-2 text-xl font-bold text-neutral-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Test de Estilos de Aprendizajes
        </h1>
    </template>
    <template #content>
        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    <h2 class="font-medium text-neutral-100" style="text-align: justify;">
        El Test analiza los Estilos de Aprendizaje, ofreciendo un enfoque más personalizado y efectivo acorde a tus habilidades.
    </h2>
</div>

        <div class="mt-2 flex items-center justify-center opacity-100 group-hover:opacity-100 transition-opacity duration-300">
            <a
                href="https://www.google.com.mx/?hl=es-419"
                target="_blank"
                rel="noopener noreferrer"
                class="text-md rounded-lg bg-sky-900 px-4 py-1 text-center font-medium text-neutral-50 hover:bg-sky-600"
            >
                Ir al Test
            </a>
        </div>
    </template>
</Card>





            <Card
                v-for="software in props.software_resources.data"
                :key="software.index"
            >
                <template #thumbnail>
                    <img
                        class="h-full w-full object-fill object-center"
                        :src="
                            '/storage/' +
                            (software.image !== null
                                ? software.image.path
                                : 'images/bookshelve-optimized.jpg')
                        "
                        alt="softwre-cover"
                    />
                </template>
                <template #title>
                    <h1 class="line-clamp-2 text-xl font-bold text-neutral-50">
                        {{ software.name }}
                    </h1>
                </template>
                <template #content>
                    <h2 class="line-clamp-2 font-medium text-neutral-100">
                        {{ software.description }}
                    </h2>
                    <div class="mt-2 flex items-center justify-center">
                        <Link
                            :href="
                                route(
                                    'guest.educational-software.show',
                                    software.slug,
                                )
                            "
                            class="text-md rounded-lg bg-sky-900 px-4 py-1 text-center font-medium text-neutral-50"
                            >Leer más</Link
                        >
                    </div>
                </template>
            </Card>
        </section>

        <Pagination
            :links="props.software_resources.meta.links"
            class="mt-8 flex justify-center mb-8"
        />
    </div>
</template>

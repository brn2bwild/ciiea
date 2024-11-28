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

        <!-- <section class="mt-5 flex w-full justify-center">
    <div
        class="flex h-full w-full flex-col md:flex-row items-center justify-between overflow-hidden rounded-2xl bg-gray-800 shadow-lg shadow-slate-100"
    >
   
        <div class="h-48 w-full md:w-1/2">
            <img
                class="w-full h-full object-cover rounded-t-2xl md:rounded-l-2xl"
                src="/storage/images/test.png"
                alt="software-cover"
            />
        </div>
        <div class="w-full md:w-1/2 p-4">
          
            <h1 class="line-clamp-2 text-2xl font-bold text-neutral-50">
                TEST
            </h1>
         
            <h2 class="mt-4 line-clamp-2 font-medium text-neutral-100">
                Test para estilo de aprendizaje
            </h2>
    
            <div class="mt-4 flex justify-start">
                <a
                    href="https://www.google.com.mx/?hl=es-419"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-md rounded-lg bg-sky-900 px-4 py-2 text-center font-medium text-neutral-50 hover:bg-sky-800"
                >
                    Ir al TEST
                </a>
            </div>
        </div>
    </div>
</section> -->

        <section class="mt-10 grid w-full grid-cols-1 gap-8 md:grid-cols-3">

            <Card>
        <template #thumbnail>
            <img
                class="h-full w-full object-fill object-center"
                src="/storage/images/test.png"
                alt="software-cover"
            />
        </template>
        <template #title>
            <h1 class="line-clamp-2 text-xl font-bold text-neutral-50">
                TEST
            </h1>
        </template>
        <template #content>
            <h2 class="line-clamp-2 font-medium text-neutral-100">
                Test para estilo de aprendizaje
            </h2>
            <div class="mt-2 flex items-center justify-center">
                <a
                    href="https://www.google.com.mx/?hl=es-419"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-md rounded-lg bg-sky-900 px-4 py-1 text-center font-medium text-neutral-50 hover:bg-sky-800"
                >
                    Ir al TEST
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

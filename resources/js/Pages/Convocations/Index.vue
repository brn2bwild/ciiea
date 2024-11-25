<script setup>
import Pagination from "@/Components/Pagination.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    convocations: {
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
    <Head title="Convocatorias" />
    <div
        class="flex w-full flex-col items-center justify-center px-14 lg:px-60 sm:py-10"
    >
    <section class="mt-10 w-full pb-20 pt-10">
    <div class="flex flex-col md:flex-row h-full w-full items-center justify-between overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-100">
       
        <div class="flex w-full md:w-1/2 justify-center overflow-hidden bg-neutral-300 object-fill">
            <img
                class="h-80 w-full object-cover"
                :src="
                    '/storage/' +
                    (props.convocations.data[0].image
                        ? props.convocations.data[0].image.path
                        : '/images/magazines-optimized.jpg')
                "
                :alt="
                    props.convocations.data[0].image
                        ? props.convocations.data[0].image.name
                        : 'alt-convocation-image'
                "
            />
        </div>

        <div class="flex w-full md:w-1/2 flex-col gap-4 p-4">
            <h3 class="font-sans text-neutral-500">
                {{ props.convocations.data[0].date }} - {{ props.convocations.data[0].time }}
            </h3>
            <h1 class="mt-2 line-clamp-2 font-sans text-3xl font-extrabold text-neutral-700">
                {{ props.convocations.data[0].name }}
            </h1>
            <h2 class="mb-4 mt-2 line-clamp-2 text-lg font-medium text-neutral-600">
                {{ props.convocations.data[0].description }}
            </h2>
            <div class="flex justify-start">
                <Link
                    :href="route('guest.convocations.show', props.convocations.data[0].slug)"
                    class="rounded-lg bg-sky-900 px-4 py-2 font-medium text-neutral-50"
                >
                    Leer más
                </Link>
            </div>
        </div>
    </div>
</section>


        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Últimas Convocatorias
            </h1>
        </section>

        <section class="grid w-full grid-cols-1 gap-6 sm:grid-cols-2">
            <div
                v-for="convocation in props.convocations.data"
                :key="convocation.index"
                class="flex w-full flex-col items-start justify-center rounded-2xl bg-sky-900 bg-opacity-95 shadow-lg shadow-slate-100"
            >
                <div
                    class="flex h-full w-full flex-col items-start justify-between gap-2 p-4"
                >
                    <h3 class="text-md text-neutral-100">
                        {{ convocation.date }} - {{ convocation.time }}
                    </h3>
                    <h1
                        class="mr-4 line-clamp-2 w-full text-xl font-bold text-neutral-50"
                    >
                        {{ convocation.name }}
                    </h1>
                    <p class="line-clamp-3 text-neutral-100">
                        {{ convocation.description }}
                    </p>
                    <h3 class="text-sm text-neutral-100">
                        Compartido {{ convocation.created_at_for_humans }}
                    </h3>
                    <div class="flex w-full justify-end">
                        <Link
                            :href="
                                route(
                                    'guest.convocations.show',
                                    convocation.slug,
                                )
                            "
                            class="rounded-lg bg-neutral-50 px-4 py-2 text-sm font-medium text-neutral-900"
                        >
                            Leer más
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <Pagination
            :links="props.convocations.meta.links"
            class="mt-8 flex justify-center mb-8"
        />
    </div>
</template>

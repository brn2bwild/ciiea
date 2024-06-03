<script setup>
import Pagination from "@/Components/Pagination.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

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
        class="flex w-full flex-col items-center justify-center sm:px-60 sm:py-10"
    >
        <section class="w-full pb-20 pt-10">
            <div
                class="flex h-full w-full items-center justify-between overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div class="w-1/2 p-4">
                    <h5 class="font-sans text-neutral-500">
                        {{ props.convocations.data[0].date }} -
                        {{ props.convocations.data[0].time }}
                    </h5>
                    <h1
                        class="mt-2 font-sans text-3xl font-extrabold text-neutral-700"
                    >
                        {{ props.convocations.data[0].name }}
                    </h1>
                    <h2 class="mb-4 mt-2 text-lg font-medium text-neutral-600">
                        {{
                            props.convocations.data[0].description.substr(
                                0,
                                100,
                            )
                        }}
                    </h2>
                    <Link
                        :href="
                            route(
                                'guest.convocations.show',
                                props.convocations.data[0].slug,
                            )
                        "
                        class="rounded-xl bg-sky-500 px-4 py-2 font-bold text-neutral-50"
                    >
                        Leer más
                    </Link>
                </div>
                <div
                    class="flex h-80 w-1/2 justify-center overflow-hidden bg-neutral-300 object-fill"
                >
                    <img
                        class="h-full scale-125"
                        :src="
                            '/storage/' +
                            (props.convocations.data[0].image
                                ? props.convocations.data[0].image.path
                                : '/images/magazines-optimized.jpg')
                        "
                        :alt="
                            props.convocations.data[0].image
                                ? props.convocations.data[0].image.name
                                : 'default-convocation-image'
                        "
                    />
                </div>
            </div>
        </section>
        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Últimas Convocatorias
            </h1>
        </section>
        <section class="grid w-full grid-cols-1 gap-10 sm:grid-cols-2">
            <div
                v-for="convocation in props.convocations.data"
                :key="convocation.index"
                class="flex w-full flex-col items-start justify-center rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div
                    class="flex h-full w-full flex-col items-start justify-between gap-2 p-4"
                >
                    <h3 class="text-sm text-neutral-600">
                        {{ convocation.date }} - {{ convocation.time }}
                    </h3>
                    <h1 class="mr-4 w-full text-xl font-bold text-neutral-900">
                        {{ convocation.name }}
                    </h1>
                    <p>{{ convocation.description.substr(0, 100) }}...</p>
                    <h3 class="text-sm text-neutral-600">
                        Compartido {{ convocation.created_at_for_humans }}
                    </h3>
                    <Link
                        :href="
                            route('guest.convocations.show', convocation.slug)
                        "
                        class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                    >
                        Leer más
                    </Link>
                </div>
            </div>
        </section>
        <Pagination
            :links="props.convocations.meta.links"
            class="mt-8 flex justify-center"
        />
    </div>
</template>

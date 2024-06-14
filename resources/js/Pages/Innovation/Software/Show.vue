<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    software: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <Head title="Software Educativo" />
        <section class="min-h-screen w-full px-80 pb-10">
            <h1 class="w-full pt-12 text-left text-6xl font-bold">
                {{ props.software.data.name }}
            </h1>
            <div class="mt-10 flex items-center justify-between gap-8">
                <div>
                    <p class="w-full text-justify">
                        {{ props.software.data.description }}
                    </p>
                    <div class="flex justify-center py-10">
                        <Link
                            v-if="
                                props.software.data.file === null &&
                                props.software.data.url
                            "
                            :href="props.software.data.url"
                            class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                        >
                            Descargar
                        </Link>
                        <a
                            v-else
                            :href="
                                route(
                                    'public.file.download',
                                    props.software.data.file.path.substring(
                                        13,
                                        props.software.data.file.path.length,
                                    ),
                                )
                            "
                            class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                        >
                            Descargar
                        </a>
                    </div>
                </div>
                <img
                    class="h-[600px] w-1/2 object-cover"
                    :src="
                        '/storage/' +
                        (props.software.data.image
                            ? props.software.data.image.path
                            : '/images/magazines-optimized.jpg')
                    "
                    :alt="
                        props.software.data.image
                            ? props.software.data.image.name
                            : 'default-software-image'
                    "
                />
            </div>
        </section>
    </div>
</template>

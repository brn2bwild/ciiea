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
        class="flex w-full flex-col items-center justify-center sm:px-60 sm:py-10"
    >
        <section class="w-full pb-6">
            <h1 class="text-xl font-bold text-neutral-600">
                Software Educativo
            </h1>
        </section>
        <section class="grid w-full grid-cols-1 gap-10 md:grid-cols-3">
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
                            class="text-md rounded-lg bg-sky-500 px-4 py-1 text-center font-medium text-neutral-50"
                            >Leer más</Link
                        >
                    </div>
                </template>
            </Card>
        </section>
        <Pagination
            :links="props.software_resources.meta.links"
            class="mt-8 flex justify-center"
        />
    </div>
</template>

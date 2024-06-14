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
                <template #content>
                    <h1
                        class="line-clamp-2 font-sans text-lg font-extrabold text-neutral-50"
                    >
                        {{ software.name }}
                    </h1>
                    <!-- <h2 class="text-md font-medium text-neutral-600">{{ software.authors }}</h2> -->
                    <Link
                        :href="
                            route(
                                'guest.educational-software.show',
                                software.slug,
                            )
                        "
                        class="rounded-xl bg-sky-500 px-4 py-1 text-lg font-bold text-neutral-50 text-center"
                        >Leer más</Link
                    >
                </template>
            </Card>
            <!-- <div
                v-for="software in props.software_resources.data"
                :key="software.index"
                class="flex w-full flex-col items-start justify-start overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-100"
            >
                <div class="mb-2 h-60 w-full overflow-hidden">
                    <img
                        class="object-cover object-center"
                        :src="
                            '/storage/' +
                            (software.image !== null
                                ? software.image.path
                                : 'images/bookshelve-optimized.jpg')
                        "
                        alt="book-cover"
                    />
                </div>
                <div
                    class="flex h-36 w-full flex-col items-start justify-between gap-0 p-4"
                >
                    <h1
                        class="font-sans text-lg font-extrabold text-neutral-700"
                    >
                        {{ software.name }}
                    </h1>
                    <Link
                        :href="
                            route(
                                'guest.educational-software.show',
                                software.slug,
                            )
                        "
                        class="rounded-xl bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                        >Leer más</Link
                    >
                </div>
            </div> -->
        </section>
        <Pagination
            :links="props.software_resources.meta.links"
            class="mt-8 flex justify-center"
        />
    </div>
</template>

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
        <section class="min-h-screen w-full px-4 sm:px-8 md:px-16 lg:px-20 xl:px-80 pb-10 pt-24">
    <h1 class="w-full text-left text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold">
        {{ props.software.data.name }}
    </h1>
            <div class="mt-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="w-full md:w-1/2">
                    <p class="w-full text-justify">
                        {{ props.software.data.description }}
                    </p>
                 <div class="flex justify-center py-10">
                       <a
                         v-if="props.software.data.file === null && props.software.data.url"
                          :href="props.software.data.url"
                           target="_blank"
                         rel="noopener noreferrer"
                         class="rounded-lg bg-sky-900 px-4 py-2 text-sm font-bold text-neutral-50"
                           >
                          Descargar
                     </a>

                      <a
                        v-else-if="props.software.data.file"
                        :href="route(
                         'public.file.download',
                          props.software.data.file.path.substring(13)
                           )"
                       class="rounded-lg bg-sky-900 px-4 py-2 text-sm font-bold text-neutral-50"
                        >
                         Descargar
                       </a>

             
                 <span
                    v-else
                   class="rounded-lg bg-gray-500 px-4 py-2 text-sm font-bold text-neutral-50 cursor-not-allowed"
                    >
                      Archivo no disponible
                      </span>
                   </div>
                </div>
                <div class="w-full md:w-1/2">
                    <img
                        class="h-[400px] sm:h-[500px] md:h-[600px] w-full object-cover rounded-lg"
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
            </div>
        </section>
    </div>
</template>


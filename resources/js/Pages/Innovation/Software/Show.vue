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
                {{ software.name }}
            </h1>
            <div class="mt-10 flex items-center justify-between gap-8">
                <div>
                    <p class="w-full text-justify">
                        Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Culpa, hic harum, dolorum facere dolor officia
                        ipsum in tempore ullam recusandae maxime. Quod
                        doloremque nobis sunt corrupti unde repellendus vero
                        nesciunt? Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ad odio quis et eum? Eos veniam
                        blanditiis aliquam molestiae inventore, ipsam placeat
                        distinctio iusto magnam error modi? Itaque quidem dicta
                        tempore! Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Dolor illo culpa, nisi a possimus
                        optio minima ipsum natus autem quaerat. Veritatis quis
                        ea adipisci esse ipsam dicta, earum ad distinctio.
                    </p>
                    <div class="flex justify-center py-10">
                        <Link
                            class="rounded-xl bg-sky-500 px-4 py-2 text-sm font-bold text-neutral-50"
                            >Descargar</Link
                        >
                    </div>
                </div>
                <img
                    class="h-[600px] w-1/2 object-cover"
                    :src="
                        '/storage/' +
                        (software.image
                            ? software.image.path
                            : '/images/magazines-optimized.jpg')
                    "
                    :alt="
                        software.image
                            ? software.image.name
                            : 'default-software-image'
                    "
                />
            </div>
        </section>
    </div>
</template>

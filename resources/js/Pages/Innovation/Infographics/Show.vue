<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    infographic: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <Head title="Infografías" />
        <section class="min-h-screen w-full px-80 pb-10">
            <h1 class="w-full pt-12 text-left text-6xl font-bold">
                {{ infographic.title }}
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
                    <!-- <div class="py-10 flex justify-center">
						<Link class="bg-sky-500 px-4 py-2 rounded-lg text-neutral-50 font-bold text-sm">Descargar</Link>
					</div> -->
                </div>
                <img
                    class="h-[600px] w-1/2 object-cover"
                    :src="
                        '/storage/' +
                        (infographic.image
                            ? infographic.image.path
                            : '/images/magazines-optimized.jpg')
                    "
                    :alt="
                        infographic.image
                            ? infographic.image.name
                            : 'default-infographic-image'
                    "
                />
            </div>
        </section>
    </div>
</template>

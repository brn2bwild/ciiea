<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    convocation: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <Head title="Convocatoria" />
        <section class="min-h-screen w-full px-80 pb-10">
            <h1 class="w-full pt-12 text-left text-6xl font-bold">
                {{ props.convocation.data.name }}
            </h1>
            <h2 class="mt-6 text-xl text-neutral-800">
                {{ props.convocation.data.location }}
            </h2>
            <div
                class="flex w-full justify-start gap-2 text-xl text-neutral-800"
            >
                <h2>
                    {{ props.convocation.data.date }}
                </h2>
                <h2>
                    {{ props.convocation.data.time }}
                </h2>
            </div>
            <div class="mt-10 flex items-center justify-between gap-8">
                <p class="w-1/2 text-justify">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Culpa, hic harum, dolorum facere dolor officia ipsum in
                    tempore ullam recusandae maxime. Quod doloremque nobis sunt
                    corrupti unde repellendus vero nesciunt? Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Ad odio quis et eum?
                    Eos veniam blanditiis aliquam molestiae inventore, ipsam
                    placeat distinctio iusto magnam error modi? Itaque quidem
                    dicta tempore! Lorem ipsum dolor, sit amet consectetur
                    adipisicing elit. Dolor illo culpa, nisi a possimus optio
                    minima ipsum natus autem quaerat. Veritatis quis ea adipisci
                    esse ipsam dicta, earum ad distinctio.
                </p>
                <img
                    class="h-[600px] w-1/2 object-cover"
                    :src="
                        '/storage/' +
                        (props.convocation.data.image
                            ? props.convocation.data.image.path
                            : '/images/magazines-optimized.jpg')
                    "
                    :alt="
                        props.convocation.data.image
                            ? props.convocation.data.image.name
                            : 'default-convocation-image'
                    "
                />
            </div>
            <!-- <div class="py-10">
				<h1 class="w-full text-center text-3xl font-medium">Información adicional</h1>

			</div> -->
        </section>
    </div>
</template>

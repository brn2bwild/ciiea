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
        <section class="min-h-screen w-full px-6 sm:px-10 lg:px-20 xl:px-80 pb-10 pt-8">
    <h1 class="w-full pt-12 text-left text-4xl sm:text-5xl md:text-6xl font-bold">
        {{ props.convocation.data.name }}
    </h1>
    <h2 class="mt-6 text-lg sm:text-xl md:text-2xl text-neutral-800">
        {{ props.convocation.data.location }}
    </h2>
    <div class="flex w-full justify-start gap-2 text-lg sm:text-xl text-neutral-800">
        <h2>
            {{ props.convocation.data.date }}
        </h2>
        <h2>
            {{ props.convocation.data.time }}
        </h2>
    </div>
    <div class="mt-10 flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8">
        <!-- <p class="w-full sm:w-3/4 md:w-1/2 text-justify text-base sm:text-lg md:text-xl">
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
        </p> -->
        <div class="flex justify-center items-center">
        <img
            class="w-full sm:w-3/4 md:w-1/2 h-[300px] sm:h-[400px] md:h-[600px] object-cover"
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
</div>
</section>

    </div>
</template>

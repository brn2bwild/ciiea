<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>
<template>
    <Head title="REIME" />
    <div
        class="relative flex w-full justify-between gap-4 px-4 pb-10 pt-20 sm:p-8"
    >
        <section class="sticky top-20 hidden h-full w-1/4 sm:flex sm:flex-col">
            <div class="flex flex-col rounded-lg bg-white px-4 pb-4 pt-2">
                <h1 class="font-medium text-neutral-500">
                    Investigadores destacados
                </h1>
                <div
                    class="mt-4 flex w-full cursor-pointer justify-start rounded-lg px-4 py-2 hover:bg-neutral-200"
                >
                    <img
                        src="/storage/images/default-contact.png"
                        alt="contacto"
                        class="mr-4 h-12 w-12"
                    />
                    <div class="flex items-center">
                        <h5 class="font-bold">Ciro Gómez Leyva</h5>
                    </div>
                </div>
                <div
                    class="mt-4 flex w-full cursor-pointer justify-start rounded-lg px-4 py-2 hover:bg-neutral-200"
                >
                    <img
                        src="/storage/images/default-contact.png"
                        alt="contacto"
                        class="mr-4 h-12 w-12"
                    />
                    <div class="flex items-center">
                        <h5 class="font-bold">Ernesto Guzmán Sánchez</h5>
                    </div>
                </div>
                <div
                    class="mt-4 flex w-full cursor-pointer justify-start rounded-lg px-4 py-2 hover:bg-neutral-200"
                >
                    <img
                        src="/storage/images/default-contact.png"
                        alt="contacto"
                        class="mr-4 h-12 w-12"
                    />
                    <div class="flex items-center">
                        <h5 class="font-bold">Jaime López Méndez</h5>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex w-1/2 flex-col gap-y-6">
            <div
                class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-sky-900"
            >
                <div class="px-4 py-2 text-neutral-800">
                    <div class="flex items-center justify-start">
                        <h1 class="mr-4 text-xl font-bold">Cine debate</h1>
                        <h3
                            @click.prevent-default="saludar"
                            class="mr-2 text-neutral-600 hover:underline"
                        >
                            Publicado por Daniel Pérez Flores
                        </h3>
                        <h3 class="text-neutral-600">hace 3 horas</h3>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ad nulla excepturi modi, at officia id molestiae natus
                        mollitia unde laudantium! Nesciunt eum, veritatis ab
                        possimus autem corrupti voluptatem! Non, alias!
                    </p>
                </div>
                <img class="" src="/storage/images/magazines.jpg" alt="conv1" />
                <div
                    class="flex w-full items-center justify-evenly py-2 text-neutral-800"
                >
                    <Link :href="route('home')" class="hover:text-green-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'comment' }"
                        />
                        9
                    </Link>
                    <Link :href="route('home')" class="hover:text-rose-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'heart' }"
                        />
                        10
                    </Link>
                </div>
            </div>
            <div
                class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-sky-900"
            >
                <div class="px-4 py-2 text-neutral-800">
                    <div class="flex items-center justify-start">
                        <h1 class="mr-4 text-xl font-bold">Cine debate</h1>
                        <h3
                            @click.prevent-default="saludar"
                            class="mr-2 text-neutral-600 hover:underline"
                        >
                            Publicado por Daniel Pérez Flores
                        </h3>
                        <h3 class="text-neutral-600">hace 3 horas</h3>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ad nulla excepturi modi, at officia id molestiae natus
                        mollitia unde laudantium! Nesciunt eum, veritatis ab
                        possimus autem corrupti voluptatem! Non, alias!
                    </p>
                </div>
                <!-- <img class="" src="/storage/images/magazines.jpg" alt="conv1" /> -->
                <div
                    class="flex w-full items-center justify-evenly py-2 text-neutral-800"
                >
                    <Link :href="route('home')" class="hover:text-green-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'comment' }"
                        />
                        34
                    </Link>
                    <Link :href="route('home')" class="hover:text-rose-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'heart' }"
                        />
                        21
                    </Link>
                </div>
            </div>
            <div
                class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-sky-900"
            >
                <div class="px-4 py-2 text-neutral-800">
                    <div class="flex items-center justify-start">
                        <h1 class="mr-4 text-xl font-bold">Cine debate</h1>
                        <h3
                            @click.prevent-default="saludar"
                            class="mr-2 text-neutral-600 hover:underline"
                        >
                            Publicado por Daniel Pérez Flores
                        </h3>
                        <h3 class="text-neutral-600">hace 3 horas</h3>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ad nulla excepturi modi, at officia id molestiae natus
                        mollitia unde laudantium! Nesciunt eum, veritatis ab
                        possimus autem corrupti voluptatem! Non, alias!
                    </p>
                </div>
                <img class="" src="/storage/images/books.jpg" alt="conv2" />
                <div
                    class="flex w-full items-center justify-evenly py-2 text-neutral-800"
                >
                    <Link :href="route('home')" class="hover:text-green-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'comment' }"
                        />
                        23
                    </Link>
                    <Link :href="route('home')" class="hover:text-rose-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'heart' }"
                        />
                        16
                    </Link>
                </div>
            </div>
            <div
                class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-sky-900"
            >
                <div class="px-4 py-2 text-neutral-800">
                    <div class="flex items-center justify-start">
                        <h1 class="mr-4 text-xl font-bold">Cine debate</h1>
                        <h3
                            @click.prevent-default="saludar"
                            class="mr-2 text-neutral-600 hover:underline"
                        >
                            Publicado por Daniel Pérez Flores
                        </h3>
                        <h3 class="text-neutral-600">hace 3 horas</h3>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ad nulla excepturi modi, at officia id molestiae natus
                        mollitia unde laudantium! Nesciunt eum, veritatis ab
                        possimus autem corrupti voluptatem! Non, alias!
                    </p>
                </div>
                <img class="" src="/storage/images/ciiea.jpg" alt="conv3" />
                <div
                    class="flex w-full items-center justify-evenly py-2 text-neutral-800"
                >
                    <Link :href="route('home')" class="hover:text-green-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'comment' }"
                        />
                        3
                    </Link>
                    <Link :href="route('home')" class="hover:text-rose-500">
                        <font-awesome-icon
                            :icon="{ prefix: 'fa', iconName: 'heart' }"
                        />
                        2
                    </Link>
                </div>
            </div>
        </section>
        <section class="sticky top-20 hidden h-full w-1/4 sm:flex sm:flex-col">
            <div class="mb-6 flex flex-col rounded-lg bg-white px-4 pb-4 pt-2">
                <h1 class="font-medium text-neutral-500">
                    Publicaciones destacadas
                </h1>
                <div
                    class="mt-4 w-full cursor-pointer rounded-lg bg-neutral-200 px-4 py-2"
                >
                    <div class="mb-2 flex justify-between">
                        <h5 class="font-bold">Publicación 1</h5>
                        <h5>
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'comment' }"
                            />
                            15
                        </h5>
                        <h5>
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'heart' }"
                            />
                            30
                        </h5>
                    </div>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit. Sint natus tempora asperiores fugit facilis amet
                        recusandae quia...
                    </p>
                </div>
                <div
                    class="mt-4 w-full cursor-pointer rounded-lg bg-neutral-200 px-4 py-2"
                >
                    <div class="mb-2 flex justify-between">
                        <h5 class="font-bold">Publicación 2</h5>
                        <h5>
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'comment' }"
                            />
                            15
                        </h5>
                        <h5>
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'heart' }"
                            />
                            30
                        </h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Veritatis temporibus nesciunt eos ea...
                    </p>
                </div>
                <div
                    class="mt-4 w-full cursor-pointer rounded-lg bg-neutral-200 px-4 py-2"
                >
                    <div class="mb-2 flex justify-between">
                        <h5 class="font-bold">Publicación 3</h5>
                        <h5>
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'comment' }"
                            />
                            15
                        </h5>
                        <h5>
                            <font-awesome-icon
                                :icon="{ prefix: 'fa', iconName: 'heart' }"
                            />
                            30
                        </h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Laborum debitis tempora veritatis minima...
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>

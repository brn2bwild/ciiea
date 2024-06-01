<script setup>
import SidebarLink from "@/Components/SidebarLink.vue";

const props = defineProps({
    canRegister: {
        type: Boolean,
    },
});

const emit = defineEmits(["openModal"]);
</script>

<template>
    <div
        class="fixed left-0 top-0 z-40 hidden h-screen min-h-screen w-64 border-0 bg-white px-2 pt-20 sm:block"
    >
        <!-- Primary Sidebar Menu -->
        <div class="mx-auto flex h-full w-full flex-col justify-between">
            <!-- Navigation Links -->
            <div class="flex flex-col">
                <SidebarLink :href="route('home')" :active="$page.url === '/'">
                    Inicio
                </SidebarLink>
                <SidebarLink
                    :href="route('books')"
                    :active="route().current('books')"
                >
                    Libros
                </SidebarLink>
                <SidebarLink
                    :href="route('magazines')"
                    :active="route().current('magazines')"
                >
                    Revistas
                </SidebarLink>
                <SidebarLink
                    :href="route('hist-publications')"
                    :active="route().current('hist-publications')"
                >
                    Publicaciones Históricas
                </SidebarLink>
                <SidebarLink
                    :href="route('investigations')"
                    :active="route().current('investigations')"
                >
                    Investigaciones
                </SidebarLink>
                <SidebarLink
                    :href="route('convocations.index')"
                    :active="route().current('convocations.index')"
                >
                    Convocatorias
                </SidebarLink>
                <SidebarLink
                    :href="route('gallery')"
                    :active="route().current('gallery')"
                >
                    Galería
                </SidebarLink>
                <SidebarLink
                    :href="route('reime')"
                    :active="route().current('reime')"
                >
                    REIME
                </SidebarLink>
                <SidebarLink
                    :href="route('contact')"
                    :active="route().current('contact')"
                >
                    Contacto
                </SidebarLink>
            </div>

            <!-- Register button-->
            <div class="flex items-center justify-center pb-8">
                <Link
                    v-if="$page.props.auth.user.name"
                    :href="route('reime')"
                    class="rounded-full bg-neutral-200 px-8 py-2 font-bold text-sky-500 transition-all duration-200 hover:bg-sky-500 hover:text-white"
                >
                    Página principal REIME
                </Link>

                <!-- <Link v-else :href=" route( 'register' ) "
					class="px-8 py-2 rounded-full bg-neutral-200 text-sky-500 hover:bg-sky-500 hover:text-white font-bold transition-all duration-200">
				Únete a la REIME
				</Link> -->

                <span
                    v-else
                    @click="emit('openModal', 'register')"
                    class="rounded-full bg-neutral-200 px-8 py-2 font-bold text-sky-500 transition-all duration-200 hover:bg-sky-500 hover:text-white"
                >
                    Únete a la REIME
                </span>
            </div>
        </div>
    </div>
</template>

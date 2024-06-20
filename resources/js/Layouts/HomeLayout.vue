<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { defineAsyncComponent } from "vue";
import HomeNavbar from "@/Components/Partials/HomeNavbar.vue";
import HomeFooter from "@/Components/Partials/HomeFooter.vue";

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
    <div class="min-h-screen w-full bg-neutral-200">
        <!-- Navbar -->
        <HomeNavbar
            @open-modal="openModalFn"
            :canLogin="canLogin"
            :canRegister="canRegister"
        />

        <!-- Page Content -->
        <main class="min-h-screen sm:pt-16">
            <slot />
        </main>

        <!-- Footer -->
        <HomeFooter />
    </div>
</template>

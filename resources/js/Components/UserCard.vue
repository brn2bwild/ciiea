<script setup>
import { computed } from "vue";

const props = defineProps({
    avartarUrl: {
        type: String,
    },
    editRoute: {
        type: String,
        required: true,
    },
});

const profileImageUrl = computed(() => {
    return props.avartarUrl ?? "/storage/images/default-contact.png";
});

const emit = defineEmits(["openDeleteModal"]);

const openModal = () => {
    emit("openDeleteModal");
};
</script>
<template>
    <div class="group relative">
        <div
            class="flex justify-between gap-6 rounded-2xl bg-white p-2 shadow-md transition-all duration-200 group-hover:bg-neutral-200 group-hover:ring-2"
        >
            <div
                class="flex h-16 w-20 items-center justify-center overflow-hidden rounded-full"
            >
                <img :src="profileImageUrl" alt="avatar-img" class="h-full" />
            </div>
            <div class="flex w-full items-center justify-evenly">
                <h2>
                    <slot
                        name="name"
                        class="block truncate text-lg font-bold"
                    />
                </h2>
                <h3>
                    <slot
                        name="data"
                        class="mt-1 block truncate text-neutral-600"
                    />
                </h3>
                <span>
                    <slot
                        name="contact"
                        class="mt-1 truncate text-neutral-900"
                    />
                </span>
            </div>
            <div class="flex w-1/12 items-center justify-between">
                <Link
                    :href="editRoute"
                    class="block rounded-full text-2xl text-orange-500 transition-all duration-200 hover:text-orange-700"
                >
                    <font-awesome-icon
                        :icon="{ prefix: 'fa', iconName: 'pen-to-square' }"
                    />
                </Link>
                <button
                    @click="openModal"
                    class="block rounded-full text-2xl text-red-500 transition-all duration-200 hover:text-red-700"
                >
                    <font-awesome-icon
                        :icon="{ prefix: 'fa', iconName: 'trash' }"
                    />
                </button>
            </div>
        </div>
    </div>
</template>

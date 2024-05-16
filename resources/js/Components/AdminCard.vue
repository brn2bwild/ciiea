<script setup>
const props = defineProps({
    editRoute: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["openDeleteModal"]);

const openModal = () => {
    emit("openDeleteModal");
};
</script>
<template>
    <div class="relative group">
        <div
            class="flex justify-between gap-6 bg-white group-hover:bg-neutral-200 group-hover:ring-2 transition-all duration-200 rounded-xl shadow-md p-2"
        >
            <div class="w-20 flex items-start justify-center">
                <img
                    src="/storage/images/default-contact.png"
                    alt="avatar-img"
                    class=""
                />
            </div>
            <div class="w-full flex items-center justify-evenly">
                <h2>
                    <slot
                        name="title"
                        class="block text-lg font-bold truncate"
                    />
                </h2>
                <h3>
                    <slot
                        name="subtitle"
                        class="block text-neutral-600 mt-1 truncate"
                    />
                </h3>
                <span>
                    <slot
                        name="content"
                        class="text-neutral-900 mt-1 truncate"
                    />
                </span>
            </div>
            <div class="w-1/12 flex items-center justify-between">
                <Link
                    :href="editRoute"
                    class="block transition-all duration-200 text-2xl text-orange-500 hover:text-orange-700 rounded-full"
                >
                    <font-awesome-icon
                        :icon="{ prefix: 'fa', iconName: 'pen-to-square' }"
                    />
                </Link>
                <button
                    @click="openModal"
                    class="block transition-all duration-200 text-2xl text-red-500 hover:text-red-700 rounded-full"
                >
                    <font-awesome-icon
                        :icon="{ prefix: 'fa', iconName: 'trash' }"
                    />
                </button>
            </div>
        </div>
    </div>
</template>

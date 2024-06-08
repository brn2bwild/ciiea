<script setup>
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    uploadImageRoute: {
        type: String,
        required: true,
    },
    avatarUrl: {
        type: String,
    },
    userId: {
        type: Number,
        required: true,
    },
});

const profileImageUrl = computed(() => {
    return props.avatarUrl ?? "/storage/images/default-contact.png";
});

const cameraIcon = computed(() => {
    return props.avatarUrl === null ? "camera" : "camera-rotate";
});

const avatarForm = useForm({
    id: props.userId,
    image: null,
});

const handleSubmitImage = () => {
    if (avatarForm.image) {
        avatarForm.post(props.uploadImageRoute, {
            onSuccess: () => {
                console.log("imagen");
            },
        });
    }
};
</script>

<template>
    <div class="relative">
        <img
            :src="profileImageUrl"
            alt="avatar"
            class="z-0 flex h-[320px] w-[320px] justify-start overflow-hidden rounded-full object-cover"
        />
        <label
            for="avatar-image"
            class="absolute top-[250px] cursor-pointer rounded-full bg-neutral-800 p-4 opacity-50"
        >
            <font-awesome-icon
                class="text-3xl text-white"
                :icon="{
                    prefix: 'fa',
                    iconName: cameraIcon,
                }"
            />
            <form @submit.prevent="handleSubmitImage">
                <input
                    @change="handleSubmitImage"
                    @input="avatarForm.image = $event.target.files[0]"
                    id="avatar-image"
                    type="file"
                    accept="image/*"
                    class="hidden"
                    ref="avatarForm.image"
                />
            </form>
        </label>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
	modelValue: {
		type: String,
		required: true,
	},
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute('autofocus')) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
	<input class="border-gray-300 focus:border-sky-900 focus:ring-sky-900 rounded-md shadow-sm" :value=" modelValue "
		@input="$emit( 'update:modelValue', $event.target.value )" ref="input" />
</template>

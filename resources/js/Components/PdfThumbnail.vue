<script setup>
import { VuePDF, usePDF } from '@tato30/vue-pdf';

const props = defineProps({
	url: {
		type: String,
		required: true
	}
})

const { pdf } = usePDF('/' + props.url)
</script>

<template>
	<VuePDF :pdf=" pdf " />
</template>

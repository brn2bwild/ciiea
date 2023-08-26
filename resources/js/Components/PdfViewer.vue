<script setup>
import { VuePDF, usePDF } from '@tato30/vue-pdf';
import { ref } from 'vue';
const { pdf, pages, info } = usePDF('/' + props.url)

const page = ref(1);

console.log(pdf);

const props = defineProps({
	url: {
		type: String,
		required: true,
	}
})
</script>
<template>
	<div class="relative rounded overflow-hidden">
		<div class="absolute z-10 w-full h-full flex justify-between rounded">
			<button @click="page = page > 1 ? page - 1 : page"
				class="h-full bg-neutral-900 bg-opacity-5 hover:bg-opacity-30 transition duration-200 text-neutral-50 p-2">
				<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'angle-left' } " style="color: white;" />

			</button>
			<!-- <span>{{ page }} / {{ pages }}</span> -->
			<button @click="page = page < pages ? page + 1 : page"
				class="h-full bg-neutral-900 bg-opacity-5 hover:bg-opacity-30 transition duration-200 text-neutral-50 p-2">
				<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'angle-right' } " style="color: white;" />
			</button>
		</div>
		<VuePDF :pdf=" pdf " :page=" page "></VuePDF>
	</div>
</template>

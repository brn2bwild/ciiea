<script setup>
defineProps({
	documentUrl: {
		type: String,
		required: true
	}
})
</script>

<template>
	<div>
		<iframe title="PDF" width="100%" height="1000px"
			:src=" `/pdfjs-3.4.379-dist/web/viewer.html?file=${ documentUrl }` "></iframe>
	</div>
</template>

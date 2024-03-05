<script setup>

const props = defineProps({
	avatarUrl: {
		type: String,
		required: true
	}
})
</script>

<template>
	<div>
		<img v-if="props.avatarUrl !== ''" :src="props.avatarUrl" alt="avatar" />
		<label v-else for="avatar-file" class="cursor-pointer">
			<span>Buscar</span>
			<span>{{ props.avatarUrl }}</span>
			<input id="avatar-file" type="file" accept="image/*" class="hidden" ref="avatarForm.file" />
		</label>
	</div>
</template>


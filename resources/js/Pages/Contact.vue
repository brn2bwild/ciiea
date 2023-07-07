<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout,
});

defineProps({
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean
	}
});

</script>
<template>
	<Head title="Contacto" />
	<!-- <HomeLayout :canLogin=" canLogin "> -->
		<div class="w-full py-16 px-10 grid grid-cols-1 md:grid-cols-3 gap-4">
			<div class="bg-transparent w-full rounded-sm flex gap-4 relative">
				<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
				<div class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-52 left-14 z-10">
					<h1 class="text-white text-lg mb-4 font-bold">
						Miguel Ordoñez Ordoñez
					</h1>
					<span class="text-white">
						Director general
					</span>
					<p class="flex justify-start text-white my-2">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
						<a href="https://whatsapp.com" class="ml-2">9234164</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
						<a href="https://outlook.com" class="ml-2">admin@example.com</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
						<a href="https://outlook.com" class="ml-2">@ciiea</a>
					</p>
				</div>
			</div>
			<div class="bg-transparent w-full rounded-sm flex gap-4 relative">
				<img class="h-64 w-64" src="/storage/images/default-contact.png" alt="default-contact">
				<div class="bg-rose-900 w-3/4 p-4 rounded-md absolute top-52 left-14 z-10">
					<h1 class="text-white text-lg mb-4 font-bold">
						Selene CIIEA
					</h1>
					<span class="text-white">
						Director de sistemas
					</span>
					<p class="flex justify-start text-white my-2">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
						<a href="https://whatsapp.com" class="ml-2">9223164</a>
					</p>
					<p class="flex justify-start text-white mb-2">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
						<a href="https://outlook.com" class="ml-2">sistemas@example.com</a>
					</p>
					<p class="flex justify-start text-white">
						<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
						<a href="https://outlook.com" class="ml-2">@sistemas_ciiea</a>
					</p>
				</div>
			</div>
		</div>
	<!-- </HomeLayout> -->
</template>

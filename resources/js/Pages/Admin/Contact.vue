<script setup>
import { Head } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
	layout: AdminLayout,
});

</script>
<template>
	<Head title="Contacto" />
	<!-- <AdminLayout> -->
	<div class="w-full py-8 px-10 grid grid-cols-1 md:grid-cols-3 gap-4">
		<div class="bg-rose-900 w-full rounded-sm flex p-2 gap-4">
			<img class="h-32 w-32" src="/storage/images/default-contact.png" alt="default-contact">
			<div class="bg-transparent w-3/4">
				<h1 class="text-white text-lg">
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
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">@ciiea</a>
				</p>
			</div>
		</div>
		<div class="bg-rose-900 w-full rounded-sm flex p-2 gap-4">
			<img class="h-32 w-32" src="/storage/images/default-contact.png" alt="default-contact">
			<div class="bg-transparent w-3/4">
				<h1 class="text-white text-lg">
					Selene CIIEA
				</h1>
				<span class="text-white">
					Departamento de sistemas
				</span>
				<p class="flex justify-start text-white my-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'phone' } " size="lg" style="color: white;" />
					<a href="https://whatsapp.com" class="ml-2">9234132</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'envelope' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">sistemas@example.com</a>
				</p>
				<p class="flex justify-start text-white mb-2">
					<font-awesome-icon :icon=" { prefix: 'fab', iconName: 'twitter' } " size="lg" style="color: white;" />
					<a href="https://outlook.com" class="ml-2">@sistemas_ciiea</a>
				</p>
			</div>
		</div>
	</div>
	<!-- </AdminLayout> -->
</template>

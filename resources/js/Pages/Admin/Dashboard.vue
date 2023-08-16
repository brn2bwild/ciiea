<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineOptions({
	layout: AdminLayout,
});

defineProps({
	books: {
		type: Number,
		require: true,
		default: 0,
	},
	magazines: {
		type: Number,
		require: true,
		default: 0,
	},
	publications: {
		type: Number,
		require: true,
		default: 0,
	},
	investigations: {
		type: Number,
		require: true,
		default: 0,
	},
	admin_users: {
		type: Number,
		require: true,
		default: 0,
	},
	users: {
		type: Number,
		require: true,
		default: 0,
	}
});

</script>
<template>
	<Head title="Dashboard" />
	<h1 class="text-3xl font-bold pl-8">Dashboard</h1>
	<section class="w-full p-8 grid grid-cols-1 md:grid-cols-4 gap-4">
		<Link :href=" route( 'admin.books.index' ) "
			class="flex flex-col justify-between rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900 px-8 py-6 h-40">
		<div class="text-xl font-medium leading-tight text-neutral-800 dark:text-white">
			Libros
		</div>
		<div class="text-neutral-600 dark:text-neutral-200 flex justify-between items-end">
			<span class="text-3xl">{{ books }}</span>
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'book' } " size="3x" style="color: white;" class="pr-4" />
		</div>
		</Link>
		<Link :href=" route( 'admin.magazines.index' ) "
			class="flex flex-col justify-between rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900 px-8 py-6 h-40">
		<div class="text-xl font-medium leading-tight text-neutral-800 dark:text-white">
			Revistas
		</div>
		<div class="text-neutral-600 dark:text-neutral-200 flex justify-between items-end">
			<span class="text-3xl">{{ magazines }}</span>
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'book-open' } " size="3x" style="color: white;" class="pr-4" />
		</div>
		</Link>
		<Link :href=" route( 'admin.books.index' ) "
			class="flex flex-col justify-between rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900 px-8 py-6 h-40">
		<div class="text-xl font-medium leading-tight text-neutral-800 dark:text-white">
			Publicaciones históricas
		</div>
		<div class="text-neutral-600 dark:text-neutral-200 flex justify-between items-end">
			<span class="text-3xl">{{ publications }}</span>
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'file' } " size="3x" style="color: white;" class="pr-4" />
		</div>
		</Link>
		<Link :href=" route( 'admin.books.index' ) "
			class="flex flex-col justify-between rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900 px-8 py-6 h-40">
		<div class="text-xl font-medium leading-tight text-neutral-800 dark:text-white">
			Investigaciones
		</div>
		<div class="text-neutral-600 dark:text-neutral-200 flex justify-between items-end">
			<span class="text-3xl">{{ investigations }}</span>
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'magnifying-glass' } " size="3x" style="color: white;"
				class="pr-4" />
		</div>
		</Link>
	</section>
	<section class="w-full p-8 grid grid-cols-1 md:grid-cols-4 gap-4">
		<Link :href=" route( 'admin.books.index' ) "
			class="flex flex-col justify-between rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900 px-8 py-6 h-40">
		<div class="text-xl font-medium leading-tight text-neutral-800 dark:text-white">
			Administradores
		</div>
		<div class="text-neutral-600 dark:text-neutral-200 flex justify-between items-end">
			<span class="text-3xl">{{ admin_users }}</span>
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'user-lock' } " size="3x" style="color: white;" class="pr-4" />
		</div>
		</Link>
		<Link :href=" route( 'admin.books.index' ) "
			class="flex flex-col justify-between rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-rose-900 px-8 py-6 h-40">
		<div class="text-xl font-medium leading-tight text-neutral-800 dark:text-white">
			Usuarios
		</div>
		<div class="text-neutral-600 dark:text-neutral-200 flex justify-between items-end">
			<span class="text-3xl">{{ users }}</span>
			<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'users' } " size="3x" style="color: white;" class="pr-4" />
		</div>
		</Link>
	</section>
</template>

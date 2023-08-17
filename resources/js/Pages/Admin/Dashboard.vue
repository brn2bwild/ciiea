<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import CountCard from "@/Components/CountCard.vue";

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
		<CountCard :route="route('admin.books.index')" :count="books" :text="'Libros'" :icon="'book'"/>
		<CountCard :route="route('admin.magazines.index')"	:count="magazines" :text="'Revistas'" :icon="'book-open'"/>
		<CountCard :route="route('admin.historical-publications.index')" :count="publications" :text="'Publicaciones históricas'" :icon="'file'"/>
		<CountCard :route="route('admin.investigations.index')" :count="investigations" :text="'Investigaciones'" :icon="'magnifying-glass'"/>
	</section>
	<section class="w-full p-8 grid grid-cols-1 md:grid-cols-4 gap-4">
		<CountCard :route="route('admin.books.index')" :count="admin_users" :text="'Administradores'" :icon="'user-lock'"/>
		<CountCard :route="route('admin.books.index')" :count="users" :text="'Usuarios'" :icon="'users'"/>
	</section>
</template>

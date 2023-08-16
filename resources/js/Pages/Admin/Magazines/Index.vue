<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineOptions({
	layout: AdminLayout
});

defineProps({
	magazines: {
		type: Array,
		required: true,
	}
});
</script>

<template>
	<Head title="Revistas" />
	<h1 class="text-3xl font-bold pl-8">Revistas</h1>
	<div class="w-full p-8">
		<section class="w-full bg-white rounded p-8">
			<table class="w-full table-auto">
				<thead>
					<th>
						Nombre
					</th>
					<th>
						Fecha de publicación
					</th>
					<th>
						Etiquetas
					</th>
					<th>
						Acciones
					</th>
				</thead>
				<tbody>
					<tr v-for="       magazine        in        magazines        " :key=" magazine.index ">
						<td>
							{{ magazine.name.substr( 1, 30 ) }}...
						</td>
						<td>
							{{ magazine.publicated_at }}
						</td>
						<td>
							<span v-for=" tag  in  magazine.tags " :key=" tag.index ">
								{{ tag }}
							</span>
						</td>
						<td class="flex justify-between gap-4">
							<Link :href=" route( 'admin.magazines.edit', magazine.id ) ">Editar</Link>
							<!-- <Link @click="handleOpenModal" method="post" as="button" :href=" route( 'admin.magazines.destroy', magazine.id ) ">Eliminar</Link> -->
							<button @click="handleOpenModal( magazine.id )">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
	</div>

	<!-- <Modal @close=" handleCloseModal " :show=" showModal " :max-width=" 'lg' ">
		<div class="p-8">
			<div class="w-full flex flex-col justify-center items-center">
				<h2 class="text-xl">¿Deseas eliminar el libro?</h2>
				<div class="w-full flex justify-end mt-8 gap-4">
					<DangerButton @click="handleDeletemagazine()">Eliminar</DangerButton>
					<SecondaryButton @click="handleCloseModal()">Cancelar</SecondaryButton>
				</div>
			</div>
		</div>
	</Modal> -->
</template>

<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
});

defineProps({
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean,
	}
});

function saludar() {
	alert('hola');
}
</script>
<template>
	<Head title="Convocatorias" />
	<!-- <div class="w-full p-8 flex justify-end items-center">
		<input class="text-neutral-900 rounded-full bg-neutral-200 focus:ring-neutral-400 focus:ring-2 ring-0 border-0 w-1/2" type="text"
			placeholder="Buscar convocatoria por nombre">
	</div> -->
	<div class="w-full px-16 py-16 grid grid-cols-1 md:grid-cols-3">
		<div class="col-span-2 flex flex-col gap-y-6">
			<a href="#" class="group">
				<div class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900">
					<div class="px-4 py-2 text-neutral-800">
						<div class="flex justify-start items-center">
							<h1 class="font-bold text-xl mr-4">Cine debate</h1>
							<h3 @click.prevent-default=" saludar " class="text-neutral-600 mr-2 hover:underline">Publicado por Daniel
								Pérez Flores</h3>
							<h3 class="text-neutral-600">hace 3 horas</h3>
						</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nulla excepturi modi, at officia id molestiae
							natus mollitia unde laudantium! Nesciunt eum, veritatis ab possimus autem corrupti voluptatem! Non, alias!
						</p>
					</div>
					<img class="" src="/storage/convocations/conv1.jpg" alt="conv1" />
					<div class="w-full py-2 flex justify-evenly items-center text-neutral-800">
						<Link :href=" route( 'home' ) " class="hover:text-green-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " /> 9
						</Link>
						<Link :href=" route( 'home' ) " class="hover:text-rose-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 10
						</Link>
					</div>
				</div>
			</a>
			<a href="#" class="group">
				<div class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900">
					<div class="px-4 py-2 text-neutral-800">
						<div class="flex justify-start items-center">
							<h1 class="font-bold text-xl mr-4">Cine debate</h1>
							<h3 @click.prevent-default=" saludar " class="text-neutral-600 mr-2 hover:underline">Publicado por Daniel
								Pérez Flores</h3>
							<h3 class="text-neutral-600">hace 3 horas</h3>
						</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nulla excepturi modi, at officia id molestiae
							natus mollitia unde laudantium! Nesciunt eum, veritatis ab possimus autem corrupti voluptatem! Non, alias!
						</p>
					</div>
					<!-- <img class="" src="/storage/convocations/conv1.jpg" alt="conv1" /> -->
					<div class="w-full py-2 flex justify-evenly items-center text-neutral-800">
						<Link :href=" route( 'home' ) " class="hover:text-green-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " /> 34
						</Link>
						<Link :href=" route( 'home' ) " class="hover:text-rose-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 21
						</Link>
					</div>
				</div>
			</a>
			<a href="#" class="group">
				<div class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900">
					<div class="px-4 py-2 text-neutral-800">
						<div class="flex justify-start items-center">
							<h1 class="font-bold text-xl mr-4">Cine debate</h1>
							<h3 @click.prevent-default=" saludar " class="text-neutral-600 mr-2 hover:underline">Publicado por Daniel
								Pérez Flores</h3>
							<h3 class="text-neutral-600">hace 3 horas</h3>
						</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nulla excepturi modi, at officia id molestiae
							natus mollitia unde laudantium! Nesciunt eum, veritatis ab possimus autem corrupti voluptatem! Non, alias!
						</p>
					</div>
					<img class="" src="/storage/convocations/conv2.jpg" alt="conv2" />
					<div class="w-full py-2 flex justify-evenly items-center text-neutral-800">
						<Link :href=" route( 'home' ) " class="hover:text-green-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " /> 23
						</Link>
						<Link :href=" route( 'home' ) " class="hover:text-rose-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 16
						</Link>
					</div>
				</div>
			</a>
			<a href="#" class="group">
				<div class="block rounded-lg bg-neutral-50 group-hover:ring-1 group-hover:ring-rose-900">
					<div class="px-4 py-2 text-neutral-800">
						<div class="flex justify-start items-center">
							<h1 class="font-bold text-xl mr-4">Cine debate</h1>
							<h3 @click.prevent-default=" saludar " class="text-neutral-600 mr-2 hover:underline">Publicado por Daniel
								Pérez Flores</h3>
							<h3 class="text-neutral-600">hace 3 horas</h3>
						</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nulla excepturi modi, at officia id molestiae
							natus mollitia unde laudantium! Nesciunt eum, veritatis ab possimus autem corrupti voluptatem! Non, alias!
						</p>
					</div>
					<img class="" src="/storage/convocations/conv3.jpg" alt="conv3" />
					<div class="w-full py-2 flex justify-evenly items-center text-neutral-800">
						<Link :href=" route( 'home' ) " class="hover:text-green-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " /> 3
						</Link>
						<Link :href=" route( 'home' ) " class="hover:text-rose-500">
						<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " /> 2
						</Link>
					</div>
				</div>
			</a>
		</div>
	</div>
</template>
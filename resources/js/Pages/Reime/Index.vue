<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
})

defineProps({
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean
	}
})
</script>
<template>
	<Head title="REIME" />
	<div class="w-full px-4 pt-20 pb-10 sm:p-8 flex justify-between relative gap-4">
		<section class="hidden w-1/4 sm:flex sm:flex-col h-full sticky top-20">
			<div class="flex flex-col bg-white rounded-lg pb-4 px-4 pt-2">
				<h1 class="text-neutral-500 font-medium">Investigadores destacados</h1>
				<div class="w-full hover:bg-neutral-200 rounded-lg px-4 py-2 cursor-pointer mt-4 flex justify-start">
					<img src="/storage/images/default-contact.png" alt="contacto" class="h-12 w-12 mr-4">
					<div class="flex items-center">
						<h5 class="font-bold">Ciro Gómez Leyva</h5>
					</div>
				</div>
				<div class="w-full hover:bg-neutral-200 rounded-lg px-4 py-2 cursor-pointer mt-4 flex justify-start">
					<img src="/storage/images/default-contact.png" alt="contacto" class="h-12 w-12 mr-4">
					<div class="flex items-center">
						<h5 class="font-bold">Ernesto Guzmán Sánchez</h5>
					</div>
				</div>
				<div class="w-full hover:bg-neutral-200 rounded-lg px-4 py-2 cursor-pointer mt-4 flex justify-start">
					<img src="/storage/images/default-contact.png" alt="contacto" class="h-12 w-12 mr-4">
					<div class="flex items-center">
						<h5 class="font-bold">Jaime López Méndez</h5>
					</div>
				</div>
			</div>
		</section>
		<section class="w-1/2 flex flex-col gap-y-6">
			<div class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-rose-900">
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
			<div class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-rose-900">
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
			<div class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-rose-900">
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
			<div class="rounded-lg bg-white ring-1 ring-neutral-200 hover:ring-1 hover:ring-rose-900">
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
		</section>
		<section class="hidden w-1/4 sm:flex sm:flex-col h-full sticky top-20">
			<div class="flex flex-col bg-white rounded-lg pb-4 px-4 pt-2 mb-6">
				<h1 class="text-neutral-500 font-medium">Publicaciones destacadas</h1>
				<div class="w-full bg-neutral-200 rounded-lg px-4 py-2 cursor-pointer mt-4">
					<div class="flex justify-between mb-2">
						<h5 class="font-bold">Publicación 1</h5>
						<h5>
							<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " />
							15
						</h5>
						<h5>
							<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " />
							30
						</h5>
					</div>
					<p>
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint natus tempora asperiores fugit facilis amet
						recusandae quia...
					</p>
				</div>
				<div class="w-full bg-neutral-200 rounded-lg px-4 py-2 cursor-pointer mt-4">
					<div class="flex justify-between mb-2">
						<h5 class="font-bold">Publicación 2</h5>
						<h5>
							<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " />
							15
						</h5>
						<h5>
							<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " />
							30
						</h5>
					</div>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis temporibus nesciunt eos ea...
					</p>
				</div>
				<div class="w-full bg-neutral-200 rounded-lg px-4 py-2 cursor-pointer mt-4">
					<div class="flex justify-between mb-2">
						<h5 class="font-bold">Publicación 3</h5>
						<h5>
							<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'comment' } " />
							15
						</h5>
						<h5>
							<font-awesome-icon :icon=" { prefix: 'fa', iconName: 'heart' } " />
							30
						</h5>
					</div>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum debitis tempora veritatis minima...
					</p>
				</div>
			</div>
		</section>
	</div>
</template>

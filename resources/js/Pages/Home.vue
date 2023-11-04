<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
	layout: HomeLayout
})

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
})


</script>

<template>
	<Head title="Inicio" />
	<section class="w-full overflow-hidden">
			<img v-lazy=" '/storage/images/CIIEA.jpg' " class="w-full h-80 sm:h-[600px] object-cover object-left" />
			<!-- <div
				class="w-full sm:w-1/2 min-h-full sm:px-8 sm:py-6 p-4 bg-rose-900 text-white text-center flex flex-col items-center justify-center">
				<h1 class="w-full text-3xl font-medium">
					¿Qué es el CIIEA?
				</h1>
				<p class="w-full mt-4 text-md font-extralight leading-7 px-4 sm:px-20">
					El CIIEA es un órgano descentralizado de la Secretaria de Educacion, que desarrolla funciones de investigación,
					innovación, servicios académicos, vinculación y difusión.
				</p>
			</div> -->
	</section>
	<section class="w-full flex justify-center text-center py-14">
		<div class="w-2/3">
			<h1 class="w-full text-2xl font-bold text-neutral-800">
				¿Qué es el CIIEA?
			</h1>
			<p class="w-full mt-4 text-neutral-700 text-md font-extralight leading-7 px-4 sm:px-20">
				El CIIEA es un órgano descentralizado de la Secretaria de Educacion, que desarrolla funciones de investigación,
				innovación, servicios académicos, vinculación y difusión.
			</p>
		</div>
	</section>
	<section class="min-h-1/2 w-full sm:px-40 pb-16 py-10">
		<div class="w-full grid grid-cols-1 md:grid-cols-3 gap-8">
			<div
				class="min-h-full px-10 py-6 bg-neutral-50 rounded-md text-neutral-900 text-center flex flex-col items-center justify-start leading-7">
				<span class="text-2xl font-bold text-neutral-800">Objetivo</span>
				<p class="mt-4 text-md font-extralight leading-6 text-neutral-700">
					Proponer y ejecutar las acciones necesarias, que contribuyan a elevar la calidad de la educación en el estado de
					Tabasco.
				</p>
			</div>
			<div
				class="min-h-full px-10 py-6 bg-neutral-50 rounded-md text-neutral-900 text-center flex flex-col items-center justify-start leading-7">
				<span class="text-2xl font-bold text-neutral-800">Misión</span>
				<p class="mt-4 text-md font-extralight leading-6 text-neutral-700">
					Desarrollar un centro público de investigación dedicado a la generación y divulgación de conocimientos
					especializados en la educación, para elevar la calidad educativa, la formación de recursos humanos, el
					fortalecimiento de los servicios académicos y la vinculación con los sectores públicos y privados.
				</p>
			</div>
			<div
				class="min-h-full px-10 py-6 bg-neutral-50 rounded-md text-neutral-900 text-center flex flex-col items-center justify-start leading-7">
				<span class="text-2xl font-bold text-neutral-800">Visión</span>
				<p class="mt-4 text-md font-extralight leading-6 text-neutral-700">
					Consolidar al CIIEA como una institución reconocida en la generacion de investigación educativa, con la
					participacion de profesionales que generen programas, proyectos y productos de investigación que respondan a las
					necesidades educativas del estado.
				</p>
			</div>
		</div>
	</section>
	<!-- <section class="w-full min-h-screen py-16">
		<div class="flex justify-center mb-12">
			<h1 class="text-3xl font-medium">Últimas convocatorias</h1>
		</div>
		<div class="w-full h-[560px] flex justify-center items-center gap-1">
			<div
				class="bg-black w-80 h-[93%] hover:w-[90%] hover:h-[100%] m-0 ease-in-out transition-all duration-150 group rounded-sm relative cursor-pointer object-cover">
				<img class="w-full h-full object-cover opacity-95 group-hover:opacity-40 ease-in-out transition-all duration-150"
					src="/storage/convocations/conv1.jpg" alt="conv1" loading="lazy">
				<div
					class="absolute top-20 left-12 flex-col items-center justify-center hidden group-hover:block transition-all ease-in-out">
					<h1 class="top-24 left-10 text-white text-4xl font-medium mb-8">Cine debate</h1>
					<h2 class="hidden group-hover:block transition-transform ease-linear text-white text-xl font-medium">Esta es
						una breve descripción del cine debate.</h2>
				</div>
			</div>
			<div
				class="bg-black w-80 h-[93%] hover:w-[90%] hover:h-[100%] m-0 ease-in-out transition-all duration-150 group rounded-sm relative cursor-pointer object-cover">
				<img class="w-full h-full object-cover opacity-95 group-hover:opacity-40 ease-in-out transition-all duration-150"
					src="/storage/convocations/conv2.jpg" alt="conv2" loading="lazy">
				<div
					class="absolute top-20 left-12 flex-col items-center justify-center hidden group-hover:block transition-all ease-in-out">
					<h1 class="top-24 left-10 text-white text-4xl font-medium mb-8">Verano científico</h1>
					<h2 class="hidden group-hover:block transition-transform ease-linear text-white text-xl font-medium">Esta es
						una breve descripción del verano científico.</h2>
				</div>
			</div>
			<div
				class="bg-black w-80 h-[93%] hover:w-[90%] hover:h-[100%] m-0 ease-in-out transition-all duration-150 group rounded-sm relative cursor-pointer object-cover">
				<img class="w-full h-full object-cover opacity-95 group-hover:opacity-40 ease-in-out transition-all duration-150"
					src="/storage/convocations/conv3.jpg" alt="conv3" loading="lazy">
				<div
					class="absolute top-20 left-12 flex-col items-center justify-center hidden group-hover:block transition-all ease-in-out">
					<h1 class="top-24 left-10 text-white text-4xl font-medium mb-8">Nuevos miembros de la red</h1>
					<h2 class="hidden group-hover:block transition-transform ease-linear text-white text-xl font-medium">Esta es
						una breve descripción de los nuevos miembros de la red.</h2>
				</div>
			</div>
			<div
				class="bg-black w-80 h-[93%] hover:w-[90%] hover:h-[100%] m-0 ease-in-out transition-all duration-150 group rounded-sm relative cursor-pointer object-cover">
				<img class="w-full h-full object-cover opacity-95 group-hover:opacity-40 ease-in-out transition-all duration-150"
					src="/storage/convocations/conv4.jpg" alt="conv4" loading="lazy">
				<div
					class="absolute top-20 left-12 flex-col items-center justify-center hidden group-hover:block transition-all ease-in-out">
					<h1 class="top-24 left-10 text-white text-4xl font-medium mb-8">7° Foro Estatal de Investigación e Innovación
						Educativa</h1>
					<h2 class="hidden group-hover:block transition-transform ease-linear text-white text-xl font-medium">Esta es
						una breve descripción del foro.</h2>
				</div>
			</div>
		</div>
	</section> -->
</template>

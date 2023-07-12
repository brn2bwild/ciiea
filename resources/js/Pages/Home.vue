<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import { Head } from '@inertiajs/vue3';
// import HomeLayout from "../Layouts/HomeLayout.vue";

defineOptions({
	layout: HomeLayout
});

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
	laravelVersion: {
		type: String,
		required: true,
	},
	phpVersion: {
		type: String,
		required: true,
	},
});
</script>

<template>
	<Head title="Inicio" />
	<section class="w-full pb-12 m-auto">
		<img class="w-full object-cover" src="/storage/images/CIIEA.jpg" alt="ciiea">
	</section>
	<section class="min-h-1/2 w-full pb-8 px-20 grid grid-cols-1 md:grid-cols-4 gap-8">
		<div class="min-h-full text-xl px-8 py-6 bg-rose-900 rounded-md text-white text-center">
			<span class="text-3xl font-medium">¿Qué es el CIIEA?</span>
			<p class="mt-4 text-md font-extralight">
				El CIIEA es un órgano descentralizado de la Secretaria de Educacion, que desarrolla funciones de investigación,
				innovación, servicios académicos, vinculación y difusión.
			</p>
		</div>
		<div class="min-h-full text-xl px-8 py-6 bg-rose-900 rounded-md text-white text-center">
			<span class="text-3xl font-medium">Objetivo</span>
			<p class="mt-4 text-md font-extralight">
				Proponer y ejecutar las acciones necesarias, que contribuyan a elevar la calidad de la educación en el estado de
				Tabasco.
			</p>
		</div>
		<div class="min-h-full text-xl px-8 py-6 bg-rose-900 rounded-md text-white text-center">
			<span class="text-3xl font-medium">Misión</span>
			<p class="mt-4 text-md font-extralight">
				Desarrollar un centro público de investigación dedicado a la generación y divulgación de conocimientos
				especializados en la educación, para elevar la calidad educativa, la formación de recursos humanos, el
				fortalecimiento de los servicios académicos y la vinculación con los sectores públicos, privados.
			</p>
		</div>
		<div class="min-h-full text-xl px-8 py-6 bg-rose-900 rounded-md text-white text-center">
			<span class="text-3xl font-medium">Visión</span>
			<p class="mt-4 text-md font-extralight">
				Consolidar al CIIEA como una institución reconocida en la generacion de investigación educativa, con la
				participacion de profesionales que generen programas,proyectos y productos de investigación que respondan a las
				necesidades educativas del estado.
			</p>
		</div>
	</section>
	<section class="w-full min-h-screen py-16">
		<div class="flex justify-center mb-12">
			<h1 class="text-3xl font-medium">Últimas convocatorias</h1>
		</div>
		<div class="w-full h-[560px] flex justify-center items-center gap-1">
			<div
				class="bg-black w-80 h-[93%] hover:w-[90%] hover:h-[100%] m-0 ease-in-out transition-all duration-150 group rounded-sm relative cursor-pointer object-cover">
				<img class="w-full h-full object-cover opacity-95 group-hover:opacity-40 ease-in-out transition-all duration-150"
					src="/storage/convocations/conv1.jpg" alt="conv1">
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
					src="/storage/convocations/conv2.jpg" alt="conv2">
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
					src="/storage/convocations/conv3.jpg" alt="conv3">
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
					src="/storage/convocations/conv4.jpg" alt="conv4">
				<div
					class="absolute top-20 left-12 flex-col items-center justify-center hidden group-hover:block transition-all ease-in-out">
					<h1 class="top-24 left-10 text-white text-4xl font-medium mb-8">7° Foro Estatal de Investigación e Innovación
						Educativa</h1>
					<h2 class="hidden group-hover:block transition-transform ease-linear text-white text-xl font-medium">Esta es
						una breve descripción del foro.</h2>
				</div>
			</div>
		</div>
	</section>
</template>

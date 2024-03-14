<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout
});

defineProps({
	convocations: {
		type: Object,
	},
	canLogin: {
		type: Boolean
	},
	canRegister: {
		type: Boolean,
	}
});

</script>

<template>

	<Head title="Convocatorias" />
	<!-- <div class="w-full p-8 flex justify-end items-center">
		<input class="text-neutral-900 rounded-full bg-neutral-200 focus:ring-neutral-400 focus:ring-2 ring-0 border-0 w-1/2" type="text"
			placeholder="Buscar convocatoria por nombre">
	</div> -->
	<div class="w-full flex flex-col items-center justify-center sm:px-60 sm:py-10">
		<section class="w-full pt-10 pb-20">
			<div
				class="w-full h-full rounded-xl overflow-hidden flex justify-between items-center bg-white shadow-lg shadow-slate-100">
				<div class="w-1/2 p-4">
					<h5 class="text-neutral-500 font-sans">
						{{ convocations[ 0 ].date }} - {{ convocations[ 0 ].time }}
					</h5>
					<h1 class="text-3xl font-extrabold font-sans mt-2 text-neutral-700">
						{{ convocations[ 0 ].name }}
					</h1>
					<h2 class="text-lg font-medium text-neutral-600 mt-2 mb-4">
						{{ convocations[ 0 ].description.substr( 0, 100 ) }}
					</h2>
					<Link :href=" route( 'convocations.show', convocations[ 0 ].slug ) "
						class="bg-sky-500 px-4 py-2 rounded-xl text-neutral-50 font-bold">
					Leer más
					</Link>
				</div>
				<div class="w-1/2 object-fill overflow-hidden">
					<img class="h-full scale-125"
						:src=" '/storage/' + ( convocations[ 0 ].image ? convocations[ 0 ].image.path : '/images/magazines-optimized.jpg' ) "
						:alt=" ( convocations[ 0 ].image ? convocations[ 0 ].image.name : 'default-image' ) ">

				</div>
			</div>
		</section>
		<section class="w-full pb-6">
			<h1 class="text-xl text-neutral-600 font-bold">Últimas Convocatorias</h1>
		</section>
		<section class="w-full grid grid-cols-1 sm:grid-cols-2 gap-10">
			<div
				v-for="                      convocation                       in                       convocations                      "
				:key=" convocation.index "
				class="w-full rounded-xl flex flex-col justify-center items-start bg-white shadow-lg shadow-slate-100">
				<!-- <div class="w-full mb-2">
					<img src="/storage/convocations/conv1.jpg" :alt=" 'convocation' + convocation.index " />
				</div> -->
				<div class="w-full h-full flex flex-col items-start justify-between p-4 gap-2">
					<h3 class="text-neutral-600 text-sm">
						{{ convocation.date }} - {{ convocation.time }}
					</h3>
					<h1 class="w-full font-bold text-xl mr-4 text-neutral-900">{{ convocation.name }}</h1>
					<p>
						{{ convocation.description.substr( 0, 100 ) }}...
					</p>
					<h3 class="text-neutral-600 text-sm">
						Publicado hace 3 horas
					</h3>
					<Link :href=" route( 'convocations.show', convocation.slug ) "
						class="bg-sky-500 px-4 py-2 rounded-lg text-neutral-50 font-bold text-sm">
					Leer más
					</Link>
				</div>
			</div>
		</section>
	</div>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue"
import { Head } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout,
})

defineProps({
	software: {
		type: Object,
		required: true
	}
})
</script>

<template>
	<div>
		<Head title="Software Educativo" />
		<section class="w-full min-h-screen px-80 pb-10">
			<h1 class="w-full text-left text-6xl pt-12 font-bold">
				{{ software.name }}
			</h1>
			<div class="flex justify-between items-center mt-10 gap-8">
				<div>
					<p class="w-full text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, hic harum,
						dolorum facere
						dolor officia
						ipsum in tempore ullam recusandae maxime. Quod doloremque nobis sunt corrupti unde repellendus vero
						nesciunt?
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad odio quis et eum? Eos veniam blanditiis aliquam
						molestiae inventore, ipsam placeat distinctio iusto magnam error modi? Itaque quidem dicta tempore! Lorem
						ipsum dolor, sit amet consectetur adipisicing elit. Dolor illo culpa, nisi a possimus optio minima ipsum
						natus
						autem quaerat. Veritatis quis ea adipisci esse ipsam dicta, earum ad distinctio.
					</p>
					<div class="py-10 flex justify-center">
						<Link class="bg-sky-500 px-4 py-2 rounded-xl text-neutral-50 font-bold text-sm">Descargar</Link>
					</div>
				</div>
				<img class="w-1/2 h-[600px] object-cover"
					:src=" '/storage/' + ( software.image ? software.image.path : '/images/magazines-optimized.jpg' ) "
					:alt=" ( software.image ? software.image.name : 'default-software-image' ) ">
			</div>
		</section>
	</div>
</template>

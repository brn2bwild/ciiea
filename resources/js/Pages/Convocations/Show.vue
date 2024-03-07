<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue"
import { Head } from "@inertiajs/vue3";

defineOptions({
	layout: HomeLayout,
})

defineProps({
	convocation: {
		type: Object,
		required: true
	}
})
</script>

<template>
	<div>

		<Head title="Convocatoria" />
		<section class="w-full min-h-screen px-80 pb-10">
			<h1 class="w-full text-left text-6xl pt-12 font-bold">
				{{ convocation.name }}
			</h1>
			<h2 class="mt-6 text-xl text-neutral-800">
				{{ convocation.location }}
			</h2>
			<div class="w-full flex justify-start gap-2 text-xl text-neutral-800">
				<h2>
					{{ convocation.date }}
				</h2>
				<h2>
					{{ convocation.time }}
				</h2>

			</div>
			<div class="flex justify-between items-center mt-10 gap-8">
				<p class="w-1/2 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, hic harum,
					dolorum facere
					dolor officia
					ipsum in tempore ullam recusandae maxime. Quod doloremque nobis sunt corrupti unde repellendus vero nesciunt?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad odio quis et eum? Eos veniam blanditiis aliquam
					molestiae inventore, ipsam placeat distinctio iusto magnam error modi? Itaque quidem dicta tempore! Lorem
					ipsum dolor, sit amet consectetur adipisicing elit. Dolor illo culpa, nisi a possimus optio minima ipsum natus
					autem quaerat. Veritatis quis ea adipisci esse ipsam dicta, earum ad distinctio.
				</p>
				<img class="w-1/2 h-[600px] object-cover" src="/storage/images/books.jpg" alt="books">
			</div>
			<!-- <div class="py-10">
				<h1 class="w-full text-center text-3xl font-medium">Información adicional</h1>

			</div> -->
		</section>
	</div>
</template>

<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({
    layout: HomeLayout,
});
</script>

<template>
    <Head title="Prácticas Profesionales" />
    <div>
        <section class="min-h-screen w-full px-20 pb-10 lg:px-80">
          
            <h1 class="pt-16 text-center text-4xl font-bold">
                Prácticas Profesionales
            </h1>
            
            <div class="mt-10 flex flex-col lg:flex-row items-center gap-8">
                <div class="w-full lg:w-1/2">
                    <p class="text-justify">
                        <strong class="mb-4 block"> Objetivo </strong>
                        Generar un espacio para que alumnos que están por
                        concluir sus estudios, asistan a realizar su proceso de
                        servicio social, residencia profesional o práctica
                        profesional a través de la realización de proyectos
                        acorde a su perfil académico y a los intereses del
                        Centro de Investigación e Innovación para la Enseñanza y
                        el Aprendizaje (CIIEA).
                        <strong class="mt-4 block"> Requisitos </strong>
                        <br />
                    </p>
                    <ul class="flex flex-col gap-4">
                        <li>
                            1. El alumno entrega Carta de presentación elaborada
                            y firmada por el área correspondiente de la
                            Institución educativa de donde pertenece.
                        </li>
                        <li>
                            2. Las áreas correspondientes del CIIEA, determinan
                            previo análisis del perfil del alumno, si es
                            factible o no su aceptación.
                        </li>
                        <li>
                            3. Una vez aceptado, el alumno junto con personal
                            del área correspondiente del CIIEA, determinan el
                            proyecto que realizará considerando que sea tanto de
                            interés para el perfil del alumno como para el
                            CIIEA.
                        </li>
                        <li>
                            4. El CIIEA, elabora por escrito la Carta de
                            aceptación del alumno, firmada por la Dirección
                            General, para que la entregue en el área
                            correspondiente de su institución.
                        </li>
                        <li>
                            5. Tanto el CIIEA como la institución educativa de
                            procedencia del alumno, asignan un asesor interno y
                            externo para que den seguimiento al proyecto a
                            realizar por el alumno, así como, definan horarios y
                            días de trabajo del alumno.
                        </li>
                        <li>
                            6. El CIIEA asigna a su vez un espacio físico para
                            que el alumno trabaje y pueda cumplir en tiempo y
                            forma con la realización del proyecto y las horas
                            que deberá de cubrir.
                        </li>
                        <li>
                            7. Al cumplir sus horas específicas de trabajo, las
                            áreas responsables del CIIEA y la Institución de
                            procedencia del alumno, organizan de manera
                            coordinada, una reunión para que el alumno exponga
                            los resultados obtenidos del proyecto.
                        </li>
                        <li>
                            8. Cumpliendo con los requisitos anteriores, el
                            CIIEA otorga la Carta de Liberación del alumno y de
                            esta manera se da por concluido el proceso de
                            servicio social, residencia o práctica profesional.
                        </li>
                    </ul>
                </div>
                
                <img
                    class="h-[500px] w-full object-cover lg:h-[800px] lg:w-1/2 lg:ml-8"
                    src="/storage/images/magazines-optimized.jpg"
                    alt="default-convocation-image"
                />
            </div>
        </section>
    </div>
</template>

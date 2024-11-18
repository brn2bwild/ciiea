<script setup>
import { faFacebook } from "@fortawesome/free-brands-svg-icons";
import { faLocationPin } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
</script>

<template>
    <footer class="relative w-full bg-white px-6 md:px-14">
        <div class="w-full flex justify-center py-6 md:py-10">
            <h1 class="w-full text-center text-lg font-medium text-neutral-600 md:text-xl">
                Centro de Investigación e Innovación para la Enseñanza y el Aprendizaje
            </h1>
        </div>
        <hr class="h-0.5 border-t-0 bg-neutral-300" />
        
        <div class="flex flex-col items-center justify-between py-8 md:flex-row">
            <!-- Redes sociales -->
            <div class="flex w-full md:w-1/3 items-center justify-center md:justify-start gap-4 md:gap-8">
                <a
                    href="https://www.facebook.com/ciiea2021?mibextid=ZbWKwL"
                    target="_blank"
                    class="group flex items-center gap-2 text-neutral-600"
                >
                    <FontAwesomeIcon
                        :icon="faFacebook"
                        class="text-2xl group-hover:text-blue-800"
                    />
                    <span class="text-sm group-hover:text-blue-800">CIIEA Tabasco</span>
                </a>
                <a
                    href="https://www.facebook.com/profile.php?id=100075874967463&mibextid=ZbWKwL"
                    target="_blank"
                    class="group flex items-center gap-2 text-neutral-600"
                >
                    <FontAwesomeIcon
                        :icon="faFacebook"
                        class="text-2xl group-hover:text-blue-800"
                    />
                    <span class="text-sm group-hover:text-blue-800">CIIEA Kids</span>
                </a>
            </div>
            
            <!-- Dirección y otros detalles -->
            <div class="flex flex-col md:flex-row w-full md:w-2/3 items-center justify-center md:justify-end gap-4 md:gap-8 mt-6 md:mt-0">
                <a
                    href="https://www.google.com/maps/place/Centro+de+Investigaci%C3%B3n+E+Innovaci%C3%B3n+Para+la+Ense%C3%B1anza+y+El+Aprendizaje+Ciiea/@17.5622834,-92.937948,16.92z/data=!4m14!1m7!3m6!1s0x47c3f700d23ec9b5:0xbfa42ae35885739d!2sSpatie!8m2!3d51.208773!4d4.4262415!16s%2Fg%2F1td2lnfj!3m5!1s0x85edb757e68858c3:0x9e0871be66d0e66c!8m2!3d17.5623421!4d-92.9369324!16s%2Fg%2F1vxcws9k?entry=ttu"
                    class="group flex items-center gap-2 w-full md:w-52 justify-center md:justify-start"
                >
                    <FontAwesomeIcon
                        :icon="faLocationPin"
                        class="hidden text-lg text-neutral-600 group-hover:text-red-400"
                    />
                    <span class="text-center text-xs text-neutral-600 group-hover:text-neutral-800">
                        Carretera a las Grutas S/N, Colonia Eureka y Belen, C.P. 86800 Teapa, Tabasco
                    </span>
                </a>
                <p class="w-full md:w-52 text-center text-xs text-neutral-600">
                    Horario de atención<br />
                    8:00 a.m. - 3:00 p.m. lunes a viernes
                </p>
                <p class="w-full md:w-52 text-center text-xs text-neutral-600">
                    Número telefónico<br />
                    932 322 3381
                </p>
            </div>
        </div>
        
        <div class="flex flex-col md:flex-row justify-center md:justify-end gap-4 px-4 md:px-10 py-6 text-center">
            <Link href="google.com" class="text-sm text-neutral-600">
                Privacidad
            </Link>
            <Link href="google.com" class="text-sm text-neutral-600">
                Términos y condiciones
            </Link>
            <span class="text-sm text-neutral-600">Derechos reservados</span>
        </div>
    </footer>
</template>

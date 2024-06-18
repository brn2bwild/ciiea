<template>
    <footer class="relative w-full bg-white">
        <div class="flex w-full justify-center py-10">
            <h1 class="text-xl font-medium text-neutral-500">
                Centro de Investigación e Innovación para la Enseñanza y el
                Aprendizaje
            </h1>
        </div>
        <div class="flex items-center justify-center pb-8">
            <div class="flex w-1/3 items-center justify-center gap-8">
                <a
                    href="https://facebook.com"
                    target="_blank"
                    class="flex items-center gap-2 text-neutral-500"
                >
                    <font-awesome-icon
                        :icon="['fab', 'facebook']"
                        class="text-2xl"
                    />
                    <span class="text-sm">CIIEA Tabasco</span>
                </a>
                <a
                    href="https://facebook.com"
                    target="_blank"
                    class="flex items-center gap-2 text-neutral-500"
                >
                    <font-awesome-icon
                        :icon="['fab', 'facebook']"
                        class="text-2xl"
                    />
                    <span class="text-sm">CIIEA Kids</span>
                </a>
            </div>
            <div class="flex w-2/3 items-center justify-end gap-6">
                <a
                    href="https://www.google.com/maps/place/Centro+de+Investigaci%C3%B3n+E+Innovaci%C3%B3n+Para+la+Ense%C3%B1anza+y+El+Aprendizaje+Ciiea/@17.5622834,-92.937948,16.92z/data=!4m14!1m7!3m6!1s0x47c3f700d23ec9b5:0xbfa42ae35885739d!2sSpatie!8m2!3d51.208773!4d4.4262415!16s%2Fg%2F1td2lnfj!3m5!1s0x85edb757e68858c3:0x9e0871be66d0e66c!8m2!3d17.5623421!4d-92.9369324!16s%2Fg%2F1vxcws9k?entry=ttu"
                    class="group flex w-52 items-center justify-between gap-1"
                >
                    <font-awesome-icon
                        :icon="['fa', 'location-pin']"
                        class="text-lg text-neutral-500 group-hover:text-red-300"
                    />
                    <span
                        class="text-center text-xs text-neutral-500 group-hover:text-neutral-700"
                    >
                        Carretera a las Grutas S/N, Colonia Eureka y Belen, C.P.
                        86800 Teapa, Tabasco
                    </span>
                </a>
                <p class="w-52 text-center text-xs text-neutral-500">
                    Horario de atención<br />
                    8:00 a.m. - 3:00 p.m. lunes a viernes.
                </p>
                <p class="w-52 text-center text-xs text-neutral-500">
                    Número telefónico:<br />932 322 3381
                </p>
            </div>
        </div>
        <div class="flex justify-end gap-4 px-8 py-6">
            <Link href="google.com " class="text-sm text-neutral-500">
                Privacidad
            </Link>
            <span class="text-sm text-neutral-500"> Derechos reservados </span>
        </div>
    </footer>
</template>

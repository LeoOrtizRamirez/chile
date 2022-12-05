<template>
    <div class="">

          <!-- inicio paginador -->
          <nav aria-label="Page navigation example">
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a
                        href="#"
                        v-on:click="getPreviousPage()"
                        class="block px-3 py-2 ml-0 leading-tight  bg-white border border-gray-300 rounded-l-lg"
                    >
                        <span class="sr-only">Previous</span>
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        v-for="paginas in 2"
                        v-on:click="getDataPagina(paginas)"
                        v-bind:class="isActive(paginas)"
                        class="px-3 py-2 leading-tight bg-white border border-gray-300"
                        >{{ paginas }}</a
                    >
                </li>

                <li>
                    <a
                        href="#"
                        v-on:click="getNextPage()"
                        class="block px-3 py-2 leading-tight  bg-white border border-gray-300 rounded-r-lg"
                    >
                        <span class="sr-only">Next</span>
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
   <!-- Fin paginador -->

       </div>   
</template>


<script>

export default {

    props: {
        contratos: [],
    },

    components: {
        Paginador,
    },

    data() {
        return {
            elementosPorPagina: 10,
            contratosFiltrados: this.contratos,
            paginaActual: 1,
        };
    },

    mounted() {
        this.getDataPagina(1);
    },

    methods: {
        totalPaginas() {
            return Math.ceil(this.contratos.length / this.elementosPorPagina);
        },

        getDataPagina(noPagina) {
            this.paginaActual = noPagina;
            this.contratosFiltrados = [];
            let ini =
                noPagina * this.elementosPorPagina - this.elementosPorPagina;
            let fin = noPagina * this.elementosPorPagina;
            this.contratosFiltrados = this.contratos.slice(ini, fin);
        },

        getPreviousPage() {
            if (this.paginaActual > 1) {
                this.paginaActual--;
            }
            this.getDataPagina(this.paginaActual);
        },

        getNextPage() {
            if (this.paginaActual < this.totalPaginas()) {
                this.paginaActual++;
            }
            this.getDataPagina(this.paginaActual);
        },
        isActive(noPagina) {
            return noPagina == this.paginaActual
                ? "bg-licitaciones dark:text-white"
                : "";
        },
    },
};
</script>

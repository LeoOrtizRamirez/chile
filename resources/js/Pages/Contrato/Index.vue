<template>
    <AppLayout title="Contratos">
        <template #header>
            <Busqueda_Rapida></Busqueda_Rapida>
        </template>

        <nav aria-label="Page navigation example"> 
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a href="#" v-on:click="getPreviousPage()"
                        class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                

                <li>
                    <a href="#" v-for="paginas in totalPaginas()" v-on:click="getDataPagina(paginas)" v-bind:class="isActive(paginas)"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ paginas }}</a>
                </li>

                <li>
                    <a href="#" v-on:click="getNextPage()"
                        class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <table class="table w-full bg-white border border-indigo-600">
                    <thead class="">
                        <tr
                            class="bg-licitaciones text-white uppercase text-sm leading-normal"
                        >
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Acciones
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Portal
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Entidad
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Objeto
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Cuantía
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Modalidad
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Número
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Estado
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                F.Publicación
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Ubicación
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Contratista
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Actividad económica
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="contrato in datosPaginados" :key="datosPaginados.id">
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                <div class="flex items-center justify-center">
                                    <div class="mx-auto w-full max-w-[550px]">
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/pdf.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/enviar.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/estrella-verde.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/ojo-azul.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/compartir.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/papelera.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.fuente.alias_portal }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.entidad_contratante }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.objeto.substr(0, 30) }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ (contrato.valor>0) ? contrato.valor.toLocaleString('co-CO') : contrato.valor_texto }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.modalidad }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.codigo_proceso }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.estado_proceso }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.fecha_publicacion }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.ubicacion }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            ></td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            ></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Busqueda_Rapida from "@/components/Busqueda_Rapida.vue";
</script>

<script>
export default {
    props: {
        contratos: [],

    },

    data() {
        return {
            elementosPorPagina: 10,
            datosPaginados: [],
            paginaActual: 1
        }
    },

    mounted(){
        this.getDataPagina(1)
    },

    methods: {
        totalPaginas() {
            return Math.ceil(this.contratos.length / this.elementosPorPagina)
        },
        getDataPagina(noPagina) {
            this.paginaActual = noPagina
            this.datosPaginados = []
            let ini = (noPagina * this.elementosPorPagina) - this.elementosPorPagina
            let fin = (noPagina * this.elementosPorPagina)

            /* for (let index = ini; index < fin; index++) {
                this.datosPaginados.push(this.contratos[index])
            }
            console.log(this.datosPaginados) */

            this.datosPaginados = this.contratos.slice(ini,fin)
        },
        getPreviousPage(){
            if(this.paginaActual > 1){
                this.paginaActual--
            }
            this.getDataPagina(this.paginaActual)
        },

        getNextPage(){
            if(this.paginaActual < this.totalPaginas()){
                this.paginaActual++
            }
            this.getDataPagina(this.paginaActual)
        },
        isActive(noPagina){
            return noPagina == this.paginaActual ? 'dark:bg-gray-700 dark:text-white' :''
        }
    }
}

</script>

<style lang="scss" scoped>
.bg-licitaciones {
    background-color: #00a1c9;
}
</style>
